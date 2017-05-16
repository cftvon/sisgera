<? 
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$idperfilusuario=0;



// VALIDANDO SE A DATA SOLICITADA JA EXISSTE NA BASE 
 $conn;
 $bco;
 $conn=0;
	
	include "config/conexao.php" ;			
	  			 			 $sql="INSERT INTO  usuario VALUES ('', '$nome' ,'$login','$senha','$email', '$idperfilusuario')";
							
							$result = @mysql_query($sql);
							 if ($result){
 								  echo "cadastro OK";
								} else {
								   echo "<div style='background:#09C;color: #FFF;'>Erro no cadastro: Acionar Administrador</div>";
								   echo "Erro no cadastro $result ";
									die('Invalid query:'. mysql_error());
									}
?>
