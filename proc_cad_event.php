<?php

session_start();

include_once("conecao.php");

$title =filter_input(INPUT_POST, 'title');
$color =filter_input(INPUT_POST, 'color');
$start =filter_input(INPUT_POST, 'start');
$end =filter_input(INPUT_POST, 'end');
 
if(!empty($title)&&!empty($color)&&!empty($start)&&!empty($end)){
	
	
	//converter data 
	
	$data = explode(" ", $start);
	list($date,$espac, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);
	$start_sem_barra = $data_sem_barra . " " .$espac. $hora;
	
	
	
	
	
	$data= explode(" ",$end);
	list($data,$espac,$hora) = $data;
	$data_sem_barra = array_reverse(explode("/",$data));
	$data_sem_barra = implode("-",$data_sem_barra);
	$end_sem_barra = $data_sem_barra." ".$espac.$hora;
	
	$result_evets="INSERT INTO events (title,color,start,end) VALUES ('$title','$color','$start_sem_barra','$end_sem_barra')";
	$result = mysqli_query($conn,$result_evets);
	
	//verificar s consegui salvar no banco
	if(mysqli_insert_id($conn)){
		$_SESSION['MSG']= "<div class='alert alert-success' role='alert'>Cadastro realizado com sucesso!! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: index.php");
		
	}else{
		$_SESSION['MSG']= "<div class='alert alert-warning' role='alert'>Erro ao cadastrar o evento!! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: index.php");
	}
	
}else{
	$_SESSION['MSG']= "<div class='alert alert-warning' role='alert'>Erro ao cadastra evento!! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	header("Location: index.php");
}
?>