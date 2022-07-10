
<section id="base">

    <div class="pagina">

        <div class="area-titular" >
            <div class="titl" >
                <h2>
                    Seja nosso representante
                </h2>
                
            </div>

            <div class="texto-central">
                <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>

        <div class="area-pagina-cadastro">

            <div id="msgz"></div>


            <form id="formulario" action="{{ url($actionForm) }}" method="POST">
                
                @csrf

                <div class="area-cadastro">

                    <div class="nome flex">
                        <label>Nome</label>
                        <input type="text" name="nome" >
                    </div>

                    <div class="email flex">
                        <label>Email</label>
                        <input type="text" name="email" >
                    </div>

                    <div class="telefone flex">
                        <label>Whatsapp</label>
                        <input type="text" name="telefone" >
                    </div>
                    
                </div>

                <div class="area-cadastro">
                    <div class="endereco flex">
                        <label>Endereço</label>
                        <input type="text" name="endereco" >
                    </div>

                    <div class="numero flex">
                        <label>Número</label>
                        <input type="text" name="numero" >
                    </div>

                    <div class="complemento flex">
                        <label>Complemento</label>
                        <input type="text" name="complemento" >
                    </div>
                </div>

                <div class="area-cadastro">    
                    <div class="bairro flex">
                        <label>Bairro</label>
                        <input type="text" name="bairro" >
                    </div>

                    <div class="cidade flex">
                        <label>Cidade</label>
                        <input type="text" name="cidade" >
                    </div>

                    <div class="uf flex">
                        <label>UF</label>
                        <select class="form-control" name='uf' >

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
                </div>

                <div class="area-cadastro">
                    <div class="senha flex">
                        <label>Escolha uma senha</label>
                        <input type="password" name="senha" >
                    </div>
                </div>

                <div class="area-cadastro">
                    <div class="footer flex">
                        <button class="btn_form" type="submit"> Enviar</button>
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
        
        

          
        </div>
    </div>
    

</section>