<?php $this->load->view('templates/dashboard/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Itens</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lista de itens</li>
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
							<a href="../register/<?php echo $id_pedido ?>">
							<button type="buttom" class="btn btn-info btn-sm float-right">Novo item</button>
							</a> &nbsp;
							<a href="../../pedidos/list">
							<button type="buttom" class="btn btn-warning btn-sm float-left"><< Voltar para pedidos</button>
							</a>
							<hr>
								
                <div class="card-body">
									<h4>Lista de itens <small>(Pedido #<?php echo $id_pedido ?>)</small></h4>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Produto</th>
                    <th>Preço unitário</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                    <th >Ações</th>
                  </tr>
                  </thead>
                  <tbody>
									<?php foreach ($itens as $item): ?>
                  <tr>
                    <td><?php echo $item['id'];  ?></td>
                    <td><?php echo $item['produto'];  ?></td>
                    <td><?php echo $item['preco'];  ?></td>
                    <td><?php echo $item['quantidade'];  ?></td>
                    <td><?php echo $item['total'];  ?></td>
                   
                    <td class="text-center">
												
															<a href="../edit/<?php echo $item['id']; ?>">
																<button type="button" class="btn btn-block btn-info btn-xs">Editar</button>
															</a>
															<a href="../delete/<?php echo $item['id']; ?>/<?php echo $id_pedido; ?>"; onclick="if(confirm('Deseja realmente excluir este item?')){ return true;}else{return false;}">
																<button type="button" class="btn btn-block btn-danger btn-xs">Deletar</button>
															</a>
											
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
