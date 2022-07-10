<div class="form-group col-md-12">
    <h3>Dados pessoais</h3>
</div>

<div class="form-group col-md-6">
    <label>Nome completo:</label>
    <input type="text" class="form-control" name="nome" value="{{ $item['nome']  ?? '' }}" required >
</div>

<div class="form-group col-md-6">
    <label>Email:</label>
    <input type="email" class="form-control" name="email" value="{{ $item['email']  ?? '' }}" required >
</div>

<div class="form-group col-md-4 wd-200">
    <label>Data de nascimento:</label>
    <input type="text" name="data_nascimento" class="form-control wd-120 data_linha" value="{{ $item['data_nascimento']  ?? '' }}" required >
</div>

<div class="form-group col-md-4 wd-220">
    <label>Estado civil:</label>
    <select class="form-control seletor-simples" name='estado_civil' data-select="{{ $item['estado_civil']  ?? '' }}" required >
        <option value=""></option>
        <option value="casado">Casado</option>
        <option value="solteiro">Solteiro</option>
        <option value="outros">outros</option>

    </select>
</div>

<div class="quebra"></div>

<div class="form-group col-md-4 wd-220">
    <label>Telefone 01:</label>
    <input type="text" class="form-control telefone-br" name="tel01" value="{{ $item['tel01']  ?? '' }}" required >
</div>

<div class="form-group col-md-4 wd-220">
    <label>Telefone 02:</label>
    <input type="text" class="form-control telefone-br" name="tel02" value="{{ $item['tel02']  ?? '' }}">
</div>

<div class="form-group col-md-4 wd-220">
    <label>Telefone 03:</label>
    <input type="text" class="form-control telefone-br" name="tel03" value="{{ $item['tel03']  ?? '' }}">
</div>
