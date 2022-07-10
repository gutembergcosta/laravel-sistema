<img width="300px" src="@if($logo){{ url('/public/uploads/original-'.$logo) }}@endif">


<table class="table table-bordered bg-titular mb-0">
    <tbody>
        <tr>
            <td style="width: 70% ">Proposta de Participação em Grupo de Consórcio</td>
            <td style="width: 30% "> <span class="text-danger">Nº </span> {{ $item['id'] }}</td>
        </tr>                
    </tbody>
</table>

<table class="table table-bordered mb-0">
    <tbody>
        <tr>
            <td>
            <strong>Nome fantasia:</strong> 
            {{ $item['nome_fantasia']}}
            </td>

            <td>
            <strong>Razão social:</strong>
            {{ $item['razao_social']}}
            </td>

            <td>
            <strong>Data de fundação:</strong>
            {{ $item['data_nascimento']}}
            </td>
        
        </tr>                              
    </tbody>
</table>

<table class="table table-bordered mb-0">
    <tbody>
        <tr>
            <td>
            <strong>CNPJ:</strong>
            {{ $item['cnpj']}}
            </td>

            <td>
            <strong>Inscrição Estadual:</strong>
            {{ $item['insc_estadual']}}" 
            </td>

            <td>
            <strong>Capital Social:</strong>
            {{ $item['capital_social']}}
            </td>


            <td>
            <strong>Empresa tipo:</strong>
            {{ $item['empresa_tipo']}}

            </td>
        </tr>                              
    </tbody>
</table>

<table class="table table-bordered">
    <tbody>
        <tr>

            <td>
            <strong>Atividade:</strong>
            {{ $item['atividade']}}

            </td>

            <td>
            <strong>Faturamento médio mensal:</strong>
            {{ $item['faturamento_medio']}}
            </td>

        </tr>                              
    </tbody>
</table>


<table class="table table-bordered bg-titular mb-0">
    <tbody>
        <tr>
            <td>Dados do responsável pela empresa</td>
        </tr>                
    </tbody>
</table>


<table class="table table-bordered  mb-0">
    <tbody>
        <tr>
            <td>
                <strong>Nome completo:</strong> {{ $item['nome']}}
            </td>
        
            <td>
                <strong>Email:</strong> {{ $item['email']}}
            </td>
        
            <td>
                <strong>Data de nascimento:</strong> {{ $item['data_nascimento']}}
            </td>
        </tr>                
    </tbody>
</table>
<table class="table table-bordered ">
    <tbody>
        <tr>
            <td>
                <strong>Estado civil:</strong> {{ $item['estado_civil']}}
            </td>
        
            <td>
                <strong>Telefones:</strong> 
            
                {{$item['tel01'] }}
                @if ($item['tel02']) {{ ' , '. $item['tel02'] }} @endif 
                @if ($item['tel03']) {{ ' , '. $item['tel03'] }} @endif 
                
            </td>
        
            <td>
                <strong>Porcentagem de participação:</strong> {{ $item['participacao']}}
            </td>
        </tr>                
    </tbody>
</table>