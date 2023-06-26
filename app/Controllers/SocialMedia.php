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
}
?>