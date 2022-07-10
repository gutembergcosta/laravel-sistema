
<section id="base">

    <div class="pagina">

        <div class="area-titular" >
            <div class="titl" >
                <h2>
                    Fale conosco
                </h2>
                
            </div>

            <div class="texto-central">
                <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>

        <div class="area-form">

            <div id="msgz"></div>

            <form id="formulario" class="grid-area-form" action="{{ url($actionForm) }}" method="POST">

                @csrf

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

                <div class="texto flex">
                    <label>Texto</label>
                    <textarea name="texto" id="" cols="30" rows="8"></textarea>
                </div>

                <div class="footer flex">
                    <button class="btn_form" type="submit"> Enviar</button>
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
          
        </div>
    </div>
    

</section>