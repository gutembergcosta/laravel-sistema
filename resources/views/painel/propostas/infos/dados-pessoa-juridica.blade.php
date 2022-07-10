<h3>Dados da empresa</h3>
        
<ul class="dados-info">
    <li>
        <strong>Nome fantasia:</strong> 
        {{ $item['nome_fantasia']}}
    </li>
    
    <li>
        <strong>Razão social:</strong>
        {{ $item['razao_social']}}
    </li>
    
    <li>
        <strong>Data de fundação:</strong>
        {{ $item['data_nascimento']}}
    </li>
    
    <li>
        <strong>CNPJ:</strong>
        {{ $item['cnpj']}}
    </li>
    
    <li>
        <strong>Inscrição Estadual:</strong>
        {{ $item['insc_estadual']}}" 
    </li>
    
    <li>
        <strong>Capital Social:</strong>
        {{ $item['capital_social']}}
    </li>
    
    
    <li>
        <strong>Empresa tipo:</strong>
        {{ $item['empresa_tipo']}}
        
    </li>
    
    <li>
        <strong>Atividade:</strong>
        {{ $item['atividade']}}
    
    </li>
    
    <li>
        <strong>Faturamento médio mensal:</strong>
        {{ $item['faturamento_medio']}}
    </li>
</ul>



<h3>Dados do responsável pela empresa</h3>

<ul class="dados-info">
    <li>
        <strong>Nome completo:</strong> {{ $item['nome']}}
    </li>

    <li>
        <strong>Email:</strong> {{ $item['email']}}
    </li>

    <li>
        <strong>Data de nascimento:</strong> {{ $item['data_nascimento']}}
    </li>

    <li >
        <strong>Estado civil:</strong> {{ $item['estado_civil']}}
    </li>

    <li >
        <strong>Telefones:</strong> 
    
        {{$item['tel01'] }}
        @if ($item['tel02']) {{ ' , '. $item['tel02'] }} @endif 
        @if ($item['tel03']) {{ ' , '. $item['tel03'] }} @endif 
        
    </li>

    <li >
        <strong>Porcentagem de participação:</strong> {{ $item['participacao']}}
    </li>

</ul>