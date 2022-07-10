<div class="form-group col-md-12">
    <h3>Documentos</h3>
</div>

<div class="form-group col-md-4 wd-200">
    <label>CPF:</label>
    <input type="text" class="form-control cpf" name="cpf" value="{{ $item['cpf']  ?? '' }}" required >
</div>

<div class="form-group col-md-4 wd-200">
    <label>RG:</label>
    <input type="text" class="form-control" name="rg" value="{{ $item['rg']  ?? '' }}" required >
</div>

<div class="form-group col-md-4">
    <label>Data de expedição:</label>
    <input type="text" name="data_expedicao" class="form-control wd-200 data_linha" value="{{ $item['data_expedicao']  ?? '' }}" required >
</div>