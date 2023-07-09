<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Tela no Estilo do Twitter</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/bd9b7e619e.js" crossorigin="anonymous"></script>

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
                        <button onclick="closeDialog()" class="cancel">Cancelar</button>
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
                <?php foreach ($dados as $value) {
                ?>
                    <div class="tweet">
                        <div class="user">
                            <img src="https://via.placeholder.com/48" alt="User">
                            <span><?php echo $value['login']; ?></span>
                        </div>
                        <div id="<?php echo $value['post_id'] ?>" class="message">
                            <div class="user-name"><?php echo $value['login']; ?></div>
                            <p><?php echo $value['mensagem'] ?></p>
                            <div class="actions">
                                <button class="btn-like" data-id-like='0' data-liked="false" data-post-id="<?php echo $value['post_id'] ?>" onclick="like(this)">
                                    <i class="fas fa-heart"></i>
                                    <span class="likes-count"><?php echo $value['quantidade_likes'] ?></span>
                                </button>
                                <a href="tweet/<?php echo $value['post_id']; ?>">
                                    <button class="btn-retweet">
                                        <i class="fas fa-comment"></i>
                                        <span class="comments-count"><?php echo $value['quantidade_comentarios'] ?></span>
                                    </button>
                                </a>
                                <button data-post-id="<?php echo $value['post_id'] ?>" onclick="openPopup(event)" class="btn-options">...</button>
                                <div class="popup">
                                    <ul data-post-id="<?php echo $value['post_id'] ?>">
                                        <li><button onclick="editarMensagem(event)">Editar</button></li>
                                        <li><button onclick="excluirPost(event)">Excluir</button></li>
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
                <p>PICAS VOADORAS CAEM DO CÉU</p>
            </div>
        </div>
    </div>

</body>

<script>
    window.addEventListener('load', () => {
        var id_user = localStorage.getItem('id_user');
        $.ajax({
            url: 'SocialMedia/get_likes',
            type: 'POST',
            data: {
                'id_user': id_user,
            },
            success: function(response) {
                console.log('Requisição bem-sucedida:', response);
                var likes = response.likes;
                likes.forEach(function(like) {
                    var postID = like.post_id;
                    var likeID = like.id_like
                    var likeButton = document.querySelector(`button[data-post-id="${postID}"]`);
                    if (likeButton) {
                        likeButton.classList.add('liked');
                        likeButton.setAttribute('data-liked', 'true');
                        likeButton.setAttribute('data-id-like', likeID);
                    }
                });
            },
            error: function(xhr, status, error) {
                console.log('Erro na requisição:', error);
                // Lide com o erro
            }
        });

        $.ajax({
            url: 'SocialMedia/getPostIdByAuthorId',
            type: 'POST',
            data: {
                'id_autor': id_user,
            },
            success: function(response) {
                console.log('Requisição bem-sucedida:', response);
                var postsID = response.posts;
                var btnOptionsList = document.querySelectorAll('button.btn-options[data-post-id]');

                btnOptionsList.forEach(function(btnOptions) {
                    var postId = btnOptions.getAttribute('data-post-id');

                    postsID.forEach(function(post) {
                        if (post.post_id == postId) {
                            btnOptions.style.display = 'block';
                        }
                    });

                    console.log(postId);
                });
            },
            error: function(xhr, status, error) {
                console.log('Erro na requisição:', error);
                // Lide com o erro
            }
        });

    });

    function editarMensagem(event) {
        var ulElement = event.target.parentNode.parentNode;
        var post_id = ulElement.getAttribute('data-post-id');

        var post = document.getElementById(post_id)
        var mensagem = post.querySelector('p')
        var mensagemAtual = mensagem.textContent;

        var inputElement = document.createElement('input');
        inputElement.type = 'text';
        inputElement.value = mensagemAtual;
        inputElement.classList.add('edit-input');

        mensagem.parentNode.replaceChild(inputElement, mensagem);

        inputElement.focus();
        inputElement.addEventListener('blur', function() {
            var mensagemNova = inputElement.value.trim();

            if (mensagemNova !== '') {
                mensagem.textContent = mensagemNova
                $.ajax({
                    url: 'SocialMedia/editarPost',
                    type: 'POST',
                    data: {
                        'post_id': post_id,
                        'mensagem': mensagemNova
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
            } else {
                mensagem.textContent = mensagemAtual
            }

            inputElement.parentNode.replaceChild(mensagem, inputElement);
        });


        console.log(mensagemAtual);
    }




    // Exibe o valor no console
    console.log(id_user);

    function openPopup(event) {
        var target = event.target;
        var popup = target.parentElement.querySelector('.popup');
        popup.classList.toggle('show');
    }

    function excluirPost(event) {
        var ulElement = event.target.parentNode.parentNode;
        var postId = ulElement.getAttribute('data-post-id');
        console.log(postId);

        $.ajax({
            url: 'SocialMedia/excluiPost',
            type: 'POST',
            data: {
                'post_id': postId
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

    const dialog = document.querySelector('.tweet-dialog');
    const openDialogBtn = document.getElementById('open-dialog-btn');

    openDialogBtn.addEventListener('click', () => {
        dialog.showModal();
    });

    function closeDialog() {
        dialog.close();
    };

    // Recupera o valor do login do Local Storage
    var id_user = localStorage.getItem('id_user');
    $(document).ready(function() {
        $('.confirm').click(function(event) {
            event.preventDefault(); // Evita o envio padrão do formulário
            var mensagem = document.getElementById("tweet-input").value;

            // Faça a requisição AJAX
            $.ajax({
                url: 'SocialMedia/post',
                type: 'POST',
                data: {
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
        });
    });

    function like(button) {
        var id_user = localStorage.getItem('id_user');
        let post_id = button.getAttribute('data-post-id');
        let like_id = button.getAttribute('data-id-like');
        console.log(post_id);

        if (button.getAttribute('data-liked') !== 'true') {
            $.ajax({
                url: 'SocialMedia/like',
                type: 'POST',
                data: {
                    'id_user': id_user,
                    'post_id': post_id
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
        } else {
            $.ajax({
                url: 'SocialMedia/deslike',
                type: 'POST',
                data: {
                    'like_id': like_id
                },
                success: function(response) {
                    console.log('Requisição bem-sucedida:', response);
                    // Faça algo com a resposta recebida
                    location.reload();
                    button.remove('liked');
                },
                error: function(xhr, status, error) {
                    console.log('Erro na requisição:', error);
                    // Lide com o erro
                }
            });
        }
    }
</script>


</html>