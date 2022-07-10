@extends('layouts.impressao')


@section('pagina')
    
    <!-- MAIN CONTENT -->
    <div class="container">

        <style>
            h1{font-weight: 400; margin-bottom: 10px}

            .bg-titular{
                background: #6eb7db; 
                font-size: 16px; 
                font-weight: bold;
                text-transform: uppercase; 
            
            }
           
            .dados-info{ margin: 10px 0 0 0 }
            ._doc{margin-bottom: 25px}
            .break-page { page-break-before: always; }
            .imprimir{margin: 20px auto;display: block;width: fit-content;}

            .doxc{
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px
            }

            .doxc table{
                
            }

            .doxc .mb-0{
                margin-bottom: 0;
                border-bottom: none!important;
            }

            .doxc .mb-0 td{
                border-bottom: none!important;
            }

            @media print {
                .imprimir{display: none}
            }
        </style>



        <style >
            
        </style>
                        
        <div class="row">

            <div class="col-md-12">

                <a id="imprimir" class="btn btn-info imprimir">Imprimir</a>


                <div class="row">
                    <div class="col-md-12 doxc">

                        @include('painel.propostas.doc.dados-'.$tipoProposta)
                        @include('painel.propostas.doc.endereco')
                        @if ($tipoProposta != 'pessoa-fisica' )
                            @include('painel.propostas.doc.profissao')
                        @endif
                        @include('painel.propostas.doc.data-banco')
                
                        @if ($item['status'] != 'aprovada' )
                            @include('painel.propostas.doc.data-plano')
                        @endif

                        @include('painel.propostas.doc.pagamento')
                        @include('painel.propostas.doc.texto')
                        
                        
                
                    </div>
                </div>

                
                
               

            </div>
        </div>
    </div>

    <script>


        $(document).ready(function () {

            $("#imprimir").click(function (e) {
                
                document.title = 'blah';
                window.print();

            });

            
        });

    </script>
    
@endsection

