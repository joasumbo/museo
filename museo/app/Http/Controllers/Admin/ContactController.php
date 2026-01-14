<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReplyMail;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        // Filtros
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('subject', 'like', "%{$search}%");
            });
        }

        $contacts = $query->latest()->paginate(15);

        $stats = [
            'all' => Contact::count(),
            'unread' => Contact::unread()->count(),
            'read' => Contact::read()->count(),
            'replied' => Contact::replied()->count(),
            'archived' => Contact::archived()->count(),
        ];

        return view('admin.contacts.index', compact('contacts', 'stats'));
    }

    public function show(Contact $contact)
    {
        $contact->markAsRead();

        return view('admin.contacts.show', compact('contact'));
    }

    public function reply(Request $request, Contact $contact)
    {
        $request->validate([
            'reply_message' => 'required|string|min:10',
        ], [
            'reply_message.required' => 'A mensagem de resposta é obrigatória.',
            'reply_message.min' => 'A resposta deve ter pelo menos 10 caracteres.',
        ]);

        try {
            DB::beginTransaction();

            Mail::to($contact->email)->send(new ContactReplyMail($contact, $request->reply_message));

            $contact->markAsReplied(Auth::id());

            $updateData = [];
            if ($request->filled('admin_notes')) {
                $updateData['admin_notes'] = $request->admin_notes;
            }

            $updateData['replied_message'] = $request->reply_message;

            if (!empty($updateData)) {
                $contact->update($updateData);
            }

            DB::commit();

            return redirect()
                ->route('admin.contacts.index')
                ->with('success', 'E-mail enviado e contacto atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error("Falha ao enviar e-mail de resposta (ID Contacto: {$contact->id}): " . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Ocorreu um erro técnico ao enviar o e-mail. Verifique as configurações de SMTP no ficheiro .env.');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ], [
            'name.required'    => 'O nome é obrigatório.',
            'email.required'   => 'O email é obrigatório.',
            'email.email'      => 'Introduza um email válido.',
            'message.required' => 'A mensagem é obrigatória.',
        ]);

        try {
            DB::beginTransaction();

            $data = [
                'name'    => $validated['name'],
                'email'   => $validated['email'],
                'message' => $validated['message'],
                'subject' => 'Nova mensagem via Site',
                'phone'   => null,
                'status'  => 'unread',
            ];

            // 3. Criar Registo
            Contact::create($data);

            DB::commit();

            return back()->with('success', 'A sua mensagem foi enviada com sucesso! Entraremos em contacto brevemente.');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error("Erro ao enviar contacto: " . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Ocorreu um erro ao enviar a mensagem. Por favor, tente novamente.');
        }
    }

    public function archive(Contact $contact)
    {
        $contact->archive();

        return response()->json([
            'success' => true,
            'message' => 'Contacto arquivado com sucesso!',
        ]);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Contacto eliminado com sucesso!');
    }

    public function markAsRead(Contact $contact)
    {
        $contact->markAsRead();

        return response()->json([
            'success' => true,
            'message' => 'Marcado como lido.',
        ]);
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:archive,delete,mark_read',
            'ids' => 'required|array',
            'ids.*' => 'exists:contacts,id',
        ]);

        $contacts = Contact::whereIn('id', $request->ids)->get();

        foreach ($contacts as $contact) {
            switch ($request->action) {
                case 'archive':
                    $contact->archive();
                    break;
                case 'delete':
                    $contact->delete();
                    break;
                case 'mark_read':
                    $contact->markAsRead();
                    break;
            }
        }

        $actionLabels = [
            'archive' => 'arquivados',
            'delete' => 'eliminados',
            'mark_read' => 'marcados como lidos',
        ];

        return response()->json([
            'success' => true,
            'message' => count($request->ids) . ' contactos ' . $actionLabels[$request->action] . '.',
        ]);
    }
}
