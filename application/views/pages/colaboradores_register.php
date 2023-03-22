<?php $this->load->view('templates/dashboard/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cadastro de colaborador</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Colaboradores</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
							
              <div class="card-body">
							<a href="list">
							<button type="buttom" class="btn btn-info btn-sm float-right">Lista de colaboradores</button>
							</a>
							<hr>
                <h5 class="card-title">Preencha os dados do novo colaborador</h5>
								

								<form id="cadastra_colaborador">
								<br>
								<br>
								<div class="alert alert-danger" role="alert" id="bxError" style="display:none;"></div>
								 <div class="row">
									<div class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Selecione o usuário</label>
														<select class="form-control" name="id_usuario">
															<?php foreach ($usuarios as $usuario): ?>
																	<option value="<?php echo $usuario['id']; ?>"><?php echo $usuario['nome']; ?></option>
															<?php endforeach; ?>
														</select>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">E-mail</label>
												<input type="email" class="form-control" id="email" name="email" placeholder="Escreva o e-mail">
											</div>
											
											<div class="form-group">
												<label for="cpf">CPF</label>
												<input type="text" class="form-control cpf" name="cpf" placeholder="Escreva o CPF">
											</div>
											
											<div class="form-group">
												<label for="matricula">Matricula</label>
												<input type="text" class="form-control" name="matricula" placeholder="Escreva a matrícula">
											</div>
                  </div>
                  
									<div class="col-lg-6">
                  <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control cep" id="cep" name="cep" placeholder="CEP">
                  </div>
                  
                  <div class="form-group">
                    <label for="cep">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua, nº, complemento">
                  </div>                  
                  
                  <div class="form-group">
                    <label for="cep">Município</label>
                    <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Município">
                  </div>

									
                  <div class="form-group">
                    <label for="cep">Estado</label>
                    <select name="estado" id="estado" class="form-control" >
											<option value="">Selecione um estado</option>
											<option value="AC">Acre</option>
											<option value="AL">Alagoas</option>
											<option value="AP">Amapá</option>
											<option value="AM">Amazonas</option>
											<option value="BA">Bahia</option>
											<option value="CE">Ceará</option>
											<option value="DF">Distrito Federal</option>
											<option value="ES">Espírito Santo</option>
											<option value="GO">Goiás</option>
											<option value="MA">Maranhão</option>
											<option value="MT">Mato Grosso</option>
											<option value="MS">Mato Grosso do Sul</option>
											<option value="MG">Minas Gerais</option>
											<option value="PA">Pará</option>
											<option value="PB">Paraíba</option>
											<option value="PR">Paraná</option>
											<option value="PE">Pernambuco</option>
											<option value="PI">Piauí</option>
											<option value="RJ">Rio de Janeiro</option>
											<option value="RN">Rio Grande do Norte</option>
											<option value="RS">Rio Grande do Sul</option>
											<option value="RO">Rondônia</option>
											<option value="RR">Roraima</option>
											<option value="SC">Santa Catarina</option>
											<option value="SP">São Paulo</option>
											<option value="SE">Sergipe</option>
											<option value="TO">Tocantins</option>
										</select>
                  </div>
                  
                </div>
								
              </div>
							<div class="card-footer">
                  <button type="buttom" class="btn btn-info float-right" onclick="cadastra_colaborador($('#cadastra_colaborador').serialize())">Salvar</button>
                </div>
								<?php //echo form_close(); ?>
              </div>
							</form>
              </div>
            
							
            
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->



	
<?php $this->load->view('templates/dashboard/footer'); ?>  
