<!DOCTYPE html>
<html>

<head>
    <title>Responder ao Tweet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #15202b;
            color: #fff;
            margin: 0;
        }

        .container {
            display: grid;
            grid-template-columns: 1fr 2fr 1fr;
            /* Definindo a coluna do meio como duas vezes mais larga */
            height: 100vh;
            /* Ocupa a altura total da tela */
            border-radius: 8px;
            background-color: #192734;
        }

        .left-column {
            background-color: #15202b;
            /* Cor de fundo da coluna esquerda */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .top-section {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }

        .button_home {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            background-color: #1da1f2;
            border-radius: 5px;
            margin-right: 10px;
        }

        #open-dialog-btn {
            color: #fff;
            background-color: #1da1f2;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
        }

        .tweet-dialog {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #15202b;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #fff;
            display: none;
            /* Ocultar o popup por padrão */
        }

        #envio_Post {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        #tweet-input {
            width: 100%;
            min-height: 80px;
            background-color: #14171a;
            border: none;
            color: #fff;
            resize: vertical;
        }

        .cancel,
        .confirm {
            padding: 8px 16px;
            background-color: #1da1f2;
            border: none;
            border-radius: 30px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }

        .bottom-section {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }

        .button {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            background-color: #1da1f2;
            border-radius: 5px;
        }

        .content {
            padding: 10px;
        }

        .tweet-container {
            background-color: #14171a;
            padding: 10px;
            border-radius: 10px;
        }

        .tweet {
            display: flex;
            align-items: flex-start;
        }

        .tweet-avatar {
            width: 50px;
            height: 50px;
            background-color: #fff;
            border-radius: 50%;
            margin-right: 10px;
        }

        .tweet-content {
            flex: 1;
        }

        .tweet-author {
            font-weight: bold;
        }

        .tweet-text {
            margin: 0;
        }

        .reply-section {
            margin-top: 10px;
        }

        .reply-input {
            width: 100%;
            min-height: 80px;
            background-color: #15202b;
            border: none;
            color: #fff;
            resize: vertical;
            margin-top: 10px;
            border-radius: 20px;
            /* Adicionado estilo de margem superior */
        }

        .reply-button {
            padding: 8px 16px;
            background-color: #1da1f2;
            border: none;
            border-radius: 30px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }

        .right-column {
            background-color: #15202b;
            /* Cor de fundo da coluna direita */
        }

        .news-container {
            padding: 10px;
        }

        .news-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .news-content {
            margin: 0;
        }

        .respostas-container {
            background-color: #14171a;
            padding: 10px;
            margin-top: 20px;
            border-radius: 18px;
        }

        .respostas-container h3 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .resposta {
            display: flex;
            align-items: flex-start;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #333;
        }

        .resposta:last-child {
            border-bottom: none;
        }

        .resposta-avatar {
            width: 40px;
            height: 40px;
            background-color: #fff;
            border-radius: 50%;
            margin-right: 10px;
        }

        .resposta-content {
            flex: 1;
        }

        .resposta-author {
            font-weight: bold;
        }

        .resposta-text {
            margin: 0;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="left-column">
            <div class="top-section">
                <a href="../home" class="button_home">Home</a>
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
        <div class="content">
            <div class="tweet-container">
                <div id="tweetDiv" class="tweet" data-post-id='<?php echo $dados['id_post']; ?>'>
                    <div class="tweet-avatar"></div>
                    <div class="tweet-content">
                        <?php foreach ($dados['post'] as $dado) { ?>
                            <span class="tweet-author"><?php echo $dado['login']; ?></span>
                            <p class="tweet-text"><?php echo $dado['mensagem']; ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="reply-section">
                    <textarea id="text_area" class="reply-input" placeholder="Escreva sua resposta..."></textarea>
                    <button class="reply-button" onclick="insert_comentario()">Responder</button>
                </div>
            </div>
            <div class="respostas-container">
                <h3>Respostas:</h3>
                <!-- Aqui você pode adicionar as respostas como elementos HTML -->
                <?php foreach ($dados['respostas'] as $dado) { ?>
                    <div class="resposta">
                        <div class="resposta-avatar"></div>
                        <div class="resposta-content">
                            <span class="resposta-author"><?php echo $dado['login']; ?></span>
                            <p class="resposta-text"><?php echo $dado['mensagem']; ?></p>
                        </div>
                    </div>
                <?php } ?>
                <!-- Adicione mais respostas conforme necessário -->
            </div>
        </div>
        <div class="right-column">
            <div class="news-container">
                <h2 class="news-title">Últimas Notícias</h2>
                <ol>
                    <li>DEADPOOL3: IMAGEM OFICIAL MOSTRA WOLWERINE AO LADO DE DEADPOOL</li>
                    <li>O TIO ELON MOSKA TA COM MEDO</li>
                </ol>  
            </div>
        </div>
    </div>
</body>
<script>
    function insert_comentario() {
        console.log('taclicando');
        var divElement = document.getElementById('tweetDiv');
        var text_area = document.getElementById('text_area')

        var id_post = divElement.getAttribute('data-post-id');
        var id_user = localStorage.getItem('id_user');
        var mensagem = text_area.value;
        // Faça a requisição AJAX
        $.ajax({
            url: '../SocialMedia/insert_comentarios_do_post',
            type: 'POST',
            data: {
                'id_post': id_post,
                'id_user': id_user,
                'mensagem': mensagem
            },
            success: function(response) {
                console.log('Requisição bem-sucedida:', response);
                location.reload();
                // Faça algo com a resposta recebida
            },
            error: function(xhr, status, error) {
                console.log('Erro na requisição:', error);
                // Lide com o erro
            }
        });
    }
</script>

</html>