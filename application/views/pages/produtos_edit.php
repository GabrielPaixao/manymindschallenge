<?php $this->load->view('templates/dashboard/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edição de produto</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edição de produtos</li>
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
							<button type="buttom" class="btn btn-info btn-sm float-right">Lista de produtos</button>
							</a>
							<hr>
               
                <h5 class="card-title">Preencha os dados do novo produto</h5>
					<form id="edita_produto">
					<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $produto['id']; ?>">	
								<br>
								<br>
								<div class="alert alert-danger" role="alert" id="bxError" style="display:none;"></div>
								 <div class="row">
									<div class="col-lg-6">
									<div class="form-group">
												<label for="exampleInputEmail1">Nome do produto</label>
												<input type="text" class="form-control" id="nome" name="nome" placeholder="Escreva o produto" value="<?php echo $produto['nome']; ?>">
											</div>
											
											<div class="form-group">
												<label for="cpf">Descrição</label>
												<textarea class="form-control" name="descricao"><?php echo $produto['descricao']; ?></textarea>
											</div>
											
											<div class="form-group">
												<label for="matricula">Preço (R$)</label>
												<input type="text" class="form-control monetario" name="preco" placeholder="Escreva o preço" value="<?php echo $produto['preco']; ?>">
											</div>
                  </div>
                  
									
								
              </div>
				<div class="card-footer">
                  <button type="buttom" class="btn btn-info float-right" onclick="edita_produto($('#edita_produto').serialize())">Salvar</button>
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
