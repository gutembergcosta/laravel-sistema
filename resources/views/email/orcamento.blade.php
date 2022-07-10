<!DOCTYPE html>
<html>
<head>
    <title>Email</title>
</head>
<body>
    <h2>Solicitação de cotação</h2>


    <h3>Dados do produto</h3>
    <p>
        <strong>Título:</strong> {{ $data['titulo'] }} <br>
        <strong>Valor:</strong> R$ {{ $data['valor'] }} <br>
    </p>

    <h3>Dados do solicitante</h3>
    <p>
        <strong>Nome:</strong> {{ $data['nome'] }} <br>
        <strong>Email:</strong> {{ $data['email'] }} <br>
        <strong>Telefone:</strong> {{ $data['telefone'] }} <br>
    </p>
</body>
</html> 