<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SocialMediaDB;

class SocialMedia extends BaseController
{
    private $social_media_DB;

    public function __construct()
    {
        $this->social_media_DB = new SocialMediaDB();
    }

    public function login()
    {
        return view('login');
    }

    public function post()
    {
        $dados = [
            'id_autor' => $_POST['id_user'],
            'mensagem' => $_POST['mensagem'],
            'data_criacao' => date('Y-m-d H:i:s')
        ];

        $resultado = $this->social_media_DB->insert_data($dados);

        if ($resultado > 0) {
            echo 'Dados inseridos com sucesso!';
        } else {
            echo 'Erro ao inserir os dados.';
        }
    }

    public function like()
    {
        $dados = [
            'id_autor' => $_POST['id_user'],
            'post_id' => $_POST['post_id'],
        ];

        $resultado = $this->social_media_DB->insert_like($dados);

        if ($resultado > 0) {
            echo 'Dados inseridos com sucesso!';
        } else {
            echo 'Erro ao inserir os dados.';
        }
    }

    public function deslike()
    {
        $dados = [
            'like_id' => $_POST['like_id'],
        ];

        $resultado = $this->social_media_DB->deslike($dados);

        if ($resultado > 0) {
            echo 'Dados inseridos com sucesso!';
        } else {
            echo 'Erro ao inserir os dados.';
        }
    }

    public function get_likes()
    {
        $dados = [
            'id_autor' => $_POST['id_user']
        ];
        $likes = $this->social_media_DB->get_likes($dados);

        if ($likes) {
            $response = [
                'success' => true,
                'likes' => $likes
            ];

            return $this->response->setJSON($response);
        } else {
            $response = [
                'success' => false,
                'message' => 'Nenhum like encontrado.'
            ];

            return $this->response->setJSON($response)->setStatusCode(404);
        }
    }
}
