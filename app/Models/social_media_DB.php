<?php

use CodeIgniter\Model;

class social_media_DB extends Model{
    protected $mysqli;
    private $DB_SERVIDOR;
    private $DB_USUARIO;
    private $DB_SENHA;
    private $DB_BANCO;

    public function __construct()
    {
        parent::__construct();
        $this->DB_SERVIDOR = $this->db->hostname;
        $this->DB_USUARIO = $this->db->username;
        $this->DB_SENHA = $this->db->password;
        $this->DB_BANCO = $this->db->database;
        $this->conexao();
    }

    private function conexao()
    {
        $this->mysqli = new mysqli($this->DB_SERVIDOR, $this->DB_USUARIO, $this->DB_SENHA, $this->DB_BANCO);

        if ($this->mysqli->connect_errno) {
            echo ("Falha na conexão com o banco de dados: " . $this->mysqli->connect_error);
        }
    }

    public function readAll(){
        
    }
}
