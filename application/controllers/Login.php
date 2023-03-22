<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->library('session');  //Para iniciar as sessões que iremos usar para controlar as tentativas de autenticação   
	}

	public function autenticar()
	{
	  $this->load->helper('url');	
	  $this->load->model('login_model');
  
	  $login = $this->input->post('login');
	  $senha = $this->input->post('senha');
  
	  if ($this->login_model->autenticar($login, $senha)) //MODEL DE AUTENTICAÇÃO
	  {
		$this->session->set_userdata('usuario', $login);
		$this->login_model->limpa_sessoes($this->input->ip_address());
		redirect('dashboard');
	  }
	  else
	  {
		$ti = $this->login_model->travar_ip($this->input->ip_address()); //CASO NÃO ENCONTRE O USUÁRIO, EXECUTA OS PROCEDIMENTOS PARA ARMAZENAR E CALCULAR O TEMPO DE TRAVA DO IP		
		if(time() <=$ti){
			$this->session->set_flashdata('erro', 'Número de tentativas excedidas, tente novamente em 5 minutos');
		}else{
			$this->session->set_flashdata('erro', 'Usuário ou senha incorretos.');			
		}
		
		redirect('login');
	  }
	}

	public function autenticar_ws()
	{
	  $this->load->helper('url');	
	  $this->load->model('login_model');
  
	  $login = $this->input->post('login');
	  $senha = $this->input->post('senha');
	  $a = $this->login_model->autenticar($login, $senha);//MODEL DE AUTENTICAÇÃO
		
	  if ($a) 
	  {
			$token = bin2hex(random_bytes(16));
			$this->login_model->update_token($token,$a['id']);
			$data = ['token' => $token];
			header('Content-Type: application/json');
			echo json_encode($data);
	  }
	  else
	  {
		header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="My Realm"');
        die("Não autorizado");		
	  }
	}

    public function index()
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('login_model');

		//AO ENTRAR NA PÁGINA, VERIFICA SE O IP ESTÁ BLOQUEADO
		$ti = $this->login_model->tempo_bloqueio($this->input->ip_address());
		if(time() <=$ti){
			$this->session->set_flashdata('erro', 'Número de tentativas excedidas, tente novamente em 5 minutos ');
			$this->session->set_flashdata('cod', '5');
		}else{
			$this->session->set_flashdata('cod', '0');
		}
        	$this->load->view('pages/login');
		
    }
}
