<?php $this->load->view('templates/dashboard/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cadastro de item <small>(Pedido #<?php echo $id_pedido ?>)</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Itens</li>
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
							<button type="buttom" class="btn btn-info btn-sm float-right">Lista de itens</button>
							</a>
							<hr>
                <h5 class="card-title">Preencha os dados do novo item </h5>
								

								<form id="cadastra_item">
									<input type="hidden" name="id_pedido" id="id_pedido" value="<?php echo $id_pedido; ?>">
								<br>
								<br>
								<div class="alert alert-danger" role="alert" id="bxError" style="display:none;"></div>
								 <div class="row">
									<div class="col-lg-6">
											
									<div class="form-group">
												<label for="exampleInputEmail1">Selecione o produto</label>
														<select class="form-control" name="id_produto" id="id_produto"  onchange="get_produtos_by_id(this.value);">
															<option value="#">selecione</option>
															<?php foreach ($produtos as $prduto): ?>
																	<option value="<?php echo $prduto['id']; ?>"><?php echo $prduto['nome']; ?></option>
															<?php endforeach; ?>
														</select>
											</div>											
											<div class="form-group">
												<label for="cpf">Quantidade</label>
												<input type="number" id="quantidade" name="quantidade" class="form-control monetario" min="1" onchange="calcula_total()">
											</div>
											
											<div class="form-group">
												<label for="matricula">Preço (R$)</label>
												<input type="text" readonly class="form-control monetario" name="preco" id="preco" placeholder="R$">
											</div>
											
											<div class="form-group">
												<label for="matricula">Total (R$)</label>
												<input type="text" readonly class="form-control monetario" name="total" id="total" placeholder="R$">
											</div>
                  </div>
                  
								
              </div>
							<div class="card-footer">
                  <button type="buttom" class="btn btn-info float-right" onclick="cadastra_item($('#cadastra_item').serialize())">Salvar</button>
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
