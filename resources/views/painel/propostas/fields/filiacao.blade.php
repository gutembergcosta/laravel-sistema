<div class="form-group col-md-12">
    <h3>Filiação</h3>
</div>

<div class="form-group col-md-6">
    <label>Nome da mãe:</label>
    <input type="text" class="form-control" name="nome_mae" value="{{ $item['nome_mae']  ?? '' }}" required >
</div>

<div class="form-group col-md-6">
    <label>Nome do pai:</label>
    <input type="text" class="form-control" name="nome_pai" value="{{ $item['nome_pai']  ?? '' }}">
</div>