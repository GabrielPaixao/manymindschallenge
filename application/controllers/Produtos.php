<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function index()
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');		  	
		
		$this->load->view('pages/produtos');
    }
	
	//PARA CARREGAR A VIEW DO FORM DE CADASTRO
	public function form_register()
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('produtos_model');
		
		$this->load->view('pages/produtos_register');
		
    }
	
	//PARA CARREGAR A VIEW DO FORM DE EDIÇÃO
	public function form_edit($id)
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('produtos_model');				

		$data['produto'] = $this->produtos_model->get_produto_by_id($id);
		$this->load->view('pages/produtos_edit', $data);
		
    }
	
	//PARA CARREGAR A VIEW DO FORM DE CADASTRO
	public function list()
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('produtos_model');				

		$data['produtos'] = $this->produtos_model->get_produtos();
		$this->load->view('pages/produtos', $data);
		
    }
	
	//DESATIVA produto
	public function delete($id)
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('produtos_model');				
		
		$d = $this->produtos_model->inativa_produto($id); //INATIVA!!
		
		redirect('produtos/list');
		
    }
	
	//REATIVA produto *sei que daria para fazer melhor
	public function reativa($id)
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('produtos_model');				
		
		$d = $this->produtos_model->reativa_produto($id); //INATIVA!!
		
		redirect('produtos/list');
		
    }
	
	//PARA CARREGAR A LISTA DE produtos (WS)
	public function list_ws()
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('produtos_model');

		$d = ["data" => $this->produtos_model->get_produtos()];

		header('Content-Type: application/json');
        echo json_encode($d);
    }

	//SALVA OS DADOS
	public function form_save()
    {   
		$dados = $this->input->post();		

		$this->load->helper('form'); 
		$this->load->helper('url');	
		$this->load->model('produtos_model');	
		
		$msg_error = $this->validate($dados);
		
		//EXECUTA O SAVE
		if(!empty($msg_error)){
			echo $msg_error;
		}else{
			$f = $this->produtos_model->save($dados);
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


		//VALIDAÇÕES GENÉRICAS
		if(empty($dados['nome'])){
			$msg_error="Campo Nome deve ser preenchido";
		}		
		
		if(empty($dados['preco'])){
			$msg_error="Campo Preco deve ser preenchido";
		}

		return $msg_error;
	}



}
