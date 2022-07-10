<!DOCTYPE html>
<html>
<head>
    <title>Email</title>
</head>
<body>
    <h2>Mensagem do site</h2>
    
    <p>
        <strong>Nome:</strong> {{ $data['nome'] }} <br>
        <strong>Email:</strong> {{ $data['email'] }} <br>
        <strong>Telefone:</strong> {{ $data['telefone'] }} <br>
        <strong>Texto:</strong> <br> {{ $data['texto'] }} 
    </p>
</body>
</html> 