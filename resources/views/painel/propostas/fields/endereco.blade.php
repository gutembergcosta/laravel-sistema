<div class="form-group col-md-12">
    <h3>{{$titulo}}</h3>
</div>

<div class="form-group col-md-6">
    <label>Rua:</label>
    <input type="text" class="form-control" name="rua" value="{{ $item['rua']  ?? '' }}" required >
</div>

<div class="form-group col-md-2 wd-100">
    <label>Número:</label>
    <input type="text" class="form-control" name="numero" value="{{ $item['numero']  ?? '' }}" required >
</div>

<div class="form-group col-md-3">
    <label>Complemento:</label>
    <input type="text" class="form-control" name="complemento" value="{{ $item['complemento']  ?? '' }}">
</div>

<div class="form-group col-md-5">
    <label>Bairro:</label>
    <input type="text" class="form-control" name="bairro" value="{{ $item['bairro']  ?? '' }}" required >
</div>

<div class="form-group col-md-5">
    <label>Cidade:</label>
    <input type="text" class="form-control" name="cidade" value="{{ $item['cidade']  ?? '' }}" required >
</div>

<div class="form-group col-md-3 wd-250">
    <label>UF:</label>
    <select class="form-control seletor-simples" name='uf' data-select="{{ $item['uf']  ?? '' }}" required >
        <option value=""></option>
        <option value="AC">Acre</option>
        <option value="AL">Alagoas</option>
        <option value="AP">Amapá</option>
        <option value="AM">Amazonas</option>
        <option value="BA">Bahia</option>
        <option value="CE">Ceará</option>
        <option value="DF">Distrito Federal</option>
        <option value="ES">Espirito Santo</option>
        <option value="GO">Goiás</option>
        <option value="MA">Maranhão</option>
        <option value="MS">Mato Grosso do Sul</option>
        <option value="MT">Mato Grosso</option>
        <option value="MG">Minas Gerais</option>
        <option value="PA">Pará</option>
        <option value="PB">Paraíba</option>
        <option value="PR">Paraná</option>
        <option value="PE">Pernambuco</option>
        <option value="PI">Piauí</option>
        <option value="RJ">Rio de Janeiro</option>
        <option value="RN">Rio Grande do Norte</option>
        <option value="RS">Rio Grande do Sul</option>
        <option value="RO">Rondônia</option>
        <option value="RR">Roraima</option>
        <option value="SC">Santa Catarina</option>
        <option value="SP">São Paulo</option>
        <option value="SE">Sergipe</option>
        <option value="TO">Tocantins</option>
    </select>
</div>