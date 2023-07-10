<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="files/style.css">
    <script src="files/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/bd9b7e619e.js" crossorigin="anonymous"></script>
    <title>Usuarios</title>
    <style>
        .utiliti {
  background-color: #15202b;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.card {
  background-color: #fff;
  border-radius: 14px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  width: 350px;
}

.card__side {
  padding: 20px;
}

.titulo {
  text-align: center;
  margin-bottom: 20px;
}

.titulo h1 {
  color: #1da1f2;
  font-size: 20px;
  font-weight: bold;
}

.login_form {
  display: flex;
  flex-direction: column;
}

.login_input {
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccd6dd;
  border-radius: 4px;
  font-size: 14px;
}

.login_button {
  background-color: #1da1f2;
  color: #fff;
  padding: 10px;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  margin-bottom: 5px;
}

.login_button:hover {
  background-color: #0c87b8;
}

.cadastrar_button {
  background-color: #15202b;
  color: #fff;
  padding: 10px;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  margin-bottom: 5px;
}
    </style>
</head>
<body class="utiliti">
    <div class="card">
        <div class="card__side">
            <div class="titulo">
                <h1>CADASTRAR-SE</h1>
            </div>
            <form class="login_form">
                <input class="login_input" type="text" placeholder="Username" name="login" id="login"required>
                <input class="login_input" type="password" placeholder="Password" name="senha" id="senha"required>
                <input class="login_input" type="email" placeholder="Email" name="email" id="email"required>
                <button class="login_button">Enviar</button>
            </form>
            <form class="login_form" action="login" method="get">
                  <button class="cadastrar_button" type="submit">Cancelar</button>
            </form>
        </div>
    </div>
</body>
<script>
      $(document).ready(function() {
        $('.login_button').click(function(event) {
            event.preventDefault(); // Evita o envio padrão do formulário
            var login = document.getElementById("login").value;
            var senha = document.getElementById("senha").value;
            var email = document.getElementById("email").value;

            // Faça a requisição AJAX
            $.ajax({
                url: 'SocialMedia/cadastraUsuario',
                type: 'POST',
                data: {
                    'login': login,
                    'senha': senha,
                    'email': email
                },
                success: function(response) {
                    console.log('Requisição bem-sucedida:', response);
                    window.location.href('login');
                },
                error: function(xhr, status, error) {
                    console.log('Erro na requisição:', error);
                    alert("Usuário já existente.");
                }
            });
        });
    });
</script>
</html>