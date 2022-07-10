<section id="numeros">
    <div class="pagina">

        <div class="area-titular" >
            <div class="titl" >
                <h2>
                    Número de contemplados
                </h2>
            </div>

            <div class="texto-central">
                {!! $dadosGerais['intro_contemplados'] !!}
            </div>
        </div>

        <div class="grid-numeros">
            <div>
                <h3>{{ $numeros['carros'] }}</h3>
                <p>Carros</p>
            </div>
            
            <div>
                <h3>{{ $numeros['imoveis'] }}</h3>
                <p>Imóveis</p>
            </div>
            
            <div>
                <h3>{{ $numeros['motos'] }}</h3>
                <p>Motos</p>
            </div>
            
            <div>
                <h3>{{ $numeros['caminhoes'] }}</h3>
                <p>Caminhões</p>
            </div>

            <div>
                <h3>{{ $numeros['eletronicos'] }}</h3>
                <p>Eletrônicos</p>
            </div>

        </div>
    </div>
</section>