@extends('admin.layout.admin-app')
@section('title', 'Home')

@section('content')
    <!--begin::Serviços-->
        <div class="container-fluid d-flex justify-content-center tipo-container">
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
        </div>
    <!--end::Serviços-->
@endsection