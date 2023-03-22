<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itens_model extends CI_Model {

	public function get_itens($id_pedido) {
		$this->load->database();
        $query 	= $this->db->query('SELECT 
		 								pedidos_produtos.id as id,
		 								pedidos_produtos.total as total,
		 								produtos.nome as produto,
		 								produtos.preco as preco,
		 								pedidos_produtos.quantidade as quantidade
									FROM pedidos_produtos 
									INNER JOIN produtos 
									ON pedidos_produtos.id_produto = produtos.id 
									WHERE id_pedido='.$id_pedido.'');
        return $query->result_array();
    }

	public function get_produtos() {
		$this->load->database();
        $query 	= $this->db->query('SELECT * FROM produtos');
        return $query->result_array();
    }

	public function get_produtos_by_id($id) {
		$this->load->database();
        $query 	= $this->db->query('SELECT * FROM produtos WHERE id='.$id.'');
        return $query->row_array();
    }

	public function get_item_by_id($id) {
		$this->load->database();
        $query 	= $this->db->query('
									SELECT 
										pedidos_produtos.id as id,
										pedidos_produtos.id_pedido as id_pedido,
										pedidos_produtos.total as total,
										produtos.nome as produto,
										produtos.preco as preco,
										pedidos_produtos.quantidade as quantidade
									FROM pedidos_produtos 
									INNER JOIN produtos 
									ON pedidos_produtos.id_produto = produtos.id 
									WHERE pedidos_produtos.id='.$id.'');
        return $query->row_array();
    }

	public function deleta_item($id) {
		$this->load->database();
        $query 	= $this->db->query('DELETE FROM pedidos_produtos WHERE id='.$id.'');
        return true;
    }

	public function save($dados) {
		$this->load->database();
		
		if(isset($dados['id'])){ 
			$query 	= $this->db->query('	
						UPDATE pedidos_produtos 
						SET 							
							quantidade		= "'.$dados['quantidade'].'",
							total			= "'.str_replace("R$","",$dados['total']).'"
						WHERE id='.$dados['id'].'
						');
		}else{
			$query 	= $this->db->query('	
						INSERT INTO pedidos_produtos
						SET 
							id 				= null,
							id_pedido 		= "'.$dados['id_pedido'].'",
							id_produto 		= "'.$dados['id_produto'].'",
							quantidade		= "'.$dados['quantidade'].'",
							total			= "'.str_replace("R$","",$dados['total']).'"
					
						');
		}
        return true;
    }

  
}
