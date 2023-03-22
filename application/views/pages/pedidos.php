<?php $this->load->view('templates/dashboard/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pedidos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lista de pedidos</li>
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
							<button type="buttom" class="btn btn-info btn-sm float-right">Novo pedido</button>
							</a>
							<hr>
								
                <div class="card-body">
									<h4>Lista de pedidos</h4>
                <table id="tblPedidos" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Fornecedor</th>
                    <th>Data</th>
                    <th>Itens (qtd)</th>
                    <th>Velor total</th>                    
                    <th>Ações</th>
                  </tr>
                  </thead>
                  <tbody>
									<?php foreach ($pedidos as $pedido): ?>
                  <tr>
                    <td><?php echo $pedido['id'];  ?></td>
                    <td><?php echo $pedido['nome_fornecedor'];  ?></td>
                    <td><?php echo $pedido['data_pedido'];  ?></td>
                    <td>
											<ul>
											<?php 
													
													//Pode melhorar, eu sei
													$this->load->model('pedidos_model'); 
													$produtos =  $this->pedidos_model->get_produtos_by_pedidos($pedido['id']);
													
													foreach ($produtos as $produto){
														echo "<li>".$produto['nome']."(".$produto['quantidade'].")</li>";
													}
											?>
											</ul>
										</td>
                    <td><?php 
													
													//Pode melhorar, eu sei													
													$total =  $this->pedidos_model->total_by_pedido($pedido['id']);
													echo "R$ ".$total['total'];
													
											?></td>
                    <td class="text-center">
												<?php if($pedido['ativo'] == 1){ ?>
															<a href="edit/<?php echo $pedido['id']; ?>">
																<button type="button" class="btn btn-block btn-info btn-xs">Editar</button>
															</a>
															<a href="inativa/<?php echo $pedido['id']; ?>"; onclick="if(confirm('Deseja realmente finalizar este pedido?')){ return true;}else{return false;}">
																<button type="button" class="btn btn-block btn-success btn-xs">Ativo<br> <small>(Clique para finalizar)</small></button>
															</a>
															<a href="deleta/<?php echo $pedido['id']; ?>"; onclick="if(confirm('Deseja realmente excluir este pedido?')){ return true;}else{return false;}">
																<button type="button" class="btn btn-block btn-danger btn-xs">Deletar</button>
															</a>
															
												<?php }else{ ?>
														<a href="reativa/<?php echo $pedido['id']; ?>"; onclick="if(confirm('Deseja realmente reativar este pedido?')){ return true;}else{return false;}">
															<button type="button" class="btn btn-block btn-default btn-xs">Finalizado</button>
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
