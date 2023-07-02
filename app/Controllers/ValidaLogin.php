<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SocialMediaDB;

class ValidaLogin extends BaseController
{
    private $social_media_DB;

    public function __construct()
    {
        $this->social_media_DB = new SocialMediaDB();
    }

    public function index()
    {
        $id_user = 0;
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $dados_login = $this->social_media_DB->login();
        $dados = $this->social_media_DB->readAllMessages();
        $credenciaisCorretas = false;
        foreach ($dados_login as $value) {
            if ($login === $value['login'] && md5($value['senha']) === md5($senha)) {
                $credenciaisCorretas = true;
                $id_user = $value['id'];
                break;
            }
        }

        if ($credenciaisCorretas) {
            echo "<script>localStorage.setItem('id_user', '". $id_user ."');</script>";
            return view('home', compact('dados'));
        } else {
            return view('login');
        }
    }
}
