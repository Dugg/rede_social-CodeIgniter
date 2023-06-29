<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SocialMediaDB;

class SocialMedia extends BaseController{
    private $social_media_DB;

    public function __construct(){
        $this->social_media_DB = new SocialMediaDB();
    }

    public function index(){
        $dados = $this->social_media_DB->readAll();
        return view('home',compact('dados'));
    }

    public function load($view){
        return view($view);
    }

    public function login(){
        return view('login');
    }

    public function insert_dados(){
        $dados = [
            'login' => $_POST['login'],
            'senha' => $_POST['senha'],
            'email' => $_POST['email']
        ];

        $resultado = $this->social_media_DB->insert_data($dados);

        if($resultado > 0){
            echo 'Dados inseridos com sucesso!';
        } else {
            echo 'Erro ao inserir os dados.';
        }
    }
}
