<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

	public function index()
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');		  	
		
		$this->load->view('pages/pedidos');
    }
	
	//PARA CARREGAR A VIEW DO FORM DE CADASTRO
	public function form_register()
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('pedidos_model');						

		$data['fornecedores'] = $this->pedidos_model->get_fornecedores();
		$this->load->view('pages/pedidos_register',$data);
		
    }
	
	//PARA CARREGAR A VIEW DO FORM DE EDIÇÃO
	public function form_edit($id)
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('pedidos_model');				
		
		$data['fornecedores'] = $this->pedidos_model->get_fornecedores();
		$data['pedido'] = $this->pedidos_model->get_pedido_by_id($id);
		$this->load->view('pages/pedidos_edit', $data);
		
    }
	
	//PARA CARREGAR A VIEW DO FORM DE CADASTRO
	public function list()
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('pedidos_model');				

		$data['pedidos'] = $this->pedidos_model->get_pedidos();
		$this->load->view('pages/pedidos', $data);
		
    }
	
	//DESATIVA pedido
	public function inativa($id)
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('pedidos_model');				
		
		$d = $this->pedidos_model->inativa_pedido($id); //INATIVA!!
		
		redirect('pedidos/list');
		
    }
	
	//DELETA pedido
	public function deleta($id)
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('pedidos_model');				
		
		$d = $this->pedidos_model->deleta_pedido($id); 
		
		redirect('pedidos/list');
		
    }
	
	//REATIVA pedido *sei que daria para fazer melhor
	public function reativa($id)
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('pedidos_model');				
		
		$d = $this->pedidos_model->reativa_pedido($id); //REATIVA!!
		
		redirect('pedidos/list');
		
    }
	
	//PARA CARREGAR A LISTA DE pedidos (WS)
	public function list_ws()
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('pedidos_model');
		$p = $this->pedidos_model->get_pedidos();
		$pedidos = $this->pedidos_model->get_pedidos();
		foreach($p as $p){
				$produtos =  $this->pedidos_model->get_produtos_by_pedidos($p['id']);													
				foreach ($produtos as $produto){
					$pedidos['itens'][$p['id']]['produto'] =  $produto['nome'];
					$pedidos['itens'][$p['id']]['quantidade'] =  $produto['quantidade'];
				}
		}
		$d = ["data" => $pedidos];

		if ($this->is_authenticated()) {
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
		$this->load->model('pedidos_model');	
		
		$msg_error = $this->validate($dados);
		
		//EXECUTA O SAVE
		if(!empty($msg_error)){
			echo $msg_error;
		}else{
			$f = $this->pedidos_model->save($dados);
			echo $f;
		}
		
    }
	
	//PARA TRATAR ALGUMAS VALIDAÇÕES
	public function validate($dados)
    {   
		$msg_error="";

		//VALIDAÇÕES GENÉRICAS
		if(empty($dados['id_fornecedor'])){
			$msg_error="Campo Fornecedor deve ser preenchido";
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
