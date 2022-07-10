<h3>Dados do plano</h3>

<ul class="dados-info">   

    <li>
        <strong>Prazo do grupo (meses):</strong> {{ $item['prazo_grupo']  ?? '' }}
    </li>


    <li>
        <strong>Prazo da cota (meses):</strong> {{ $item['prazo_cota']  ?? '' }}
    </li>

    <li>
        <strong>Qte de participantes:</strong> {{ $item['qte_participantes']  ?? '' }}
    </li>

    <li>
        <strong>Valor do crédito:</strong> {{ $item['valor_credito']  ?? '' }}
    </li>

    <li>
        <strong>Índice de correção:</strong>{{ $item['indice_correcao']  ?? '' }}
    </li>

    <li>
        <strong>Fundo de reserva:</strong>{{ $item['fundo_reserva']  ?? '' }}
    </li>

    <li>
        <strong>Seguro prestativa:</strong> {{ $item['seguro']  ?? '' }}
    </li>

    <li>
        <strong>Taxa administrativa:</strong> {{ $item['taxa_administrativa']  ?? '' }}
    </li>

    <li>
        <strong>Tipo de bem:</strong> {{ $item['tipo_iten']  ?? '' }}
    </li>

    <li>
        <strong>Antecipação de taxa administrativa:</strong> {{ $item['antecipacao_taxa_administrativa']  ?? '' }}
    </li>

    <li>
        <strong>Código de tabela:</strong> {{ $item['codigo_tabela']  ?? '' }}
    </li>

    <li>
        <strong>Valor da primeira parcela:</strong> {{ $item['valor_primeira_parcela']  ?? '' }}
    </li>

    <li>
        <strong>Informação da primeira parcela:</strong> {{ $item['info_primeira_parcela']  ?? '' }}
    </li>

    <li>
        <strong>Cidade do contrato:</strong> {{ $item['cidade_contrato']  ?? '' }}
    </li>


</ul>