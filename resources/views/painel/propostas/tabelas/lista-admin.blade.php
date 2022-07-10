@if ($listaProposta->count() > 0)
    <h4 style="color: #337ab7" >{{ $titulo }}</h4>
    <div class="table-responsive">
        <table class="table table-bordered tabela">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th style="width: 300px">Representante</th>
                    <th style="width: 80px">Data</th>
                    <th style="width: 80px">Status</th>
                    <th style="width: 80px"></th>
                </tr>

            </thead>
            <tbody>
                @foreach ($listaProposta as $item)
                    <tr>
                        <td>{{ $item['full_nome'] }}</td>
                        <td>{{ $item->user->userDados->nome }}</td>
                        <td>{{ dataSimples($item['created_at'], 'site') }}</td>
                        <td><span class="label label-{{ $item['status_cor'] }}"> {{ $item['status_nome'] }} </span></td>
                        <td>
                            <a href="{{ route('admin.proposta-infos', [$item['id']]) }}" class="btn btn-info btn-xs">
                                Visualizar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif