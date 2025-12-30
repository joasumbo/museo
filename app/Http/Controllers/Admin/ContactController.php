<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $statusCounts = [
            'all' => Contact::count(),
            'unread' => Contact::unread()->count(),
            'read' => Contact::read()->count(),
            'replied' => Contact::replied()->count(),
            'archived' => Contact::archived()->count(),
        ];

        return view('admin.contacts.index', compact('contacts', 'statusCounts'));
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

        // Aqui você pode implementar o envio de email
        // Mail::to($contact->email)->send(new ContactReply($contact, $request->reply_message));

        $contact->markAsReplied(Auth::id());

        if ($request->filled('admin_notes')) {
            $contact->update(['admin_notes' => $request->admin_notes]);
        }

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Resposta enviada com sucesso!');
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
