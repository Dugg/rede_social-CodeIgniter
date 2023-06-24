<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use social_media_DB;

class Home extends BaseController{
    private $social_media_DB;

    public function __construct(){
        $this->social_media_DB = new social_media_DB();
    }

    public function index(){
        $this->social_media_DB->readAll();
    }
}
?>