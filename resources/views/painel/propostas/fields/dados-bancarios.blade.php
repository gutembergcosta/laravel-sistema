<div class="form-group col-md-12">
    <h3>Dados Bancários</h3>
</div>


<div class="form-group col-md-4 wd-220">
    <label>Tipo da conta:</label>
    <select class="form-control seletor-simples" name='tipo_conta' data-select="{{ $item['tipo_conta']  ?? '' }}" required >
        <option value=""></option>
        <option value="corrente">Conta Corrente</option>
        <option value="poupanca">Conta Poupança</option>
        <option value="naotem">Não tem</option>

    </select>
</div>

<div class="form-group col-md-4 wd-250">
    <label>Banco:</label>
    <input type="text" class="form-control" name="banco" value="{{ $item['banco']  ?? '' }}"  >
</div>

<div class="form-group col-md-4 wd-200">
    <label>Agência:</label>
    <input type="text" class="form-control" name="agencia" value="{{ $item['agencia']  ?? '' }}"  >
</div>

<div class="form-group col-md-4 wd-200">
    <label>Número da conta:</label>
    <input type="text" class="form-control" name="conta" value="{{ $item['conta']  ?? '' }}"  >
</div>
