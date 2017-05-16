<?php

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$sexo = $_POST['sexo'];
$email = $_POST['email'];
$datanascimento = $_POST['nascimento'];
$telresidencial = $_POST['telresidencial'];
$celular = $_POST['celular'];
$endereco = $_POST['endereco'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$cep = $_POST['cep'];
$datainset =  date("d/m/y h:m:s", time()) ;
$ativo = "S";

	// leitura das datas
			$dia = date('d');
			$mes = date('m');
			$ano = date('Y');
			$semana = date('w');
		// configuração mes
		switch ($mes){
			case 1: $mes = "JANEIRO"; break;
			case 2: $mes = "FEVEREIRO"; break;
			case 3: $mes = "MARCO"; break;
			case 4: $mes = "ABRIL"; break;
			case 5: $mes = "MAIO"; break;
			case 6: $mes = "JUNHO"; break;
			case 7: $mes = "JULHO"; break;
			case 8: $mes = "AGOSTO"; break;
			case 9: $mes = "SETEMBRO"; break;
			case 10: $mes = "OUTUBRO"; break;
			case 11: $mes = "NOVEMBRO"; break;
			case 12: $mes = "DEZEMBRO"; break;
		}

// VALIDANDO SE A DATA SOLICITADA JA EXISSTE NA BASE 
 $conn;
 $bco;
 $conn=0;
	

		 // echo "<div style='background:#09C;color: #FFF;'>Dados Gravados COm Sucesso</div>";
			error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
			 $host ="localhost";
			 $usuario ="hugors";
			 $senha ="hugo2911";
			 $base ="sistema";
			 
			$conec = mysql_connect($host,$usuario,$senha)  ;
			if ($conec) {
			  $bco = mysql_select_db($base,$conec) ; 
			  if ($bco) {
				$conectou = 1 ;  
			  } else {
				echo "Banco de dados  não encontrado !!!" ;
			  }
			} else {
			  echo "Erro na conexão - Falta de Conexão !!!!" ;
			} 			
	  			 			 
							 $id='';
							 							
							$result = mysql_query ("INSERT INTO cad_cliente  ".
													"(id, nome, cpf, rg, sexo, email, datanascimento, telresidencial, celular, endereco, complemento, bairro, cidade, cep, datainsert,mes, ano,  ativo) ".
													"VALUES ".
													"('$id', '$nome' ,'$cpf', '$rg' ,'$sexo', '$email', '$datanascimento', '$telresidencial', '$celular', '$endereco', '$complemento', '$bairro', '$cidade', '$cep',  '$datainset', '$mes','$ano', '$ativo')"); 
								if (! $result ) { 
								die( 'Invalid query: ' . mysql_error ()); 
									echo "<div style='background:#09C;color: #FFF;'>Erro no cadastro: Acionar Administrador</div>";
										} Else{
											echo "<div style='background:#09C;color: #FFF;'>Dados Gravados COm Sucesso</div>";
											 //echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=cadok.php'>";
										}
	/*
	tabela
			 CREATE TABLE `sistema`.`cad_cliente` (
				`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
				`nome` VARCHAR( 50 ) NULL ,
				`cpf` VARCHAR( 20 ) NULL ,
				`rg` VARCHAR( 20 ) NULL ,
				`sexo` VARCHAR( 10 ) NULL ,
				`email` VARCHAR( 35 ) NULL ,
				`datanascimento` VARCHAR( 15 ) NULL ,
				`telresidencial` VARCHAR( 20 ) NULL ,
				`celular` VARCHAR( 20 ) NULL ,
				`endereco` VARCHAR( 100 ) NULL ,
				`complemento` VARCHAR( 100 ) NULL ,
				`bairro` VARCHAR( 30 ) NULL ,
				`cidade` VARCHAR( 30 ) NULL ,
				`cep` VARCHAR( 15 ) NULL ,
				`datainsert` VARCHAR( 20 ) NULL ,
				`mes` VARCHAR( 20 ) NULL ,
				`ano` VARCHAR( 10 ) NULL ,
				`ativo` VARCHAR( 5 ) NULL
		) ENGINE = MYISAM 
		*/		
						
?>
