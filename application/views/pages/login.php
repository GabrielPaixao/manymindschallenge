<?php $this->load->view('templates/login/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <body class="hold-transition login-page" style="background-image: url('https://www.codewithrandom.com/wp-content/uploads/2022/10/Number-Guessing-Game-using-JavaScript-3.png');background-repeat: no-repeat;background-size:cover;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h2>Desafio <strong>ManyMinds</strong></h2>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sistema de autenticação</p>

	  	<?php if ($this->session->flashdata('erro')) { ?>
    		<div class="alert alert-danger"><?php echo $this->session->flashdata('erro'); ?></div>
		<?php } ?>
		
    <?php echo form_open('login/autenticar'); ?>
	  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">


		
	  <?php if ($this->session->flashdata('cod') != 5) { ?>
        <div class="input-group mb-3">
          <input type="email" name="login" class="form-control" placeholder="E-mail">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="senha" class="form-control" placeholder="Senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">

            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Acessar</button>
          </div>
          <!-- /.col -->
        </div>
		<?php } ?>
		<?php echo form_close(); ?>


      <!-- /.social-auth-links -->


    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
<?php $this->load->view('templates/login/footer'); ?>  
