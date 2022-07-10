<div class="form-group col-md-12">
    <h3>Dados do plano</h3>
</div>

<div class="form-group col-md-4 wd-200">
    <label>Prazo do grupo (meses):</label>
    <input type="text" class="form-control wd-120" name="prazo_grupo" maxlength="3" value="{{ $item['prazo_grupo']  ?? '' }}" onkeypress="return isNumberKey(event)">
</div>

<div class="form-group col-md-4 wd-200">
    <label>Prazo da cota (meses):</label>
    <input type="text" class="form-control wd-120" name="prazo_cota" maxlength="3" value="{{ $item['prazo_cota']  ?? '' }}" onkeypress="return isNumberKey(event)" >
</div>

<div class="form-group col-md-4 wd-180">
    <label>Qte de participantes:</label>
    <input type="text" class="form-control" name="qte_participantes" maxlength="4" value="{{ $item['qte_participantes']  ?? '' }}" onkeypress="return isNumberKey(event)" >
</div>

<div class="form-group col-md-4 wd-180">
    <label>Valor do crédito:</label>
    <input type="text" class="form-control realFomato" name="valor_credito" value="{{ $item['valor_credito']  ?? '' }}" >
</div>

<div class="form-group col-md-4 wd-180">
    <label>Índice de correção:</label>
    <input type="text" class="form-control" name="indice_correcao" maxlength="3" value="{{ $item['indice_correcao']  ?? '' }}" >
</div>

<div class="form-group col-md-4 wd-160">
    <label>Fundo de reserva:</label>
    <input type="text" class="form-control realFomato  wd-120" name="fundo_reserva" value="{{ $item['fundo_reserva']  ?? '' }}" >
</div>

<div class="form-group col-md-4 wd-160">
    <label>Seguro prestativa:</label>
    <input type="text" class="form-control realFomato  wd-120" name="seguro" value="{{ $item['seguro']  ?? '' }}" >
</div>

<div class="form-group col-md-4 wd-180">
    <label>Taxa administrativa:</label>
    <input type="text" class="form-control realFomato" name="taxa_administrativa" value="{{ $item['taxa_administrativa']  ?? '' }}" >
</div>

<div class="form-group col-md-4 wd-180">
    <label>Código de tabela:</label>
    <input type="text" class="form-control" name="codigo_tabela" value="{{ $item['codigo_tabela']  ?? '' }}" >
</div>

<div class="clearfix"></div>

<div class="form-group seletor-radio col-md-4" data-select="{{ $item['tipo_item']  ?? '' }}">
    <label>Tipo de bem:</label>
    <label class="fancy-radio">
        <input name="tipo_item" value="movel" type="radio">
        <span><i></i>Móvel</span>
    </label>
    <label class="fancy-radio">
        <input name="tipo_item" value="imovel" type="radio">
        <span><i></i>Imóvel</span>
    </label>
</div>

<div class="clearfix"></div>

<div class="form-group seletor-radio col-md-4" data-select="{{ $item['genero']  ?? '' }}">
    <label>Gênero:</label>
    <label class="fancy-radio">
        <input name="genero" value="m" type="radio">
        <span><i></i>Masculino</span>
    </label>
    <label class="fancy-radio">
        <input name="genero" value="f" type="radio">
        <span><i></i>Feminino</span>
    </label>
</div>


<div class="clearfix"></div>

<div class="form-group col-md-12">
    <label>Antecipação de taxa administrativa:</label>
    <input type="text" class="form-control realFomato wd-120" name="antecipacao_taxa_administrativa" value="{{ $item['antecipacao_taxa_administrativa']  ?? '' }}" >
</div>

<div class="clearfix"></div>







<div class="form-group col-md-4 wd-220">
    <label>Valor da primeira parcela:</label>
    <input type="text" class="form-control realFomato  wd-120" name="valor_primeira_parcela" value="{{ $item['valor_primeira_parcela']  ?? '' }}" >
</div>

<div class="form-group col-md-6">
    <label>Valor da taxa por extenso:</label>
    <input type="text" class="form-control" name="valor_por_extenso" value="{{ $item['valor_por_extenso']  ?? '' }}" >
</div>

<div class="form-group col-md-6">
    <label>Informação da primeira parcela:</label>
    <input type="text" class="form-control" name="info_primeira_parcela" value="{{ $item['info_primeira_parcela']  ?? '' }}" >
</div>

<div class="form-group col-md-6">
    <label>Cidade do contrato:</label>
    <input type="text" class="form-control" name="cidade_contrato" value="{{ $item['cidade_contrato']  ?? '' }}" >
</div>

