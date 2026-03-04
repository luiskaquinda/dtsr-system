<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Marca</th>
            <th>Pedido</th>
            <th>Nº Quadro</th>
            <th>Requerente</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>{{ optional($pedido->created_at)->format('Y-m-d') }}</td>
                <td>{{ optional($pedido->veiculo)->marca }}</td>
                <td>{{ optional($pedido->tipo_pedido)->tipo }}</td>
                <td>{{ optional($pedido->veiculo)->quadro }}</td>
                <td>{{ optional($pedido->veiculo->proprietario)->nome_completo }}</td>
                <td>
                    @if ($pedido->status == "0")
                        A Processar
                    @else
                        Processado
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">Sem Veículos cadastrados.</td>
            </tr>
        @endforelse
    </tbody>
</table>
