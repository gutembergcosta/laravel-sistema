<img width="300px" src="@if($logo){{ url('/public/uploads/original-'.$logo) }}@endif">


<table class="table table-bordered bg-titular mb-0">
    <tbody>
        <tr>
            <td style="width: 70% ">Proposta de Participação em Grupo de Consórcio</td>
            <td style="width: 30% "> <span class="text-danger">Nº </span> {{ $item['id'] }}</td>
        </tr>                
    </tbody>
</table>
<table class="table table-bordered">
    <tbody>
        
        <tr>
            <td style="width: 20% ">
                <strong>GRUPO</strong>
            </td>
            <td style="width: 20% ">
                <strong>COTA</strong>
            </td>
            <td>
                <strong>Representante</strong>
                {{ $representante['name'] }}
            </td>
        </tr>                              
    </tbody>
</table>

<table class="table table-bordered bg-titular mb-0">
    <tbody>
        <tr>
            <td class="text-center">Dados cadastrais</td>
        </tr>                
    </tbody>
</table>
<table class="table table-bordered mb-0">
    <tbody>
        <tr>
            <td >
                <strong>Nome</strong> {{ $item['nome']}}
            </td>

            <td style="width: 150px">
                    <strong>Gênero</strong> 
                    {{ $item['genero_nome']}}
            </td>
            <td  style="width: 200px">
                <strong>CPF:</strong> {{ $item['cpf']}}
            </td>
        </tr>                              
    </tbody>
</table>

<table class="table table-bordered mb-0">
    <tbody>
        <tr>
            
            <td  style="width: 80px">
                <strong>RG:</strong> {{ $item['rg']}}
            </td>
            <td  style="width: 230px">
                <strong>Data Expedição:</strong> {{ $item['data_expedicao']}}
            </td>
            <td>
                <strong>Orgão Emissor:</strong> {{ $item['orgao_emissor']}} - {{ $item['uf']}}
            </td>
            
            
        </tr>                              
    </tbody>
</table>

<table class="table table-bordered mb-0">
    <tbody>
        <tr>
            <td style="width: 250px"> 
                <strong>Data nascimento:</strong> {{ $item['data_nascimento']}}
            </td>
            <td style="width: 200px" >
                <strong>Estado Civil:</strong> {{ $item['estado_civil']}}
            </td>

        </tr>                              
    </tbody>
</table>

<table class="table table-bordered mb-0">
    <tbody>
        <tr>
           

            <td>
                <strong>Nome da mãe:</strong> {{ $item['nome_mae']}}
            </td>

            <td>
                <strong>Nome do pai:</strong>{{ $item['nome_pai']}}
            </td>
        </tr>                              
    </tbody>
</table>



