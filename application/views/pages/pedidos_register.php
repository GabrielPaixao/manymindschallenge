<?php $this->load->view('templates/dashboard/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cadastro de pedido</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pedidos</li>
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
							<button type="buttom" class="btn btn-info btn-sm float-right">Lista de pedidos</button>
							</a>
							<hr>
                <h5 class="card-title">Preencha os dados do novo pedido</h5>
								

								<form id="cadastra_pedido">
								<br>
								<br>
								<div class="alert alert-danger" role="alert" id="bxError" style="display:none;"></div>
								 <div class="row">
									<div class="col-lg-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Selecione o fornecedor</label>
														<select class="form-control" name="id_fornecedor">
															<?php foreach ($fornecedores as $fornecedor): ?>
																	<option value="<?php echo $fornecedor['id']; ?>"><?php echo $fornecedor['nome']; ?></option>
															<?php endforeach; ?>
														</select>
											</div>
											<div class="form-group">
												<label for="cpf">Observacao</label>
												<textarea class="form-control" name="observacao"></textarea>
											</div>
											
                  </div>
								
              </div><button type="buttom" class="btn btn-info btn-sm float-left" onclick="cadastra_pedido($('#cadastra_pedido').serialize())">Salvar & adicionar produtos >></button>
							<div class="card-footer">
                  
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
