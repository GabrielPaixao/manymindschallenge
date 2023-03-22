<?php $this->load->view('templates/dashboard/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Colaboradores</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lista de colaboradores</li>
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
							<a href="register">
							<button type="buttom" class="btn btn-info btn-sm float-right">Novo colaborador</button>
							</a>
							<hr>
								
                <div class="card-body">
									<h4>Lista de colaboradores</h4>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>Matrícula</th>
                    <th>Ações</th>
                  </tr>
                  </thead>
                  <tbody>
									<?php foreach ($colaboradores as $colaborador): ?>
                  <tr>
                    <td><?php echo $colaborador['id'];  ?></td>
                    <td><?php echo $colaborador['nome'];  ?></td>
                    <td><?php echo $colaborador['email'];  ?></td>
                    <td><?php echo $colaborador['cpf'];  ?></td>
                    <td><?php echo $colaborador['matricula'];  ?></td>
                    <td class="text-center">
												<?php if($colaborador['ativo'] == 1){ ?>
															<a href="edit/<?php echo $colaborador['id']; ?>">
																<button type="button" class="btn btn-block btn-info btn-xs">Editar</button>
															</a>
															<a href="delete/<?php echo $colaborador['id']; ?>"; onclick="if(confirm('Deseja realmente excluir este colaborador?')){ return true;}else{return false;}">
																<button type="button" class="btn btn-block btn-danger btn-xs">Inativar</button>
															</a>
												<?php }else{ ?>
														<a href="reativa/<?php echo $colaborador['id']; ?>"; onclick="if(confirm('Deseja realmente reativar este colaborador?')){ return true;}else{return false;}">
															<button type="button" class="btn btn-block btn-default btn-xs">Desativado</button>
															<small><em>Clique para reativar</em></small>
														</a>
												<?php } ?>
										</td>
                  </tr>
                  <?php endforeach; ?>
                </table>
              </div>
              </div>
            </div>

           
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
