<?php $this->load->view('templates/dashboard/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edição de colaborador</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edição de colaboradores</li>
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
			  <a href="../list">
							<button type="buttom" class="btn btn-info btn-sm float-right">Lista de colaboradores</button>
							</a>
							<hr>
               
                <h5 class="card-title">Preencha os dados do novo colaborador</h5>
					<form id="edita_colaborador">
					<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $colaborador['id']; ?>">	
								<br>
								<br>
								<div class="alert alert-danger" role="alert" id="bxError" style="display:none;"></div>
								 <div class="row">
									<div class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Usuário</label>
														<select class="form-control" name="id_usuario" disabled>
															<?php foreach ($usuarios as $usuario): ?>
																<?php if($usuario['id'] == $colaborador['id_usuario']){ ?>
																	<option value="<?php echo $usuario['id']; ?>" selected><?php echo $usuario['nome']; ?></option>
																<?php }else{ ?> 
																	<option value="<?php echo $usuario['id']; ?>" ><?php echo $usuario['nome']; ?></option>
																<?php } ?>
																	
															<?php endforeach; ?>
														</select>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">E-mail</label>
												<input type="email" class="form-control" id="email" name="email" placeholder="Escreva o e-mail" value="<?php echo $colaborador['email']; ?>">
											</div>
											
											<div class="form-group">
												<label for="cpf">CPF</label>
												<input type="text" class="form-control cpf" name="cpf" placeholder="Escreva o CPF" value="<?php echo $colaborador['cpf']; ?>">
											</div>
											
											<div class="form-group">
												<label for="matricula">Matricula</label>
												<input type="text" class="form-control" name="matricula" placeholder="Escreva a matrícula" value="<?php echo $colaborador['matricula']; ?>">
											</div>
                  </div>
                  
									<div class="col-lg-6">
                  <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control cep" id="cep" name="cep" placeholder="CEP"  value="<?php echo $colaborador['cep']; ?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="cep">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua, nº, complemento"  value="<?php echo $colaborador['endereco']; ?>">
                  </div>                  
                  
                  <div class="form-group">
                    <label for="cep">Município</label>
                    <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Município" value="<?php echo $colaborador['municipio']; ?>">
                  </div>

									
                  <div class="form-group">
                    <label for="cep">Estado</label>
                    <select name="estado" id="estado" class="form-control" >
											<option value="">Selecione um estado</option>
											<option value="AC" <?php echo ($colaborador['estado'] == "AC")? 'selected':""; ?>>Acre</option>
											<option value="AL" <?php echo ($colaborador['estado'] == "AL")? 'selected':""; ?>>Alagoas</option>
											<option value="AP" <?php echo ($colaborador['estado'] == "AP")? 'selected':""; ?>>Amapá</option>
											<option value="AM" <?php echo ($colaborador['estado'] == "AM")? 'selected':""; ?>>Amazonas</option>
											<option value="BA" <?php echo ($colaborador['estado'] == "BA")? 'selected':""; ?>>Bahia</option>
											<option value="CE" <?php echo ($colaborador['estado'] == "CE")? 'selected':""; ?>>Ceará</option>
											<option value="DF" <?php echo ($colaborador['estado'] == "DF")? 'selected':""; ?>>Distrito Federal</option>
											<option value="ES" <?php echo ($colaborador['estado'] == "ES")? 'selected':""; ?>>Espírito Santo</option>
											<option value="GO" <?php echo ($colaborador['estado'] == "GO")? 'selected':""; ?>>Goiás</option>
											<option value="MA" <?php echo ($colaborador['estado'] == "MA")? 'selected':""; ?>>Maranhão</option>
											<option value="MT" <?php echo ($colaborador['estado'] == "MT")? 'selected':""; ?>>Mato Grosso</option>
											<option value="MS" <?php echo ($colaborador['estado'] == "MS")? 'selected':""; ?>>Mato Grosso do Sul</option>
											<option value="MG" <?php echo ($colaborador['estado'] == "MG")? 'selected':""; ?>>Minas Gerais</option>
											<option value="PA" <?php echo ($colaborador['estado'] == "PA")? 'selected':""; ?>>Pará</option>
											<option value="PB" <?php echo ($colaborador['estado'] == "PB")? 'selected':""; ?>>Paraíba</option>
											<option value="PR" <?php echo ($colaborador['estado'] == "PR")? 'selected':""; ?>>Paraná</option>
											<option value="PE" <?php echo ($colaborador['estado'] == "PE")? 'selected':""; ?>>Pernambuco</option>
											<option value="PI" <?php echo ($colaborador['estado'] == "PI")? 'selected':""; ?>>Piauí</option>
											<option value="RJ" <?php echo ($colaborador['estado'] == "RJ")? 'selected':""; ?>>Rio de Janeiro</option>
											<option value="RN" <?php echo ($colaborador['estado'] == "RN")? 'selected':""; ?>>Rio Grande do Norte</option>
											<option value="RS" <?php echo ($colaborador['estado'] == "RS")? 'selected':""; ?>>Rio Grande do Sul</option>
											<option value="RO" <?php echo ($colaborador['estado'] == "RO")? 'selected':""; ?>>Rondônia</option>
											<option value="RR" <?php echo ($colaborador['estado'] == "RR")? 'selected':""; ?>>Roraima</option>
											<option value="SC" <?php echo ($colaborador['estado'] == "SC")? 'selected':""; ?>>Santa Catarina</option>
											<option value="SP" <?php echo ($colaborador['estado'] == "SP")? 'selected':""; ?>>São Paulo</option>
											<option value="SE" <?php echo ($colaborador['estado'] == "SE")? 'selected':""; ?>>Sergipe</option>
											<option value="TO" <?php echo ($colaborador['estado'] == "TO")? 'selected':""; ?>>Tocantins</option>
										</select>
                  </div>
                  
                </div>
								
              </div>
				<div class="card-footer">
                  <button type="buttom" class="btn btn-info float-right" onclick="edita_colaborador($('#edita_colaborador').serialize())">Salvar</button>
                </div>
								
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
