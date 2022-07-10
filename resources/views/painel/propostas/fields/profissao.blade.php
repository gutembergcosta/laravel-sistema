<div class="form-group col-md-12">
    <h3>Informações profissionais</h3>
</div>


<div class="form-group col-md-6">
    <label>Profissão:</label>
    <input type="text" class="form-control" name="profissao" value="{{ $item['profissao']  ?? '' }}" required >
</div>

<div class="form-group col-md-4 wd-200">
    <label>Renda mensal:</label>
    <input type="text" class="form-control" name="renda_mensal" value="{{ $item['renda_mensal']  ?? '' }}" required >
</div>

<div class="form-group col-md-4 wd-200">
    <label>Renda complementar:</label>
    <input type="text" class="form-control" name="renda_complementar" value="{{ $item['renda_complementar']  ?? '' }}" required >
</div>

<div class="form-group col-md-4 wd-200" >
    <label>Tempo trabalho (anos):</label>
    <input type="text" class="form-control" name="tempo_trabalho" value="{{ $item['tempo_trabalho']  ?? '' }}" required >
</div>