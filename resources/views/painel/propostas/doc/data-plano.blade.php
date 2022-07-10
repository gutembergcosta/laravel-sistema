
<table class="table table-bordered bg-titular mb-0">
    <tbody>
        <tr>
            <td class="text-center">Dados do plano</td>
        </tr>                
    </tbody>
</table>

<table class="table table-bordered mb-0">
    <tbody>
        <tr>
        
            <td>
                <strong>Prazo do grupo (meses):</strong><br> {{ $item['prazo_grupo']  ?? '' }}
            </td>
        
            <td>
                <strong>Prazo da cota (meses):</strong><br> {{ $item['prazo_cota']  ?? '' }}
            </td>
        
            <td>
                <strong>Qte de participantes:</strong><br> {{ $item['qte_participantes']  ?? '' }}
            </td>
        
            
        </tr>
    </tbody>
</table>        
<table class="table table-bordered mb-0">
    <tbody>
        <tr>
            <td>
                <strong>Valor do crédito:</strong><br> {{ $item['valor_credito']  ?? '' }}
            </td>
            <td>
                <strong>Índice de correção:</strong><br>{{ $item['indice_correcao']  ?? '' }}
            </td>
        
            <td>
                <strong>Fundo de reserva:</strong><br>{{ $item['fundo_reserva']  ?? '' }}
            </td>
        
            <td>
                <strong>Seguro prestativa:</strong><br> {{ $item['seguro']  ?? '' }}
            </td>
        
            <td>
                <strong>Taxa administrativa:</strong><br> {{ $item['taxa_administrativa']  ?? '' }}
            </td>
        </tr>
    </tbody>
</table>        
<table class="table table-bordered mb-0">
    <tbody>   
        <tr>
            <td>
                <strong>Tipo de bem:</strong><br> {{ $item['tipo_iten']  ?? '' }}
            </td>
        
            <td>
                <strong>Antecipação de taxa administrativa:</strong><br> {{ $item['antecipacao_taxa_administrativa']  ?? '' }}
            </td>
        
            <td>
                <strong>Código de tabela:</strong><br> {{ $item['codigo_tabela']  ?? '' }}
            </td>
        
            
        </tr>
    </tbody>
</table>        
<table class="table table-bordered">
    <tbody>        
        <tr>
            <td>
                <strong>Valor da primeira parcela:</strong><br> {{ $item['valor_primeira_parcela']  ?? '' }}
            </td>
            <td>
                <strong>Informação da primeira parcela:</strong><br> {{ $item['info_primeira_parcela']  ?? '' }}
            </td>
        
            <td>
                <strong>Cidade do contrato:</strong><br> {{ $item['cidade_contrato']  ?? '' }}
            </td>
        </tr>                              
    </tbody>
</table>