<!doctype html>
<html lang="pt-br">

<head>
    
<title>Painel de controle</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon.png') }}">

<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist-custom.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('assets/datepicker/css/datepicker.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/select2/dist/css/select2.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/estilos.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/scripts/klorofil-common.js') }}"></script>
<script src="{{ asset('assets/mask/dist/jquery.mask.min.js') }}"></script>
<script src="{{ asset('assets/datepicker/js/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/datepicker/js/datepicker.pt-BR.js') }}"></script>
<script src="{{ asset('assets/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/tinymce/tinymce.min.js') }}" ></script>
<script src="{{ asset('assets/priceformat/priceformat.js') }}" ></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>

<!-- Hayageek ------------------------->
<link href="{{ asset('assets/hayageek/uploadfile.css') }}" rel="stylesheet">
<script src="{{ asset('assets/hayageek/jquery.uploadfile.js') }}"></script>

@php
        $tela = (isMobile())? 'mobile' : 'desktop';
@endphp


@if ($tela == 'mobile')
    <style>
        .navbar {
            height: 60px;
        }

        .container-fluid{
            padding: 0px;
        }

        #sidebar-nav, .main-content {
            padding-top: 0px!important;
        }

        .main {
            padding-top: 80px;
            padding-top: 0px!important;
        }

        .sidebar {
            margin-top: 60px;
        }

        .formulario .area, .formulario .side-area  {
            width: 100%;
        }

      


        
    </style>
@endif

  

</head>

<body>
    @yield('pagina')
</body>




<script src="{{ asset('assets/scripts/base.js') }}"></script>

<script>

    function enviaForm(dataform,destino){

        $.ajax({
            url: destino,
            type:'POST',
            dataType: "json",
            data: dataform,
            success: function(data) {
                if(data['msg'])alert(data['msg']);
                if(data['errors'])msgAlerta(data['errors']);
                if(data['destino']){
                    if(data['destino'] == 'reload'){
                        location.reload();
                    }else{
                        window.location.href = data['destino'];
                    }
                }
            },
            error: function(data) {
                msgAlerta(JSON.parse(data.responseText).errors)
            },
        });
    }

    function blocoErroMsg(msg){
        return  `<li><strong>${msg}</strong></li>`;
    }

    function msgAlerta(matriz){

        let divHtml = '';

        Object.values(matriz).forEach(val => {
            divHtml += blocoErroMsg(val)
        });

        let alertHtml = `<div class='alert alert-danger alert-dismissible'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <ul>
                                ${divHtml}
                            </ul>
                         </div>`;
        

        $("#msgz").text('').html(alertHtml);
        alert('Erro');
        gotop();

    }

    $(document).on('click', '.remover-arquivo',function () {	
        if (confirm("Deseja realmente deletar este item?") == true) {
            
            let excluido = 0;

            if($(this).data('item')){
                $.ajax({
                    url: "{{ url('admin/deletar-arquivo') }}",
                    dataType: "text",
                    async:false,
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'item': $(this).data('item')                                        
                    },
                    success: function (data) 
                    {
                        console.log('data: ' +data);
                        if(data == 1){
                            excluido = 1;
                        }else{
                            alert("Erro");
                        }
                        
                    },
                    error: function ()
                    {
                        alert("Erro");
                    }
                });
            }
                
            if(excluido == 1){
                $(this).closest('._item').fadeOut(300); return;
            }

        }
    });



    $(document).on('click', '.deletar',function () {	
        if (confirm("Deseja realmente deletar este item??") == true) {
            
            let excluido = 0;

            if($(this).data('tipo')){
                $.ajax({
                    url: "{{ url('admin/deletar-') }}"+ $(this).data('tipo'),
                    dataType: "text",
                    async:false,
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': $(this).data('id')                                       
                    },
                    success: function (data) 
                    {
                        console.log('data: ' +data);
                        if(data == 1){
                            alert('Item excluído com sucesso!');

                            excluido = 1;
                        }else{
                            alert("Erro");
                        }
                        
                    },
                    error: function ()
                    {
                        alert("Erro");
                    }
                });
            }
                
            if(excluido == 1){
                $(this).closest('tr').fadeOut(300); 
                $('#linha-'+$(this).data('tkn')).fadeOut(300); 
                
                return;
            }

        }
    });

    $(".seletor-simples").map(function() {
        
        let selecionado = $(this).data('select');
        if(selecionado) $(this).val(selecionado)
        
    });

      
    $(".seletor-radio").map(function() {
        
        let selecionado = $(this).data('select');
        if(selecionado) $(this).val(selecionado);
        if(!selecionado) return;

        $(this).find("[value=" + selecionado + "]").prop('checked', true);

        //$("input[name="+nome_radio+"][value=" + selecionado + "]").prop('checked', true);
        
    });
    

    </script>
    

</html>