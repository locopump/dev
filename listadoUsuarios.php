<?php

include('Usuarios.php');
$obj = new Usuarios();
$data = $obj->listar();

if(isset($_GET['txtid']) || isset($_GET['txttitle']) || isset($_GET['cbocompleted'])){
	$txtid = '';
	$txttitle = '';
	$cbocompleted = 'todo';
	$usuarios = array();
	// ASIGNANDO VALORES
	if(isset($_GET['txtid'])){
		$txtid = $_GET['txtid'];
	}
	if(isset($_GET['txttitle'])){
		$txttitle = $_GET['txttitle'];
	}
	if(isset($_GET['cbocompleted'])){
		$cbocompleted = $_GET['cbocompleted'];
	}
	// CONSULTANDO
	if($txtid=='' && $txttitle=='' && $cbocompleted==-1){
		$usuarios = $data;
	}
	// PRIMER RECORRIDO
	elseif($txtid!='' && $txttitle=='' && $cbocompleted==-1){
		foreach ($data as $valores) {
			if($txtid==$valores->id){
				array_push($usuarios, $valores);
			}
		}
	}elseif($txtid!='' && $txttitle!='' && $cbocompleted==-1){
		foreach ($data as $valores) {
			if(strpos($valores->title, $txttitle)!=false && $txtid==$valores->id){
				array_push($usuarios, $valores);
			}
		}
	}elseif($txtid!='' && $txttitle=='' && $cbocompleted!=-1){
		if($cbocompleted==1){$comp=true;}else{$comp=false;}
		foreach ($data as $valores) {
			if($txtid==$valores->id && $comp==$valores->completed){
				array_push($usuarios, $valores);
			}
		}
	}
	// 2DO RECORRIDO
	elseif($txtid=='' && $txttitle!='' && $cbocompleted==-1){
		foreach ($data as $valores) {
			if(strpos($valores->title, $txttitle)!=false){
				array_push($usuarios, $valores);
			}
		}
	}elseif($txtid=='' && $txttitle!='' && $cbocompleted!=-1){
		if($cbocompleted==1){$comp=true;}else{$comp=false;}
		foreach ($data as $valores) {
			if(strpos($valores->title, $txttitle)!=false && $valores->completed==$comp){
				array_push($usuarios, $valores);
			}
		}
	}
	// 3ER RECORRIDO
	elseif($txtid!='' && $txttitle!='' && $cbocompleted!=-1){
		if($cbocompleted==1){$comp=true;}else{$comp=false;}
		foreach ($data as $valores) {
			if($txtid==$valores->id && strpos($valores->title, $txttitle)!=false && $valores->completed==$comp){
				array_push($usuarios, $valores);
			}
		}
	}
}else{
	$usuarios = $data;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/datatables/dataTables.bootstrap.css">
	<script type="text/javascript" src="js/jquery-2.1.3.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.js"></script>
</head>
<body>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<h2>B&uacute;squeda</h2>
		</div>
		<div class="col-sm-3"></div>
	</div>
	<form action="" method="GET">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-2">
				<label for="txtid">ID</label>
				<input type="text" name="txtid" id="txtid" class="form-control">
			</div>
			<div class="col-sm-2">
				<label for="cbocompleted">Completado</label>
				<select name="cbocompleted" id="cbocompleted" class="form-control">
					<option value="-1">-- Seleccione --</option>
					<option value="0">False</option>
					<option value="1">True</option>
				</select>
			</div>
			<div class="col-sm-3"></div>
		</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-3">
				<label for="txttitle">T&iacute;tulo</label>
				<input type="text" name="txttitle" id="txttitle" class="form-control">
			</div>
			<div class="col-sm-3"></div>
		</div>
		<div class="row">&nbsp;</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-3">
				<input type="submit" class="btn btn-success" value="Filtrar">
			</div>
			<div class="col-sm-3"></div>
		</div>
	</form>
	<div class="row"><hr></div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6 centered">
			<table id="table_main" width="100%">
				<thead>
					<tr>
						<th>T&iacute;tulo</th>
						<th>Completado</th>
						<th>ID</th>
					</tr>
				</thead>
				<tbody>
				<?php
					foreach($usuarios as $users){
				?>
					<tr>
						<td><?php echo $users->title; ?></td>
						<td><?php echo $users->completed; ?></td>
						<td><?php echo $users->id; ?></td>
					</tr>
				<?php
					}
				?>
				</tbody>
			</table>
		</div>
		<div class="col-sm-3"></div>
	</div>
	<script>
		$("#table_main").DataTable();
	</script>
</body>
</html>