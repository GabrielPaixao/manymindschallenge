<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itens extends CI_Controller {

	public function index()
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');		  	
		
		$this->load->view('pages/itens');
    }
	
	//PARA CARREGAR A VIEW DO FORM DE CADASTRO
	public function form_register($id_pedido)
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('itens_model');

		$data['id_pedido'] = $id_pedido;
		$data['produtos'] = $this->itens_model->get_produtos();
		$this->load->view('pages/itens_register',$data);
		
    }
	
	//PARA CARREGAR A VIEW DO FORM DE EDIÇÃO
	public function form_edit($id)
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('itens_model');				

		$data['produtos'] = $this->itens_model->get_produtos();
		$data['item'] = $this->itens_model->get_item_by_id($id);
		$this->load->view('pages/itens_edit', $data);
		
    }
	
	//PARA CARREGAR A VIEW DE LISTAGEM
	public function list($id_pedido)
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('itens_model');				

		$data['id_pedido'] = $id_pedido;
		$data['itens'] = $this->itens_model->get_itens($id_pedido);
		$this->load->view('pages/itens', $data);
		
    }
	
	//DESATIVA item
	public function delete($id,$id_pedido)
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('itens_model');				
		
		$d = $this->itens_model->deleta_item($id); //INATIVA!!
		
		redirect('itens/list/'.$id_pedido);
		
    }
	
	//PARA PEGAR O VALOR DO produto
	public function get_produto_by_id($id)
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('itens_model');				
		
		$d = $this->itens_model->get_produtos_by_id($id); //INATIVA!!
		
		echo $d['preco'];
		
    }
	
	
	//PARA CARREGAR A LISTA DE itens (WS)
	public function list_ws()
    {      
		$this->load->helper('form'); 
		$this->load->helper('url');	
	  	$this->load->model('itens_model');

		$d = ["data" => $this->itens_model->get_itens()];

		header('Content-Type: application/json');
        echo json_encode($d);
    }

	//SALVA OS DADOS
	public function form_save()
    {   
		$dados = $this->input->post();		

		$this->load->helper('form'); 
		$this->load->helper('url');	
		$this->load->model('itens_model');	
		
		$msg_error = $this->validate($dados);
		
		//EXECUTA O SAVE
		if(!empty($msg_error)){
			echo $msg_error;
		}else{
			$f = $this->itens_model->save($dados);
			if ($f > 0) {
				echo $dados['id_pedido'];
			} else {
				echo 999;
			}
		}
		
    }
	
	//PARA TRATAR ALGUMAS VALIDAÇÕES
	public function validate($dados)
    {   
		$msg_error="";

		//VALIDAÇÕES GENÉRICAS
		if(empty($dados['quantidade'])){
			$msg_error="Campo Quantidade deve ser preenchido";
		}		
		
		return $msg_error;
	}



}
