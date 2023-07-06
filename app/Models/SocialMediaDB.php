<?php

namespace App\Models;

use CodeIgniter\Model;

class SocialMediaDB extends Model
{
    protected $DB_SERVIDOR;
    protected $DB_USUARIO;
    protected $DB_SENHA;
    protected $DB_BANCO;

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

    public function readAllMessages()
    {
        $query = $this->db->table('post')
            ->select('usuarios.login, post.id as post_id, post.mensagem, post.data_criacao, 
        (SELECT COUNT(*) FROM comentarios WHERE comentarios.post_id = post.id) as quantidade_comentarios,
        (SELECT COUNT(*) FROM likes WHERE likes.post_id = post.id) as quantidade_likes')
            ->join('usuarios', 'usuarios.id = post.id_autor')
            ->get();
        $result = $query->getResultArray();
        return $result;
    }

    public function login()
    {
        $query = $this->db->table('usuarios')->get();
        return $query->getResultArray();
    }

    public function insert_data($dados)
    {
        $this->db->table('post')->insert($dados);
        return $this->db->affectedRows();
    }

    public function insert_like($dados)
    {
        $this->db->table('likes')->insert($dados);
        return $this->db->affectedRows();
    }

    public function deslike($dados)
    {
        $this->db->table('likes')
            ->where('id', $dados['like_id'])
            ->delete();

        $rowsDeleted = $this->db->affectedRows();

        if ($rowsDeleted > 0) {
            // O deslike foi realizado com sucesso
        } else {
            // Nenhum registro foi excluído
        }
    }

    public function get_likes($dados)
    {
        $query = $this->db->table('likes')
            ->select('id as id_like ,post_id')
            ->where('id_autor', $dados['id_autor'])
            ->get();

        $result = $query->getResultArray();
        return $result;
    }

    public function comentarios($dados)
    {
        $query = $this->db->table('post as p')
            ->select('u.login, p.mensagem')
            ->join('usuarios u', 'p.id_autor = u.id', 'left')
            ->where('p.id', $dados)
            ->get();

        $result = $query->getResultArray();

        return $result;
    }

    public function get_ComentariosPost($post_id)
    {
        $query = $this->db->table('comentarios c')
            ->select('u.login, c.mensagem')
            ->join('usuarios u', 'u.id = c.id_autor', 'left')
            ->where('c.post_id', $post_id)
            ->get();

        $result = $query->getResultArray();

        return $result;
    }

    public function insert_comentarios_post($dados)
    {
        $this->db->table('comentarios')->insert($dados);
        return $this->db->affectedRows();
    }
}
