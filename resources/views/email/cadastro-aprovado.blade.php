<!DOCTYPE html>
<html>
<head>
    <title>Email</title>
</head>
<body>
    <h2>Cadastro aprovado</h2>

    <p>Sua solicitação de cadastro como nosso representante foi aprovado com sucesso com os seguintes dados</p>
    
    <h3>Dados de acesso</h3>

    <p>
        <strong>Acesso:</strong> <a href="https://consorcionetbrasil.com.br/login">https://consorcionetbrasil.com.br/login</a>  <br>
        <strong>Email:</strong> {{ $data['email'] }} <br>
        <strong>Senha:</strong> {{ $data['senha'] }} <br>
    </p>


</body>
</html> 