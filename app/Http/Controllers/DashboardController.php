<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\{
    Alerta,
    User,
    Veiculo
};

use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::findOrFail(Auth::id());
        $totalAlertas = Alerta::count();
        $alertasHoje = Alerta::whereDate('created_at', today())->count();
        $totalUsuarios = User::count();
        $totalVeiculos = Veiculo::count();
        $alertas = Alerta::orderBy('created_at', 'desc')
        ->take(3)
        ->get();
        $totalDeAlertas = Alerta::count();

        $alertasAgrupados = Alerta::orderBy('created_at','desc')->get()->groupBy('tipo_notificacoes');

        // Enviar para a view
        return view('admin.dashboard', compact(
            'totalAlertas',
            'alertasHoje',
            'totalDeAlertas',
            'totalVeiculos', 
            'alertasAgrupados', 
            'alertas',
            'user'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
