<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Estilos personalizados */

        body {
            font-family: Arial, sans-serif;
            background-color: #15202b;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: space-between;
            max-width: 100%;
            min-height: 100vh;
            background-color: #192734;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .left-column {
            flex-shrink: 0;
            width: 200px;
            padding-right: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .middle-column {
            flex-grow: 1;
            overflow-y: auto;
            overflow-x: hidden;
            max-height: 100vh;
        }

        .right-column {
            flex-shrink: 0;
            width: 200px;
            padding-left: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 8px;
            border-bottom: 1px solid #2e4451;
            text-align: left;
        }

        .table th {
            background-color: #192734;
            font-weight: bold;
        }

        .button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #1da1f2;
            color: #fff;
            border: none;
            border-radius: 9999px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }

        .button_home {
            display: inline-block;
            padding: 8px 16px;
            background-color: #1da1f2;
            color: #fff;
            border: none;
            border-radius: 9999px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            margin-bottom: 10px;
        }

        .sair-btn {
            margin-top: 20px;
            display: block;
            text-decoration: none;
        }

        .cadastrar-btn {
            display: block;
            margin-top: 10px;
            text-decoration: none;
        }

        .card {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .card__side {
            background-color: #192734;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .titulo {
            text-align: center;
            margin-bottom: 20px;
        }

        .titulo h1 {
            font-size: 24px;
            color: #1da1f2;
        }

        .login_form {
            text-align: center;
        }

        .login_input {
            display: block;
            margin: 10px auto;
            padding: 8px 16px;
            width: 100%;
            border: 1px solid #2e4451;
            border-radius: 4px;
            font-size: 14px;
            outline: none;
            background-color: #15202b;
            color: #fff;
        }

        .login_button {
            display: block;
            margin: 20px auto;
            padding: 8px 16px;
            background-color: #1da1f2;
            color: #fff;
            border: none;
            border-radius: 9999px;
            font-weight: bold;
            cursor: pointer;
            outline: none;
        }

        .news {
            background-color: #192734;
            padding: 20px;
            border-radius: 8px;
        }

        .news h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .news p {
            font-size: 14px;
            line-height: 1.5;
            color: #fff;
        }

        .tweets {
            background-color: #15202b;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .tweets h2 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #fff;
        }

        .tweet {
            display: flex;
            align-items: flex-start;
            border-bottom: 1px solid #2e4451;
            padding: 10px 0;
        }

        .tweet img {
            width: 48px;
            height: 48px;
            margin-right: 10px;
            border-radius: 50%;
        }

        .tweet .user {
            font-weight: bold;
            margin-bottom: 5px;
            color: #1da1f2;
        }

        .tweet .message {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .tweet .user-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .tweet .message p {
            margin-bottom: 10px;
            color: #fff;
        }

        .tweet .actions {
            display: flex;
            align-items: center;
        }

        .tweet .actions img {
            width: 16px;
            margin-right: 8px;
        }

        .tweet .btn-like,
        .tweet .btn-retweet {
            background-color: transparent;
            color: #1da1f2;
            border: none;
            cursor: pointer;
            outline: none;
        }

        .tweet .btn-like img,
        .tweet .btn-retweet img {
            width: 16px;
            margin-right: 8px;
        }

        .tweet {
            position: relative;
        }

        .btn-options {
            position: absolute;
            top: 0;
            right: 0;
            background: none;
            border: none;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            padding: 5px;
        }

        .popup {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #192734;
            border: 1px solid #2e4451;
            border-radius: 4px;
            padding: 5px;
        }

        .popup.show {
            display: block;
        }

        .popup ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .popup ul li {
            padding: 5px;
        }

        .popup ul li a {
            color: #fff;
            text-decoration: none;
        }

        /* Media queries */

        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
                height: auto;
                padding: 10px;
            }

            .left-column,
            .right-column {
                width: 100%;
                padding: 0;
            }

            .middle-column {
                margin-top: 20px;
            }
        }

        @media screen and (max-width: 480px) {

            .tweets,
            .news {
                padding: 10px;
            }

            .tweet img {
                width: 36px;
                height: 36px;
                margin-right: 8px;
            }

            .tweet .user-name,
            .tweet .message p {
                font-size: 12px;
            }

            .btn-options {
                font-size: 14px;
            }
        }

        .top-section {
            text-align: center;
            padding-top: 10px;
            display: flex;
            flex-direction: column;
        }

        .bottom-section {
            text-align: center;
            padding-bottom: 10px;
        }

        .tweet-dialog {
            font-family: Arial, sans-serif;
        }

        .tweet-dialog form {
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .tweet-dialog label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .tweet-dialog textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: none;
            margin-bottom: 10px;
        }

        .tweet-dialog button {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
        }

        .tweet-dialog .cancel {
            background-color: #1da1f2;
        }

        .tweet-dialog .confirm {
            background-color: #dc3545;
        }
    </style>

    <title>Tela no Estilo do Twitter</title>
</head>

<body>
    <div class="container">
        <div class="left-column">
            <div class="top-section">
                <a href="#" class="button_home">Home</a>
                <button class="button" id="open-dialog-btn">Abrir Popup</button>
                <dialog class="tweet-dialog">
                    <form id="envio_Post">
                        <label for="tweet-input">Digite o seu tweet:</label>
                        <textarea id="tweet-input" rows="4" placeholder="Digite o seu tweet..." required></textarea>
                        <button class="cancel">Cancelar</button>
                        <button class="confirm">Confirmar</button>
                    </form>
                </dialog>
            </div>
            <div class="bottom-section">
                <a href="#" class="button">Usuário</a>
            </div>
        </div>

        <div class="middle-column">
            <div class="tweets">
                <h2>Tweets</h2>
                <?php foreach ($dados as $value) { ?>
                    <div class="tweet">
                        <div class="user">
                            <img src="https://via.placeholder.com/48" alt="User">
                            <span><?php echo $value['login']; ?></span>
                        </div>
                        <div class="message">
                            <div class="user-name"><?php echo $value['login']; ?></div>
                            <p><?php echo $value['senha'] ?></p>
                            <div class="actions">
                                <button class="btn-like"><img src="files/heart-icon.png" alt="Like"></button>
                                <button class="btn-retweet"><img src="files/retweet-icon.png" alt="Retweet"></button>
                                <button onclick="openPopup(event)" class="btn-options">...</button>
                                <div class="popup">
                                    <ul>
                                        <li><a href="#">Editar</a></li>
                                        <li><a href="#">Excluir</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="right-column">
            <div class="news">
                <h2>Notícias</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur vitae diam id consequat. Donec ut
                    faucibus orci. Aliquam dignissim, eros id dignissim placerat, dui metus tempor lectus, et sollicitudin urna
                    tortor nec libero.</p>
            </div>
        </div>
    </div>

</body>

<script>
    // Recupera o valor do login do Local Storage
    var login = localStorage.getItem('login');

    // Exibe o valor no console
    console.log(login);

    function openPopup(event) {
        var target = event.target;
        var popup = target.parentElement.querySelector('.popup');
        popup.classList.toggle('show');
    }

    const dialog = document.querySelector('.tweet-dialog');
    const openDialogBtn = document.getElementById('open-dialog-btn');

    openDialogBtn.addEventListener('click', () => {
        dialog.showModal();
    });

    dialog.addEventListener('close', () => {
        // Limpar o conteúdo do formulário ao fechar o dialog
        dialog.querySelector('form').reset();
    });

    $(document).ready(function() {
        $('#envio_Post').submit(function(event) {
            event.preventDefault(); // Evita o envio padrão do formulário
            var mensagem = document.getElementById("tweet-input");

            // Faça a requisição AJAX
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: {
                    'usuario': $usuario = $_SESSION['usuario'],
                    'mensagem': $mensagem
                },
                success: function(response) {
                    console.log('Requisição bem-sucedida:', response);
                    // Faça algo com a resposta recebida
                },
                error: function(xhr, status, error) {
                    console.log('Erro na requisição:', error);
                    // Lide com o erro
                }
            });
        });
    });
</script>

</html>