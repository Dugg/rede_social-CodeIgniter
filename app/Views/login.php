<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="files/style.css">
    <script src="files/index.js"></script>
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
    </style>
</head>
<body class="utiliti">
    <div class="card">
        <div class="card__side">
            <div class="titulo">
                <h1>LOG IN</h1>
            </div>
            <form class="login_form" action="ValidaLogin" method="post">
                <input class="login_input" type="text" placeholder="Username" name="login" >
                <input class="login_input" type="password" placeholder="Password" name="senha" required>
                <button class="login_button" type="submit">Login</button>
            </form>
            <form class="login_form" action="ValidaLogin" method="get">
                <button class="cadastrar_button" type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
</body>
</html>