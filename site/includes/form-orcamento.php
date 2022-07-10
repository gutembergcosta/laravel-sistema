<h3>
    Simule seu consórcio
</h3>

<form>
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

                <?php 
                
                    for ($i=1; $i <=50; $i++) 
                    { 
                        $opt = $i * 5;
                        $valor = number_format($opt, 3, '.', '.');

                        echo "<option value='$opt' >$valor</option>";
                    }

                ?>

            </select>
        </div>

        <div class="footer flex total">
            <button class="btn_form m-auto" type="submit">Solicitar orçamento</button>
        </div>
        
    </div>

</form>
        
