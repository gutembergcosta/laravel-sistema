<!DOCTYPE html>
<html>
<head>
    <title>Email</title>
</head>
<body>
    <h2>Solicitação de cadastro</h2>
    
    <p>
        <strong>Nome:</strong> {{ $data['nome'] }} <br>
        <strong>Email:</strong> {{ $data['email'] }} <br>
        <strong>Telefone:</strong> {{ $data['telefone'] }} <br>
    </p>

    <h3>Dados de localização</h3>
    <p>
        <strong>Endereço:</strong> {{ $data['endereco'] }} - Número:</strong> {{ $data['numero'] }} <br>
        <strong>Complemento:</strong> {{ $data['complemento'] }} <br>
        <strong>Bairro:</strong> {{ $data['bairro'] }} <br>
        <strong>Cidade:</strong> {{ $data['cidade'] }} - {{ $data['uf'] }} <br>
    </p>
    
</body>
</html> 