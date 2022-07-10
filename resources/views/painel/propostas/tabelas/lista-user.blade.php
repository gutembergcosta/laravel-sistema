<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Propostas</h3>
    </div>
    <div class="panel-body">


        <div class="">
            <table class="table table-bordered tabela">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th style="width: 80px">Data</th>
                        <th style="width: 140px">Tipo</th>
                        <th style="width: 80px">Status</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($lista as $item)
                        <tr>
                            <td><a class="tb_link" href="{{ route('admin.proposta-form', ['edit', $item['id']]) }}">{{ $item['full_nome'] }}</a> </td>
                            <td>{{ dataSimples($item['created_at'], 'site') }}</td>
                            <td>{{ $item['nome_tipo_proposta'] }}</td>
                            
                            <td><span class="label label-{{ $item['status_cor'] }}"> {{ $item['status_nome'] }} </span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>