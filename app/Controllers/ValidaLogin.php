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
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $dados = $this->social_media_DB->readAll();
        $credenciaisCorretas = false;
        foreach ($dados as $value) {
            if ($login === $value['login'] && md5($value['senha']) === md5($senha)) {
                $credenciaisCorretas = true;
                break;
            }
        }

        if ($credenciaisCorretas) {
            echo "<script>localStorage.setItem('login', '". $login ."');</script>";
            return view('home', compact('dados'));
        } else {
            return view('login');
        }
    }
}
