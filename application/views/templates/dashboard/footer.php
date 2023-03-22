 <!-- Main Footer -->
 <footer class="main-footer">
    <strong>Developed by Gabriel Paixão.</strong>
    Todos os direitos reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>Versão</b> 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url('/application/assets/adminlte/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('/application/assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE -->
<script src="<?php echo base_url('/application/dist/js/adminlte.js'); ?>"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url('/application/assets/adminlte/plugins/chart.js/Chart.min.js'); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('/application/dist/js/pages/dashboard3.js'); ?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('/application/assets/adminlte/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('/application/assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('/application/assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo base_url('/application/assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('/application/assets/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('/application/assets/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('/application/assets/adminlte/plugins/jszip/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('/application/assets/adminlte//plugins/pdfmake/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('/application/assets/adminlte//plugins/pdfmake/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('/application/assets/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('/application/assets/adminlte/plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
<script src="<?php echo base_url('/application/assets/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
			"lengthChange": false, 
			"autoWidth": false,
			"order": [[0, 'desc']],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"
      }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#tblPedidos").DataTable({
      "responsive": true, 
			"lengthChange": false, 
			"autoWidth": false,
			"order": [[0, 'desc']],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tblPedidos_wrapper .col-md-6:eq(0)'); //AO REMOVER A TRADUÇÃO, OS BOTÕES DE EXPORTAÇÃO SÃO HABILITADOS
  });
</script>
<script>

	
function formatMoney(value) {
  const formatter = new Intl.NumberFormat('pt-BR', {
    style: 'currency',
    currency: 'BRL',
    minimumFractionDigits: 2
  });
  return formatter.format(value);
}


$(document).ready(function(){
		$('.cpf').mask('000.000.000-00', {reverse: true});
		$('.cep').mask('00000-000');
		$('.monetario').mask('###0.00', {reverse: true});
});
</script>
<script>
  // Função que preenche os campos de endereço com base no CEP digitado
  function preencherEndereco(cep) {
    // Chave de acesso à API dos Correios
    var apiKey = 'SUA_CHAVE_DE_ACESSO_AQUI';

    // URL da API dos Correios para consulta de CEP
    var apiUrl = 'https://viacep.com.br/ws/' + cep + '/json/';

    // Requisição AJAX para a API dos Correios
    $.ajax({
      url: apiUrl + '?apiKey=' + apiKey,
      dataType: 'json',
      success: function(data) {
        // Preenche os campos de endereço com os dados retornados pela API
        $('#endereco').val(data.logradouro);
        
        $('#municipio').val(data.localidade);
        $('#estado').val(data.uf);
      },
      error: function() {
        alert('Não foi possível buscar o endereço.');
      }
    });
  }

  // Evento disparado ao digitar o CEP
  $('#cep').keyup(function() {
    var cep = $(this).val().replace(/\D/g, '');
    if (cep.length == 8) {
      preencherEndereco(cep);
    }
  });
	
	//CADASTRA COLABORADOR POR AJAX
	function cadastra_colaborador(dados) {
		
    $.ajax({
        type: "POST",
        url: "save",
        data: dados,
        success: function (data) {	
            if (data == 1) {
                alert('Dados salvos com sucesso!');
								$("#bxError").hide();
								location.href = "list";
            } else {
								$("#bxError").show();
								$("#bxError").html(data);
            }
        },
				
				error: function(result) {
						console.log(result);
				}
    });
	}

	//EDITA COLABORADOR POR AJAX
	function edita_colaborador(dados) {
		$.ajax({
        type: "POST",
        url: "../save",
        data: dados,
        success: function (data) {	
            if (data == 1) {
                alert('Dados salvos com sucesso!');
								$("#bxError").hide();
								location.href = "../list";
            } else {
								$("#bxError").show();
								$("#bxError").html(data);
            }
        },
				
				error: function(result) {
						console.log(result);
				}
    });
	}

	//CADASTRA PRODUTOS POR AJAX
	function cadastra_produto(dados) {		
    $.ajax({
        type: "POST",
        url: "save",
        data: dados,
        success: function (data) {	
            if (data == 1) {
                alert('Dados salvos com sucesso!');
								$("#bxError").hide();
								location.href = "list";
            } else {
								$("#bxError").show();
								$("#bxError").html(data);
            }
        },
				
				error: function(result) {
						console.log(result);
				}
    });
	}

	//EDITA PRODUTOS POR AJAX
	function edita_produto(dados) {
		$.ajax({
        type: "POST",
        url: "../save",
        data: dados,
        success: function (data) {	
            if (data == 1) {
                alert('Dados salvos com sucesso!');
								$("#bxError").hide();
								location.href = "../list";
            } else {
								$("#bxError").show();
								$("#bxError").html(data);
            }
        },
				
				error: function(result) {
						console.log(result);
				}
    });
	}

	//CADASTRA PEDIDO POR AJAX
	function cadastra_pedido(dados) {		
    $.ajax({
        type: "POST",
        url: "save",
        data: dados,
        success: function (data) {	
							  alert('Dados salvos com sucesso!');
								$("#bxError").hide();
								location.href = "../itens/list/"+data;
        },
				error: function(result) {
						console.log(result);
				}
    });
	}

	//EDITA PRODUTOS POR AJAX
	function edita_pedido(dados) {
		$.ajax({
        type: "POST",
        url: "../save",
        data: dados,
        success: function (data) {	
            if (data == 1) {
                alert('Dados salvos com sucesso!');
								$("#bxError").hide();
								location.href = "../list";
            } else {
								$("#bxError").show();
								$("#bxError").html(data);
            }
        },
				error: function(result) {
						console.log(result);
				}
    });
	}

	//CADASTRA ITEM POR AJAX
	function cadastra_item(dados) {		
    $.ajax({
        type: "POST",
        url: "../save",
        data: dados,
        success: function (data) {	
					
            if (data != 999) {
                alert('Dados salvos com sucesso!');
								$("#bxError").hide();
								location.href = "../list/"+data;
            } else {
								$("#bxError").show();
								$("#bxError").html("Erro na integração com o banco de dados");
            }
        },
				error: function(result) {
						console.log(result);
				}
    });
	}

	//EDITA ITEM POR AJAX
	function edita_item(dados) {
		$.ajax({
        type: "POST",
        url: "../save",
        data: dados,
        success: function (data) {	
					if (data != 999) {
                alert('Dados salvos com sucesso!');
								$("#bxError").hide();
								location.href = "../list/"+data;
            } else {
								$("#bxError").show();
								$("#bxError").html("Erro na integração com o banco de dados");
            }
        },
				error: function(result) {
						console.log(result);
				}
    });
	}

	//PEGAR PREÇO DO PRODUTO
	function get_produtos_by_id(id) {
		$.ajax({
        type: "POST",
        url: "../preco/"+id,
        data: id,
        success: function (data) {							
						$("#preco").val(formatMoney(data));            
        },
				error: function(result) {
						console.log(result);
				}
    });
	}

	//PARA IMPEDIR QUE O FORM SEJA SUBMETIDO
	$("#cadastra_colaborador").submit(function(event) {
  event.preventDefault();
	});
	$("#edita_colaborador").submit(function(event) {
  event.preventDefault();
	});

	$("#cadastra_produto").submit(function(event) {
  event.preventDefault();	});
	$("#edita_produto").submit(function(event) {
  event.preventDefault();
	});

	$("#cadastra_pedido").submit(function(event) {
  event.preventDefault();	});
	$("#edita_pedido").submit(function(event) {
  event.preventDefault();
	});

	$("#cadastra_item").submit(function(event) {
  event.preventDefault();	});
	$("#edita_item").submit(function(event) {
  event.preventDefault();
	});

	function calcula_total() {
		var quantidade = parseInt($("#quantidade").val()) ;
		var preco = parseFloat($("#preco").val().toString().replace(/[^\d.,]/g, '').replace(',', '.'));
		var total = preco * quantidade;
		$("#total").val("R$ "+total);  /// PRECISA MELHORA TAMBÉM, MAS NO MOMENTO JÁ ESTOU FICANDO MUITO SEM TEMPO
	}
</script>


</body>
</html>

