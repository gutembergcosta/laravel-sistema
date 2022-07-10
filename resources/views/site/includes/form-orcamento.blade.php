<h3>
    Adquira seu consórcio
</h3>

<div id="msgz"></div>

<form id="formulario" action="{{ url($actionForm) }}" method="POST">

    @csrf

    <input type="hidden" name="titulo" value="{{ $tituloPagina }}"  >

    <div class="area-orcamento">

        <div class="nome flex">
            <label>Nome</label>
            <input type="text" name="nome" >
        </div>

        <div class="email flex">
            <label>Email</label>
            <input type="text" name="email" >
        </div>

        <div class="telefone flex">
            <label>Telefone</label>
            <input type="text" name="telefone" >
        </div>
        <div class="valor flex">
            <label>Valor</label>
            <select name="valor">
                <option></option>

                @php

                    $seletores = explode("|",$produto['seletores']) ;

                    foreach ($seletores as $item) {

                        $valor = 'R$ '.$item;

                        echo "<option value='$valor' >$valor</option>";
                    }

                @endphp

            </select>
        </div>

        <div class="footer flex total">
            <button class="btn_form m-auto" type="submit">Enviar</button>
        </div>
        
    </div>

</form>

<script>
    $(document).ready(function () {
        $("#formulario").submit(function (e) {
            e.preventDefault();
            var data = $(this).serializeArray();
            enviaForm(data, $(this).attr('action'));
        });
    });
</script>
        
