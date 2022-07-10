@php
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
@endphp

<table class="table table-bordered bg-titular mb-0">
    <tbody>
        <tr>
            <td class="text-center">Pagamento da primeira parcela</td>
        </tr>                
    </tbody>
</table>

<table class="table table-bordered ">
    <tbody>
        <tr>
            <td style="font-size: 17px; padding: 15px">
                <strong>O valor de {{  moeda($item['valor_primeira_parcela'],'site')  ?? '' }} </strong> ({{ $item['valor_por_extenso']  ?? '' }} corresponde apenas a 1ª parcela) 
            </td>
            
        </tr>
    </tbody>
</table>   

<table class="table table-bordered ">
    <tbody>
        <tr>
            <td>
                {{ $item['cidade_contrato']  ?? '' }}, {{ strftime('%d de %B de %Y', strtotime('today')) }}     
            </td>
            <td>
                <strong>Vendedor:</strong> {{ $representante['name']  ?? '' }}
            </td>
        </tr>
    </tbody>
</table>  

<table class="table table-bordered ">
    <tbody>
        <tr class="text-center">
            <td style="padding: 20px;">
                <h3>
                    Telefone Geral <br> {{ $tel01}}
                </h3>
            </td>
            <td style="padding: 20px;">
                <br>
                <br>
                <hr style="border: 1px solid black" >
                Assinatura do <strong>CONSORCIADO</strong>
                <br>
                Conforme RG ou reconhecida em Cartório
            </td>
        </tr>
    </tbody>
</table>  

