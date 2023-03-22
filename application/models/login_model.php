<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

  
  //AUTENTICAÇÃO SEM ORM
  public function autenticar($login, $senha)
  {
	
	$this->load->database();

	$query = $this->db->query("
        SELECT *
        FROM usuarios
        WHERE login = '$login' AND senha = '".sha1($senha)."'
    ");

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return null;
    }
  }

 
  //LIMPA SESSÕES QUANDO NECESSÁRIO
  public function limpa_sessoes($ip)
  {
		$this->session->unset_userdata('bloqueio['.$ip.']');
		$this->session->unset_userdata('tentativas['.$ip.']');
  }		

  //LIMPA SESSÕES QUANDO NECESSÁRIO
  public function tempo_bloqueio($ip)
  {
		return $this->session->userdata('bloqueio['.$ip.']');
  }		

	//PARA AUTENTICAÇÃO BEARER
	public function update_token($token,$id) {
		$this->load->database();
		$query 	= $this->db->query('UPDATE usuarios SET token="'.$token.'" WHERE id='.$id.'');		
		return true;
    }

	//PARA AUTENTICAÇÃO BEARER	
	public function get_usuario_by_token($token) {
		$this->load->database();
				$query 	= $this->db->query('SELECT * FROM usuarios WHERE token="'.$token.'"');
				return $query->num_rows();
		}

  //CRITÉRIOS NECESSÁRIO PARA TRAVAR O IP
  public function travar_ip($ip)
  {
	
	$tentativas_maximas = 3;
  	$tempo_bloqueio 	= 300; // tempo em segundos (5 minutos)
	$tentativas_user	= $this->session->userdata('tentativas['.$ip.']');	

	//CASO ULTRAPASSE O LIMITE SETA O TEMPO EM QUE FICARÁ BLOQUEADO
	if($tentativas_user >= $tentativas_maximas){ 
		$this->session->set_userdata('bloqueio['.$ip.']', time() + $tempo_bloqueio);
		return $this->session->userdata('bloqueio['.$ip.']');
	}else{
		
		//INCREMENTA O NÚMERO DE TENTATIVAS DENTRO DA SESSÃO $tentativas[$ip]
		if($tentativas_user == ""){
			$this->session->set_userdata('tentativas['.$ip.']', 1);
		}else{
			$this->session->set_userdata('tentativas['.$ip.']', $tentativas_user + 1);
		}

		return $tentativas_user;
	}

  }

  
}
