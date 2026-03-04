@extends('admin.veiculo.layout.app')
@section('title', 'Cadastro')

@section('content')
    <form class="container p-4 bg-white rounded" action="{{ route('veiculo.store') }}" method="POST">
        @csrf
        @method('POST')
        @include('admin.pedidos.partials.matricula_form')
    </form>
@endsection

@section('custom_js')
    <script src="{{ asset('js/custom/apps/ecommerce/catalog/products.js') }}"></script>
    <script src="{{ asset('js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{ asset('js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/type.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/budget.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/settings.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/team.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/targets.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/files.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/complete.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/create-project/main.js') }}"></script>
    <script src="{{ asset('js/custom/utilities/modals/users-search.js') }}"></script>
@endsection