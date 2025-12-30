<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class SettingsController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('admin.settings.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
        ], [
            'name.required' => 'O nome é obrigatório.',
            'email.required' => 'O email é obrigatório.',
            'email.unique' => 'Este email já está em uso.',
            'avatar.image' => 'O ficheiro deve ser uma imagem.',
            'avatar.max' => 'A imagem não pode ter mais de 1MB.',
        ]);

        if ($request->hasFile('avatar')) {
            // Apagar avatar antigo
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($validated);

        return redirect()
            ->route('admin.settings.profile')
            ->with('success', 'Perfil atualizado com sucesso!');
    }

    public function password()
    {
        return view('admin.settings.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
        ], [
            'current_password.required' => 'A password atual é obrigatória.',
            'password.required' => 'A nova password é obrigatória.',
            'password.confirmed' => 'A confirmação da password não corresponde.',
            'password.min' => 'A password deve ter pelo menos 8 caracteres.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'A password atual está incorreta.']);
        }

        $user->update(['password' => Hash::make($request->password)]);

        return redirect()
            ->route('admin.settings.password')
            ->with('success', 'Password alterada com sucesso!');
    }

    public function site()
    {
        $settings = SiteSetting::all()->groupBy('group');
        
        return view('admin.settings.site', compact('settings'));
    }

    public function updateSite(Request $request)
    {
        $request->validate([
            'settings' => 'required|array',
        ]);

        foreach ($request->settings as $key => $value) {
            SiteSetting::set($key, $value);
        }

        SiteSetting::clearCache();

        return redirect()
            ->route('admin.settings.site')
            ->with('success', 'Configurações do site atualizadas com sucesso!');
    }

    // Gestão de utilizadores (apenas admin)
    public function users()
    {
        $this->authorize('manageUsers', User::class);
        
        $users = User::latest()->paginate(15);
        
        return view('admin.settings.users', compact('users'));
    }

    public function createUser()
    {
        $this->authorize('manageUsers', User::class);
        
        return view('admin.settings.users-create');
    }

    public function storeUser(Request $request)
    {
        $this->authorize('manageUsers', User::class);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => ['required', Password::min(8)],
            'role' => 'required|in:admin,editor,viewer',
            'phone' => 'nullable|string|max:20',
            'is_active' => 'boolean',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['is_active'] = $request->boolean('is_active', true);

        User::create($validated);

        return redirect()
            ->route('admin.settings.users')
            ->with('success', 'Utilizador criado com sucesso!');
    }

    public function editUser(User $user)
    {
        $this->authorize('manageUsers', User::class);
        
        return view('admin.settings.users-edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $this->authorize('manageUsers', User::class);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,editor,viewer',
            'phone' => 'nullable|string|max:20',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        // Não permitir que o admin desative a si próprio
        if ($user->id === Auth::id() && !$validated['is_active']) {
            return back()->withErrors(['is_active' => 'Não pode desativar a sua própria conta.']);
        }

        $user->update($validated);

        return redirect()
            ->route('admin.settings.users')
            ->with('success', 'Utilizador atualizado com sucesso!');
    }

    public function destroyUser(User $user)
    {
        $this->authorize('manageUsers', User::class);

        if ($user->id === Auth::id()) {
            return back()->withErrors(['error' => 'Não pode eliminar a sua própria conta.']);
        }

        $user->delete();

        return redirect()
            ->route('admin.settings.users')
            ->with('success', 'Utilizador eliminado com sucesso!');
    }
}
