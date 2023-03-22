<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos_model extends CI_Model {

	public function get_fornecedores() {
		$this->load->database();
        $query 	= $this->db->query('SELECT 	f.id as id, 
											u.nome as nome 
									FROM fornecedores f 
									INNER JOIN usuarios u ON f.id_usuario = u.id 
									WHERE f.ativo=1');
        return $query->result_array();
    }

	public function get_pedidos() {
		$this->load->database();
        $query 	= $this->db->query("
								SELECT 
									pedidos.id, 
									usuarios.nome AS nome_fornecedor, 
									DATE_FORMAT(pedidos.data_pedido, '%d/%m/%Y') AS data_pedido, 
  									pedidos.valor_total,
									pedidos.ativo
								FROM 
									pedidos
									INNER JOIN fornecedores ON pedidos.id_fornecedor = fornecedores.id
									INNER JOIN usuarios ON fornecedores.id_usuario = usuarios.id
									
								");
        return $query->result_array();
    }

	public function get_pedido_by_id($id) {
		$this->load->database();
		$query 	= $this->db->query("
								SELECT 
									pedidos.id, 
									pedidos.id_fornecedor, 
									pedidos.observacao, 
									usuarios.nome AS nome_fornecedor, 
									DATE_FORMAT(pedidos.data_pedido, '%d/%m/%Y') AS data_pedido, 
									pedidos.valor_total,
									pedidos.ativo
								FROM 
									pedidos
									INNER JOIN fornecedores ON pedidos.id_fornecedor = fornecedores.id
									INNER JOIN usuarios ON fornecedores.id_usuario = usuarios.id
								WHERE pedidos.id=".$id."
								
								");
        return $query->row_array();
    }

	public function get_produtos_by_pedidos($id_pedido) {
		$this->load->database();
		$query 	= $this->db->query("
								SELECT 
									produtos.nome as nome,
									pedidos_produtos.quantidade as quantidade
								FROM 
									pedidos
									INNER JOIN pedidos_produtos ON pedidos_produtos.id_pedido = pedidos.id
									INNER JOIN produtos ON pedidos_produtos.id_produto = produtos.id
								WHERE pedidos.id=".$id_pedido."
								
								");
        return $query->result_array();
    }

	public function inativa_pedido($id) {
		$this->load->database();
        $query 	= $this->db->query('UPDATE pedidos SET ativo=0 WHERE id='.$id.'');
        return true;
    }

	public function total_by_pedido($id) {
		$this->load->database();
        $query 	= $this->db->query('SELECT sum(total) as total FROM `pedidos_produtos` WHERE id_pedido='.$id.'; ');
		return $query->row_array();
    }

	public function deleta_pedido($id) {
		$this->load->database();
        $query 	= $this->db->query('DELETE FROM pedidos WHERE id='.$id.'');
        return true;
    }

	public function reativa_pedido($id) {
		$this->load->database();
        $query 	= $this->db->query('UPDATE pedidos SET ativo=1 WHERE id='.$id.'');
        return true;
    }

	public function save($dados) {
		$this->load->database();
		
		if(isset($dados['id'])){ 
			$query 	= $this->db->query('	
						UPDATE pedidos 
						SET 							
							id_fornecedor 		= "'.$dados['id_fornecedor'].'",
							observacao 			= "'.$dados['observacao'].'"
						WHERE id='.$dados['id'].'
						');
						return true;
		}else{
			$query 	= $this->db->query('	
						INSERT INTO pedidos
						SET 
							id 					= null,
							id_fornecedor 		= "'.$dados['id_fornecedor'].'",
							observacao 			= "'.$dados['observacao'].'",
							data_pedido 		= NOW(),
							ativo 				= 1
					
						');
			$insert_id = $this->db->insert_id();
			echo  $insert_id;
		}
        
    }

  
}
