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
        background-color: #f5f8fa;
        margin: 0;
        padding: 0;
    }

    .container {
        display: flex;
        justify-content: space-between;
        max-width: 100%;
        height: 100vh;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .left-column {
        flex-basis: 25%;
        padding-right: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .middle-column {
        flex-basis: 50%;
    }

    .right-column {
        flex-basis: 25%;
        padding-left: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 8px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    .table th {
        background-color: #f5f8fa;
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
        height: 100vh;
    }

    .card__side {
        background-color: #fff;
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
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 14px;
        outline: none;
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
        background-color: #f5f8fa;
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
        color: #333;
    }

    .tweets {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        margin-top: 20px;
    }

    .tweets h2 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .tweet {
        display: flex;
        align-items: flex-start;
        border-bottom: 1px solid #ddd;
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
        color: #333;
        font-size: 18px;
        cursor: pointer;
        padding: 5px;
    }

    .popup {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
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
        color: #333;
        text-decoration: none;
    }
</style>

    <title>Tela no Estilo do Twitter</title>
</head>

<body>
    <div class="container">
        <div class="left-column">
            <div class="top-section">
                <a href="#" class="button">Home</a>
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at feugiat mauris, sed mattis lacus.
                                Sed id pharetra nunc.</p>
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
    function openPopup(event) {
        event.stopPropagation();

        var popup = event.target.nextElementSibling;
        if (popup.classList.contains('show')) {
            popup.classList.remove('show');
        } else {
            popup.classList.add('show');
        }
    }

    // Adicionando um listener para fechar o popup quando houver um clique fora do botão
    document.addEventListener('click', function() {
        var popups = document.querySelectorAll('.popup');
        popups.forEach(function(popup) {
            popup.classList.remove('show');
        });
    });
</script>

</html>