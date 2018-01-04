<?php
session_start();
include_once("conecao.php");

$esult_events = "SELECT * FROM events";
$resultado_events = mysqli_query($conn,$esult_events);
$rows_events = mysqli_fetch_array($resultado_events);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset='utf-8' />

	<link href='css/bootstrap.min.css' rel='stylesheet' />
	<link href='css/fullcalendar.min.css' rel='stylesheet' />
	<link href='css/personalizado.css' rel='stylesheet' />
	<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
	<script src='js/moment.min.js'></script>
	<script src='js/jquery.min.js'></script>
	<script src='js/bootstrap.min.js'></script>
	<script src='js/fullcalendar.min.js'></script>
	<script src='locale/pt-br.js'></script>
	<script>
		$(document).ready(function() {
			$('#calendar').fullCalendar({
				 header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
					defaultDate: Date(),
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					
					 eventClick: function(event) {

						$('#visualizar #id').text(event.id);//envio no formato text para modal visualizar modo viu
						$('#visualizar #id').val(event.id);//envio no formato value para modal visualizar modo edit
						$('#visualizar #title').text(event.title);
						$('#visualizar #title').val(event.title);
						$('#visualizar #start').text(event.start.format('DD/MM/YYYY  HH:mm:ss'));
						$('#visualizar #start').val(event.start.format('DD/MM/YYYY  HH:mm:ss'));
						$('#visualizar #end').text(event.end.format('DD/MM/YYYY  HH:mm:ss'));
						$('#visualizar #end').val(event.end.format('DD/MM/YYYY  HH:mm:ss'));
						$('#visualizar #color').val(event.color);
						$('#visualizar').modal('show');
						return false;
					
					 },
					 
					 selectable: true,
					 selectHelper: true,
					 select: function(start, end){
						 $('#cadastra #start').val(moment(start).format('DD/MM/YYYY  HH:mm:ss'));
						 $('#cadastra #end').val(moment(end).format('DD/MM/YYYY  HH:mm:ss')); 
						 $('#cadastra').modal('show');
					 },
					
					events: [
							
						<?php  
							while($rows_events = mysqli_fetch_array($resultado_events)){?>
								{
								id: <?php echo $rows_events['id'] ; ?>,
								title: '<?php echo  $rows_events['title'] ; ?>',
								start: '<?php echo $rows_events['start'] ;  ?>',
								end: '<?php echo $rows_events['end'] ;  ?>',
								color: '<?php echo  $rows_events['color'] ; ?>'
								},
							<?php
							}
						?>
				]
			});
		});

		//mascara par campo de data e hora
		
		function DataHora(evento, objeto){
				var keypress=(window.event)?event.keyCode:evento.which;
				campo = eval (objeto);
				if (campo.value == '00/00/0000 00:00:00'){
					campo.value=""
				}
			 
				caracteres = '0123456789';
				separacao1 = '/';
				separacao2 = ' ';
				separacao3 = ':';
				conjunto1 = 2;
				conjunto2 = 5;
				conjunto3 = 10;
				conjunto4 = 13;
				conjunto5 = 16;
				if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19)){
					if (campo.value.length == conjunto1 )
					campo.value = campo.value + separacao1;
					else if (campo.value.length == conjunto2)
					campo.value = campo.value + separacao1;
					else if (campo.value.length == conjunto3)
					campo.value = campo.value + separacao2;
					else if (campo.value.length == conjunto4)
					campo.value = campo.value + separacao3;
					else if (campo.value.length == conjunto5)
					campo.value = campo.value + separacao3;
				}else{
					event.returnValue = false;
				}
			}
	</script>



</style>
</head>
<body>
<div class="container">
	<div class="page-header">
	<h2>Agenda</h2>
	</div>
	<?php
	if(isset($_SESSION['MSG'])){
		echo $_SESSION['MSG'];
		unset($_SESSION['MSG']);
	}
	?>
  <div id='calendar'></div>
</div>
  
	<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title text-center" >Dados do evento</h4>
		</div>
		<div class="modal-body">
			<div class="visualizar">
			<dl class="dl-horizontal">
				<dt>ID do evnto</dt>
				<dd id="id"></dd>
				<dt>Titulo do evento</dt>
				<dd id="title"></dd>
				<dt>Inicio do evento</dt>
				<dd id="start"></dd>
				<dt>Fim do evento</dt>
				<dd id="end"></dd>
			</dl>
			<button type="submit" class="btn btn-warning btn-canc-vis">Editar</button>
			</div>
			
			
			
			<div class="formi">
						<form class="form-horizontal" method="POST" action="proc_edit_event.php">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" name="title" id="title" placeholder="Titulo do evento">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-10">
					<select name="color" class="form-control" id="color">
						<option value="">Selecione</option>
						<option style="color: #FFD700;" value="#FFD700">Amarelo</option>
						<option style="color: #1a75ff;" value="#1a75ff">Azul</option>
						<option style="color: #00ff00;" value="#00ff00">Verde</option>
						<option style="color: #ff0000;" value="#ff0000">Vermelho</option>
						<option style="color: #cc00ff;" value="#cc00ff">Roxo</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Data inicial</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" name="start"  id="start" onKeypress="DataHora(event, this)">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Data final</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" name="end"  id="end" onKeypress="DataHora(event, this)" >
					</div>
				</div>
				
				<input type="hidden" class="form-control" name="id"  id="id"  >
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					<button type="button" class="btn btn-primary btn-canc-edit">Cancelar</button>
					<button type="submit" class="btn btn-warning">Salvar alerações</button>
					</div>
				</div>
			</form>
			
			
			</div>
			
			
			
		</div>
		<div class="modal-footer">
			
		</div>
		</div>
	</div>
	</div>
	
	
	
	<div class="modal fade" id="cadastra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title text-center" >Cadastrar evento</h4>
		</div>
		<div class="modal-body">
			
			
			
			<form class="form-horizontal" method="POST" action="proc_cad_event.php">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" name="title" id="inputEmail3" placeholder="Titulo do evento">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-10">
					<select name="color" class="form-control" id="color">
						<option value="">Selecione</option>
						<option style="color: #FFD700;" value="#FFD700">Amarelo</option>
						<option style="color: #1a75ff;" value="#1a75ff">Azul</option>
						<option style="color: #00ff00;" value="#00ff00">Verde</option>
						<option style="color: #ff0000;" value="#ff0000">Vermelho</option>
						<option style="color: #cc00ff;" value="#cc00ff">Roxo</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Data inicial</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" name="start"  id="start" onKeypress="DataHora(event, this)">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Data final</label>
					<div class="col-sm-10">
					<input type="text" class="form-control" name="end"  id="end" onKeypress="DataHora(event, this)" >
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-success">Cadastrar</button>
					</div>
				</div>
			</form>
			
			
			
			
		</div>
		</div>
	</div>
	</div>

	
	<script type="text/javascript">
	
	$('.btn-canc-vis').on("click", function(){
		$('.formi').slideToggle();
		$('.visualizar').slideToggle();
	});
	
	$('.btn-canc-edit').on("click", function(){
		$('.visualizar').slideToggle();
		$('.formi').slideToggle();
	})
	</script>
	
</body>
</html>
