<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colaboradores extends CI_Controller {

	public function index()
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');		  	
		
		$this->load->view('pages/colaboradores');
    }
	
	//PARA CARREGAR A VIEW DO FORM DE CADASTRO
	public function form_register()
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('colaboradores_model');				

		$data['usuarios'] = $this->colaboradores_model->get_usuarios();
		$this->load->view('pages/colaboradores_register', $data);
		
    }
	
	//PARA CARREGAR A VIEW DO FORM DE EDIÇÃO
	public function form_edit($id)
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('colaboradores_model');				

		$data['colaborador'] = $this->colaboradores_model->get_colaborador_by_id($id);
		$data['usuarios'] = $this->colaboradores_model->get_usuarios_for_edit();
		$this->load->view('pages/colaboradores_edit', $data);
		
    }
	
	//PARA CARREGAR A VIEW DO FORM DE CADASTRO
	public function list()
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('colaboradores_model');				

		$data['colaboradores'] = $this->colaboradores_model->get_colaboradores();
		$this->load->view('pages/colaboradores', $data);
		
    }
	
	//DESATIVA COLABORADOR
	public function delete($id)
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('colaboradores_model');				
		
		$d = $this->colaboradores_model->inativa_colaborador($id); //INATIVA!!
		
		redirect('colaboradores/list');
		
    }
	
	//REATIVA COLABORADOR *sei que daria para fazer melhor
	public function reativa($id)
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('colaboradores_model');				
		
		$d = $this->colaboradores_model->reativa_colaborador($id); //INATIVA!!
		
		redirect('colaboradores/list');
		
    }
	
	//PARA CARREGAR A LISTA DE COLABORADORES (WS)
	public function list_ws()
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('colaboradores_model');

		if ($this->is_authenticated()) {
			$d = ["data" => $this->colaboradores_model->get_colaboradores()];
			header('Content-Type: application/json');
			echo json_encode($d);
		} else {
			// Retorna um erro de autenticação não autorizada
			header('HTTP/1.1 401 Unauthorized');
			header('WWW-Authenticate: Bearer realm="My Realm"');
			die("Não autorizado");
		}
    }

	//SALVA OS DADOS
	public function form_save()
    {   
		$dados = $this->input->post();		

		$this->load->helper('form'); 
		$this->load->helper('url');	
		$this->load->model('colaboradores_model');	
		
		$msg_error = $this->validate($dados);
		
		//EXECUTA O SAVE
		if(!empty($msg_error)){
			echo $msg_error;
		}else{
			$f = $this->colaboradores_model->save($dados);
			if ($f > 0) {
				echo 1;
			} else {
				echo "Erro na execução da query no banco de dados";
			}
		}
		
    }
	
	//PARA TRATAR ALGUMAS VALIDAÇÕES
	public function validate($dados)
    {   
		$msg_error="";

		#VALIDAÇÕES
		//PARA TRATAR ALGUMAS VERIFICAÇÕES DA EDIÇÃO
		if(isset($dados['id'])){ 	
			$colaborador = $this->colaboradores_model->get_colaborador_by_id($dados['id']);

			if($colaborador['email'] != $dados['email']){
				if($this->colaboradores_model->get_colaborador_by_email($dados['email']) > 0){
					$msg_error="E-mail já cadastrado em nosso banco de dados";
				}	
			}

			if($colaborador['cpf'] != $dados['cpf']){
				if($this->colaboradores_model->get_colaborador_by_cpf($dados['cpf']) > 0){
					$msg_error="CPF já cadastrado em nosso banco de dados";
				}	
			}

		//PARA TRATAR ALGUMAS VERIFICAÇÕES DO CADASTRO	
		}else{
			if($this->colaboradores_model->get_colaborador_by_email($dados['email']) > 0){
				$msg_error="E-mail já cadastrado em nosso banco de dados";
			}	
			if($this->colaboradores_model->get_colaborador_by_cpf($dados['cpf']) > 0){
				$msg_error="CPF já cadastrado em nosso banco de dados";
			}
		}

		//VALIDAÇÕES GENÉRICAS
		if(empty($dados['email'])){
			$msg_error="Campo E-mail deve ser preenchido";
		}		
		
		if(empty($dados['cpf'])){
			$msg_error="Campo CPF deve ser preenchido";
		}

		return $msg_error;
	}


	//PARA AUTENTICAÇÃO BEARER PARA WS
	private function is_authenticated() {
		
		// Verifica se o cabeçalho de autorização contém um token de acesso válido
		$headers = apache_request_headers();
		if (!isset($headers['Authorization'])) {
			return false;
		}
	
		$authorizationHeader = $headers['Authorization'];
		$token = trim(str_ireplace("Bearer ","",$authorizationHeader));
		
		if (!$token) {
			return false;
		}
	
		// Verifica se o token é válido
		$this->load->model('login_model');
		$usuario = $this->login_model->get_usuario_by_token($token);
	
		if ($usuario < 1) {
			return false;
		}
	
		return true;
	}

}
