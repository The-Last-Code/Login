<?php
    // if(!isset($_SESSION['id_cientista']))
    // {
    //     header("Location: LoginCadastro.php");
    //     exit;
    // }
	session_start();

    print_r($_SESSION);exit;
	echo $_SESSION['login'];exit;
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{
  		header('location:../View/LoginCadastro.php');
  	}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Formulario</title>
	<link rel="stylesheet" type="text/css" href="./style/styleForm.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">

</head>
<body>
    <form action="../Controllers/CadastroController.php" method="POST" >
	<input type="hidden" name="acao" value="cadastroPub"> 
	<div class="container">
		<div class="contact-box">
			<div class="right">
				<h2>Criar Publicação</h2>
				<input type="text" class="field" placeholder="Título" name="tit_projeto">
                <label for="">Data de Início</label>
				<input type="date" class="field" placeholder="Data de Início"name="dti_projeto">
                <label for="">Data Final</label>
				<input type="date" class="field" placeholder="Data de Termino" name="dtt_projeto">
				<textarea style="resize: none" placeholder="Mensagem" class="field" name="res_projeto"></textarea>

				<select name="pub_projeto"class="field">
					<option value="">Tipo de acesso</option>
					<option value="1">Publico</option>
					<option value="0">Privado</option>
				</select>
				<a><input type="submit" class="buttonForm" value="Criar publicação"> </a>
				<a href="./Home.php"><input type="button"class="buttonForm2" value="Voltar"></a>
			</div>
		</div>
		</div>
    </form>
</body>
</html>
