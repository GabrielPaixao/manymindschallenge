<div class="sidebar">
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('colaboradores/list') ?>" class="nav-link">
                 
								<i class="fas fa-users nav-icon"></i> 
                  <p>Colaboradores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('produtos/list') ?>" class="nav-link">
                  
									<i class="fas fa-gifts nav-icon"></i>
                  <p>Produtos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('pedidos/list') ?>" class="nav-link">
									<i class="fas fa-hand-point-up nav-icon"></i>
                  <p>Pedidos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('login') ?>" class="nav-link">
									
									<i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>Sair</p>
                </a>
              </li>
            </ul>
          </li>
        
        </ul>
      </nav>
</div>	  
