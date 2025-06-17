<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Notificacao;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        View::composer('admin.partials.header-primary', function ($view) {
            $user = Auth::user();
            $quantidadeNotificacoes = 0;
    
            if ($user && $user->proprietario) {
                // Filtrar notificações associadas aos veículos do proprietário do usuário autenticado
                $quantidadeNotificacoes = Notificacao::whereHas('veiculos', function ($query) use ($user) {
                    $query->whereHas('proprietario', function ($subQuery) use ($user) {
                        $subQuery->where('user_id', $user->id);
                    });
                })->count();
            }
    
            $view->with('quantidadeNotificacoes', $quantidadeNotificacoes);
        });


        View::composer('admin.pedidos.partials.header-primary', function ($view) {
            $user = Auth::user();
            $quantidadeNotificacoes = 0;
    
            if ($user && $user->proprietario) {
                // Filtrar notificações associadas aos veículos do proprietário do usuário autenticado
                $quantidadeNotificacoes = Notificacao::whereHas('veiculos', function ($query) use ($user) {
                    $query->whereHas('proprietario', function ($subQuery) use ($user) {
                        $subQuery->where('user_id', $user->id);
                    });
                })->count();
            }
    
            $view->with('quantidadeNotificacoes', $quantidadeNotificacoes);
        });

        View::composer('admin.veiculo.partials.header-primary', function ($view) {
            $user = Auth::user();
            $quantidadeNotificacoes = 0;

            if ($user && $user->proprietario) {
            // Filtrar notificações apenas para os veículos associados ao proprietário do usuário autenticado
                $quantidadeNotificacoes = Notificacao::whereHas('veiculos', function ($query) use ($user) {
                        $query->whereHas('proprietario', function ($subQuery) use ($user) {
                            $subQuery->where('user_id', $user->id);
                        });
                })->count();
            }

            $view->with('quantidadeNotificacoes', $quantidadeNotificacoes);
        });
    }
}
