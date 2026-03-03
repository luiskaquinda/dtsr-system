@extends('admin.layout.admin-app')
@section('title', 'Home')

@section('content')
    <!--begin::Serviços-->
        <div class="container-fluid d-flex justify-content-center tipo-container">
            @php $user = auth()->user(); @endphp

            {{-- usando helpers --}}
            @if($user && $user->isAdmin())
                {{-- cartão só para admin/root --}}
                <!--begin::Card body-->
                <div class="row mb-4 text-center tipo-content align-self-center">
                    <a href="{{ route('pedido.index') }}" class="card col-4 py-8 mb-4 mx-2 hover-elevate-up shadow-sm parent-hover tipo-item">
                        <div class="card-body d-flex align-items">
                            <span class="svg-icon fs-1">
                                1
                            </span>

                            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                                Pedidos
                            </span>
                        </div>
                    </a>
                    <a href="{{ route('pedido.index') }}" class="card col-4 py-8 mb-4 mx-2 hover-elevate-up shadow-sm parent-hover tipo-item">
                        <div class="card-body d-flex align-items">
                            <span class="svg-icon fs-1">
                                2
                            </span>

                            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                                Furtos e roubos
                            </span>
                        </div>
                    </a>
                    <a href="{{ route('notificacao.alertas.index') }}" class="card col-4 py-8 mb-4 mx-2 hover-elevate-up shadow-sm parent-hover tipo-item">
                        <div class="card-body d-flex align-items">
                            <span class="svg-icon fs-1">
                                3
                            </span>

                            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                                Alertas
                            </span>
                        </div>
                    </a>

                    <a href="{{ route('pedido.index') }}" class="card col-4 py-8 mb-4 mx-2 hover-elevate-up shadow-sm parent-hover tipo-item">
                        <div class="card-body d-flex align-items">
                            <span class="svg-icon fs-1">
                                4
                            </span>

                            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                                Multas
                            </span>
                        </div>
                    </a>
                </div>
                <!--end::Card body-->
            @endif
            
            @if($user && $user->isAgente())
                {{-- cartão só para agente --}}

                <!--begin::Card body-->
                <div class="row mb-4 text-center tipo-content align-self-center">
                    <a href="{{ route('pedido.index') }}" class="card col-4 py-8 mb-4 mx-2 hover-elevate-up shadow-sm parent-hover tipo-item">
                        <div class="card-body d-flex align-items">
                            <span class="svg-icon fs-1">
                                1
                            </span>

                            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                                Pedidos
                            </span>
                        </div>
                    </a>
                    <a href="{{ route('pedido.index') }}" class="card col-4 py-8 mb-4 mx-2 hover-elevate-up shadow-sm parent-hover tipo-item">
                        <div class="card-body d-flex align-items">
                            <span class="svg-icon fs-1">
                                2
                            </span>

                            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                                Furtos e roubos
                            </span>
                        </div>
                    </a>
                    <a href="{{ route('notificacao.alertas.index') }}" class="card col-4 py-8 mb-4 mx-2 hover-elevate-up shadow-sm parent-hover tipo-item">
                        <div class="card-body d-flex align-items">
                            <span class="svg-icon fs-1">
                                3
                            </span>

                            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                                Alertas
                            </span>
                        </div>
                    </a>

                    <a href="{{ route('pedido.index') }}" class="card col-4 py-8 mb-4 mx-2 hover-elevate-up shadow-sm parent-hover tipo-item">
                        <div class="card-body d-flex align-items">
                            <span class="svg-icon fs-1">
                                4
                            </span>

                            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                                Multas
                            </span>
                        </div>
                    </a>
                </div>
                <!--end::Card body-->
            @endif
            
            {{-- se precisares de guest (role) específica --}}
            @if($user && $user->isGuestRole())
                {{-- funcionalidades para users com role 'guest' --}}
                <!--begin::Card body-->
                <div class="row mb-4 text-center tipo-content align-self-center">
                    <a href="{{ route('pedido.index') }}" class="card col-4 py-8 mb-4 mx-2 hover-elevate-up shadow-sm parent-hover tipo-item">
                        <div class="card-body d-flex align-items">
                            <span class="svg-icon fs-1">
                                1
                            </span>

                            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                                Pedido de matrícula
                            </span>
                        </div>
                    </a>
                    <a href="{{ route('pedido.index') }}" class="card col-4 py-8 mb-4 mx-2 hover-elevate-up shadow-sm parent-hover tipo-item">
                        <div class="card-body d-flex align-items">
                            <span class="svg-icon fs-1">
                                2 
                            </span>

                            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                                Emissão de verbete
                            </span>
                        </div>
                    </a>
                    <a href="{{ route('notificacao.alertas.index') }}" class="card col-4 py-8 mb-4 mx-2 hover-elevate-up shadow-sm parent-hover tipo-item">
                        <div class="card-body d-flex align-items">
                            <span class="svg-icon fs-1">
                                3
                            </span>

                            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                                Alertas
                            </span>
                        </div>
                    </a>

                    <a href="{{ route('pedido.index') }}" class="card col-4 py-8 mb-4 mx-2 hover-elevate-up shadow-sm parent-hover tipo-item">
                        <div class="card-body d-flex align-items">
                            <span class="svg-icon fs-1">
                                4
                            </span>

                            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                                Consultas
                            </span>
                        </div>
                    </a>
                </div>
                <!--end::Card body-->
            @endif
            
            {{-- para não autenticados --}}
            @guest
                {{-- link de registo/login --}}
                <!--begin::Card body-->
                <div class="row mb-4 text-center tipo-content align-self-center">
                    <a href="{{ route('pedido.index') }}" class="card col-4 py-8 mb-4 mx-2 hover-elevate-up shadow-sm parent-hover tipo-item">
                        <div class="card-body d-flex align-items">
                            <span class="svg-icon fs-1">
                                1
                            </span>

                            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                                Pedido de matrícula
                            </span>
                        </div>
                    </a>
                    <a href="{{ route('pedido.index') }}" class="card col-4 py-8 mb-4 mx-2 hover-elevate-up shadow-sm parent-hover tipo-item">
                        <div class="card-body d-flex align-items">
                            <span class="svg-icon fs-1">
                                2 
                            </span>

                            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                                Emissão de verbete
                            </span>
                        </div>
                    </a>
                    <a href="{{ route('notificacao.alertas.index') }}" class="card col-4 py-8 mb-4 mx-2 hover-elevate-up shadow-sm parent-hover tipo-item">
                        <div class="card-body d-flex align-items">
                            <span class="svg-icon fs-1">
                                3
                            </span>

                            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                                Alertas
                            </span>
                        </div>
                    </a>

                    <a href="{{ route('pedido.index') }}" class="card col-4 py-8 mb-4 mx-2 hover-elevate-up shadow-sm parent-hover tipo-item">
                        <div class="card-body d-flex align-items">
                            <span class="svg-icon fs-1">
                                4
                            </span>

                            <span class="ms-3 text-gray-700 parent-hover-primary fs-6 fw-bold">
                                Consultas
                            </span>
                        </div>
                    </a>
                </div>
                <!--end::Card body-->
            @endguest
        </div>
    <!--end::Serviços-->
@endsection