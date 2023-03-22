<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_model extends CI_Model {

	public function get_produtos() {
		$this->load->database();
        $query 	= $this->db->query('SELECT * FROM produtos');
        return $query->result_array();
    }

	public function get_produto_by_id($id) {
		$this->load->database();
        $query 	= $this->db->query('SELECT * FROM produtos WHERE id='.$id.'');
        return $query->row_array();
    }

	public function inativa_produto($id) {
		$this->load->database();
        $query 	= $this->db->query('UPDATE produtos SET ativo=0 WHERE id='.$id.'');
        return true;
    }

	public function reativa_produto($id) {
		$this->load->database();
        $query 	= $this->db->query('UPDATE produtos SET ativo=1 WHERE id='.$id.'');
        return true;
    }

	public function save($dados) {
		$this->load->database();
		
		if(isset($dados['id'])){ 
			$query 	= $this->db->query('	
						UPDATE produtos 
						SET 							
							nome 			= "'.$dados['nome'].'",
							descricao 		= "'.$dados['descricao'].'",
							preco 			= "'.$dados['preco'].'"
						WHERE id='.$dados['id'].'
						');
		}else{
			$query 	= $this->db->query('	
						INSERT INTO produtos
						SET 
							id 				= null,
							nome 			= "'.$dados['nome'].'",
							descricao 		= "'.$dados['descricao'].'",
							preco 			= "'.$dados['preco'].'",
							ativo 			= 1
					
						');
		}
        return true;
    }

  
}
