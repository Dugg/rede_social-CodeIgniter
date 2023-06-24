<?php

namespace App\Models;

use CodeIgniter\Model;

class SocialMediaDB extends Model
{
    protected $DB_SERVIDOR;
    protected $DB_USUARIO;
    protected $DB_SENHA;
    protected $DB_BANCO;

    protected $table = ''; // Insira o nome da tabela do seu banco de dados

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
        $this->db = db_connect(); // Obtém a conexão com o banco de dados

        if ($this->db->connect_errno) {
            echo ("Falha na conexão com o banco de dados: " . $this->db->connect_error);
        }
    }

    public function readAll()
    {
        // Implemente o código para buscar os registros do banco de dados
        // Exemplo:
        return $this->findAll(); // Retorna todos os registros da tabela
    }
}
