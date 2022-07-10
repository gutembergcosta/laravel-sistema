<h3>Dados Pessoais</h3>

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
</ul>