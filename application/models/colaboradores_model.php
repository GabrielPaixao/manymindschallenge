<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colaboradores_model extends CI_Model {

	public function get_usuarios() {
		$this->load->database();
        $query 	= $this->db->query('SELECT * FROM usuarios WHERE id NOT IN (SELECT id_usuario FROM colaboradores) ');
        return $query->result_array();
    }

	public function get_usuarios_for_edit() {
		$this->load->database();
        $query 	= $this->db->query('SELECT * FROM usuarios');
        return $query->result_array();
    }

	public function get_colaboradores() {
		$this->load->database();
        $query 	= $this->db->query('	SELECT 
												c.id as id,
												u.nome as nome,
												c.email as email,
												c.cpf as cpf,
												c.matricula as matricula,
												c.ativo as ativo
										FROM 	colaboradores c 
												INNER JOIN usuarios u 
												ON c.id_usuario=u.id 
										');
        return $query->result_array();
    }

	public function get_colaborador_by_id($id) {
		$this->load->database();
        $query 	= $this->db->query('SELECT * FROM colaboradores WHERE id='.$id.'');
        return $query->row_array();
    }

	public function get_colaborador_by_cpf_u($cpf) { //PARA UPDATE
		$this->load->database();
        $query 	= $this->db->query('SELECT * FROM colaboradores WHERE cpf="'.$cpf.'"');
        return  $query->row_array();
    }	

	public function get_colaborador_by_cpf($cpf) {
		$this->load->database();
        $query 	= $this->db->query('SELECT * FROM colaboradores WHERE cpf="'.$cpf.'"');
        return $query->num_rows();
    }
	
	public function get_colaborador_by_email($email) {
		$this->load->database();
        $query 	= $this->db->query('SELECT * FROM colaboradores WHERE email="'.$email.'"');
        return $query->num_rows();
    }

	public function get_colaborador_by_id_usuario($id_usuario) {
		$this->load->database();
        $query 	= $this->db->query('SELECT * FROM colaboradores WHERE id_usuario="'.$id_usuario.'"');
        return $query->num_rows();
    }

	public function inativa_colaborador($id) {
		$this->load->database();
        $query 	= $this->db->query('UPDATE colaboradores SET ativo=0 WHERE id='.$id.'');
        return true;
    }

	public function reativa_colaborador($id) {
		$this->load->database();
        $query 	= $this->db->query('UPDATE colaboradores SET ativo=1 WHERE id='.$id.'');
        return true;
    }

	public function save($dados) {
		$this->load->database();
		
		if(isset($dados['id'])){ 
			$query 	= $this->db->query('	
						UPDATE colaboradores 
						SET 							
							email 			= "'.$dados['email'].'",
							cpf 			= "'.$dados['cpf'].'",
							matricula 		= "'.$dados['matricula'].'",
							cep 			= "'.$dados['cep'].'",
							endereco 		= "'.$dados['endereco'].'",
							municipio 		= "'.$dados['municipio'].'",
							estado  		= "'.$dados['estado'].'"
						WHERE id='.$dados['id'].'
						');
		}else{
			$query 	= $this->db->query('	
						INSERT INTO colaboradores
						SET 
							id 				= null,
							id_usuario 		= '.$dados['id_usuario'].',
							email 			= "'.$dados['email'].'",
							cpf 			= "'.$dados['cpf'].'",
							matricula 		= "'.$dados['matricula'].'",
							cep 			= "'.$dados['cep'].'",
							endereco 		= "'.$dados['endereco'].'",
							municipio 		= "'.$dados['municipio'].'",
							estado  		= "'.$dados['estado'].'",
							ativo 			= 1,
							data_cadastro 	= NOW()
					
						');
		}
        return true;
    }

  
}
