<?php $this->load->view('templates/dashboard/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edição de pedido</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edição de pedidos</li>
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
			  			<a href="../../itens/list/<?php echo $pedido['id']; ?>">
							<button type="buttom" class="btn btn-warning btn-sm float-right">Gerenciar itens >></button>
							</a>
			  			<a href="../list">
								<button type="buttom" class="btn btn-info btn-sm float-left"><< Lista de pedidos</button>
							</a>
							<hr>
               <br>
                <h5 class="card-title">Preencha os dados do novo pedido</h5>
					<form id="edita_pedido">
					<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $pedido['id']; ?>">	
								<br>
								<br>
								<div class="alert alert-danger" role="alert" id="bxError" style="display:none;"></div>
								 <div class="row">
									<div class="col-lg-6">
											
											<div class="form-group">
												<label for="exampleInputEmail1">Fornecedor</label>
														<select class="form-control" name="id_fornecedor">
															<?php foreach ($fornecedores as $fornecedor): ?>
																<?php if($fornecedor['id'] == $pedido['id_fornecedor']){ ?>
																	<option value="<?php echo $fornecedor['id']; ?>" selected><?php echo $fornecedor['nome']; ?></option>
																<?php }else{ ?> 
																	<option value="<?php echo $fornecedor['id']; ?>" ><?php echo $fornecedor['nome']; ?></option>
																<?php } ?>
																	
															<?php endforeach; ?>
														</select>
											</div>
											<div class="form-group">
												<label for="cpf">Observacao</label>
												<textarea class="form-control" name="observacao"><?php echo $pedido['observacao']; ?></textarea>
											</div>
											
                  </div>
                  
									
								
              </div>
				<div class="card-footer">
                  <button type="buttom" class="btn btn-info float-right" onclick="edita_pedido($('#edita_pedido').serialize())">Salvar</button>
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
