<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    Proprietario,
    Multa
};

use Illuminate\Pagination\Paginator;

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

        Paginator::useBootstrapFive();

        // View::composer('*', function ($view) {
        //     $multasUsuario = [];

        //     if (Auth::check()) {
        //         $userId = Auth::id();
        //         $proprietario = Proprietario::where('user_id', $userId)->first();

        //         if ($proprietario) {
        //             $multasUsuario = Multa::where('proprietario_id', $proprietario->id)
        //                 ->latest()
        //                 ->take(5)
        //                 ->get();
        //         }
        //     }

        //     $view->with('multasUsuario', $multasUsuario);
        // });

        // View::composer('*', function ($view) {
        //     $multasUsuario = collect();

        //     if (Auth::check()) {
        //         $userId = Auth::id();
                
        //         $proprietario = Proprietario::where('user_id', $userId)->first();

        //         if ($proprietario) {
        //             $multasUsuario = Multa::where('proprietario_id', $proprietario->id)
        //                 ->latest()
        //                 ->get();
        //         }
        //     }

        //     $view->with('multasUsuario', $multasUsuario)
        //          ->with('totalMultasUsuario', $multasUsuario->count());
        // });

        // View::composer('*', function ($view) {
        //     // $multas      = collect();
        //     // $total       = 0;
        //     dd([
        //         'user'                => Auth::user(),
        //         'proprietario'        => optional(Auth::user())->proprietario,
        //         'multas_por_proprietario' => optional(optional(Auth::user())->proprietario)->multa()->get(),
        //         'multas' => Multa::where('proprietario_id', Auth::user()->proprietario->id)
        //     ]);
        //     // if ($user = Auth::user()) {
        //     //     // pega o proprietario via relação User -> Proprietario
        //     //     $proprietario = $user->proprietario;
    
        //     //     if ($proprietario) {
        //     //         // carrega todas as multas (ou você pode .take(5) se quiser só as 5 últimas)
        //     //         // $multas = $proprietario
        //     //         //     ->multa()
        //     //         //     ->latest()
        //     //         //     ->get();
        //     //         $multas = Multa::where('proprietario_id', $proprietario->id);
    
        //     //         $total = $multas->count();
        //     //     }
        //     // }
    
        //     // $view->with('multasUsuario', $multas)
        //     //     ->with('totalMultasUsuario', $total);
        // });

        View::composer('*', function ($view) {
            $user = Auth::user();
        
            $proprietario = $user
                ? $user->proprietario   // relação one-to-one que criamos
                : null;
        
            $multasPorProprietario = $proprietario
                ? $proprietario->multa()->get()
                : collect();           // devolve coleção vazia se não houver proprietário
        
            // dd([
            //     'user'                     => $user,
            //     'proprietario'             => $proprietario,
            //     'multas_por_proprietario'  => $multasPorProprietario,
            // ]);
        });

        View::composer('*', function ($view) {
            $user = Auth::user();
            $proprietario = $user ? $user->proprietario : null;
            $multasUsuario = $proprietario ? $proprietario->multa()->latest()->get() : collect();
            $totalMultasUsuario = $multasUsuario->count();
        
            $view->with('multasUsuario', $multasUsuario)
                 ->with('totalMultasUsuario', $totalMultasUsuario);
        });

        View::composer('admin.partials.header-primary', function ($view) {
            $user = Auth::user();
            $quantidadeNotificacoes = 0;

            if ($user && $user->proprietario) {
                // Conta todas as multas associadas ao proprietário do utilizador
                $quantidadeNotificacoes = $user
                    ->proprietario
                    ->multa()              // relação hasMany Multa em Proprietario
                    ->count();
            }
    
            $view->with('quantidadeNotificacoes', $quantidadeNotificacoes);
        });


        View::composer('admin.pedidos.partials.header-primary', function ($view) {
            $user = Auth::user();
            $quantidadeNotificacoes = 0;
    
            if ($user && $user->proprietario) {
                // Conta todas as multas associadas ao proprietário do utilizador
                $quantidadeNotificacoes = $user
                    ->proprietario
                    ->multa()              // relação hasMany Multa em Proprietario
                    ->count();
            }
    
            $view->with('quantidadeNotificacoes', $quantidadeNotificacoes);
        });

        View::composer('admin.veiculo.partials.header-primary', function ($view) {
            $user = Auth::user();
            $quantidadeNotificacoes = 0;

            if ($user && $user->proprietario) {
                // Conta todas as multas associadas ao proprietário do utilizador
                $quantidadeNotificacoes = $user
                    ->proprietario
                    ->multa()              // relação hasMany Multa em Proprietario
                    ->count();
            }

            $view->with('quantidadeNotificacoes', $quantidadeNotificacoes);
        });

        View::composer('notificoes.furtos_acidentes_roubos.partials.header-primary', function ($view) {
            $user = Auth::user();
            $quantidadeNotificacoes = 0;

            if ($user && $user->proprietario) {
                // Conta todas as multas associadas ao proprietário do utilizador
                $quantidadeNotificacoes = $user
                    ->proprietario
                    ->multa()              // relação hasMany Multa em Proprietario
                    ->count();
            }

            $view->with('quantidadeNotificacoes', $quantidadeNotificacoes);
        });
    }
}
