<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        // Admin, agente e root -> dashboard
        if ($user->isAdmin() || $user->isAgente()) {
            return redirect()->route('dashboard')->with('toast_success', 'Login efetuado com sucesso!');
        }

        // Guest -> alertas
        if ($user->isGuestRole()) {
            return redirect()->route('notificacao.alertas.index')->with('toast_success', 'Login efetuado com sucesso!');
        }

        // Qualquer outro caso: respeita intended ou redireciona para alerts
        return redirect()->intended(route('notificacao.alertas.index'))->with('toast_success', 'Login efetuado com sucesso!');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
