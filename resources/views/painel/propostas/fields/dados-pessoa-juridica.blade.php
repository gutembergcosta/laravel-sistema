<div class="form-group col-md-12">
    <h3>Dados da empresa</h3>
</div>

<div class="form-group col-md-6">
    <label>Nome fantasia:</label>
    <input type="text" class="form-control" name="nome_fantasia" value="{{ $item['nome_fantasia']  ?? '' }}" required >
</div>

<div class="form-group col-md-6">
    <label>Razão social:</label>
    <input type="text" class="form-control" name="razao_social" value="{{ $item['razao_social']  ?? '' }}" required >
</div>

<div class="form-group col-md-4 wd-180">
    <label>Data de fundação:</label>
    <input type="text" name="data_nascimento" class="form-control wd-120 data_linha" value="{{ $item['data_nascimento']  ?? '' }}" required >
</div>

<div class="form-group col-md-4 wd-200">
    <label>CNPJ:</label>
    <input type="text" name="cnpj" class="form-control cnpj" value="{{ $item['cnpj']  ?? '' }}" required >
</div>

<div class="form-group col-md-4 wd-200">
    <label>Inscrição Estadual:</label>
    <input type="text" name="insc_estadual" class="form-control" value="{{ $item['insc_estadual']  ?? '' }}" required >
</div>

<div class="form-group col-md-4 wd-180">
    <label>Capital Social:</label>
    <input type="text" name="capital_social" class="form-control" value="{{ $item['capital_social']  ?? '' }}" required >
</div>


<div class="form-group col-md-4 wd-220">
    <label>Empresa tipo:</label>
    <select class="form-control seletor-simples" name='empresa_tipo' data-select="{{ $item['empresa_tipo']  ?? '' }}" required >
        <option value=""></option>
        <option value="ltda">LTDA</option>
        <option value="me">ME</option>
        <option value="eireli">EIRELI</option>
        <option value="outros">outros</option>

    </select>
</div>

<div class="form-group col-md-4 wd-220">
    <label>Atividade:</label>
    <select class="form-control seletor-simples" name='atividade' data-select="{{ $item['atividade']  ?? '' }}" required >
        <option value=""></option>
        <option value="comercial">Comercial</option>
        <option value="financeiro">Financeiro</option>
        <option value="outros">outros</option>

    </select>
</div>

<div class="form-group col-md-4 wd-240">
    <label>Faturamento médio mensal:</label>
    <input type="text" name="faturamento_medio" class="form-control wd-120" value="{{ $item['faturamento_medio']  ?? '' }}" required >
</div>

