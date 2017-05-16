<?php
    session_start();
    @include "config.php";
       
    @include $coreLocation."/coreInc.php";


	//----------------------------------------------------------------
	
class Acesso{	
	
	private $sql="";
	private $linhas=null;
	private $login="";
	private $senha="";
	
	 // Um construtor privado
    public function __construct($oPOST) 
    {
		$this->login = isset($oPOST["login"])?$oPOST["login"]:"";
		$this->senha = isset($oPOST["senha"])?$oPOST["senha"]:"";
	
	    $this->sql="select u.login, u.nome, u.idperfilusuario, p.nome as perfil from usuario u 
			LEFT join perfil p on u.idperfilusuario = p.id
			where u.login = '$this->login' and u.senha = '$this->senha'"; 
		
		$this->getLogin();
		$this->getRetornoLogin();
		
	}
	
	private function getLogin(){
		$olinhas = null;
		
		try{
			$result = Conexao::singleton()->executar($this->sql);
			$olinhas = mysql_fetch_array($result);
			
		} catch (Exception $e){
			print '<br><hr><b>*Erro:</b> '.$e->getMessage().'<br><hr><br>';
			fprintf(php_, "Error: %s\n", $e->getMessage());
			//throw $e;

		}
		
		$this->linhas =$olinhas;
	}
	
	
	private function getRetornoLogin(){
		if (!$this->linhas)
		{
			
					
				echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=noacess.php'>";
				/* echo "<html><body>";
				echo "<p align=\"center\">  <img src='img/usernao.PNG' width='30' height='33'> Login ou Senha Incorretos! </p>";
				echo "<p align=\"center\"> <a href = \"index.php\"> voltar </a></p>";
				echo "</html></body>";*/
		}
		else
		{
			

			$_SESSION["nome"]		= $this->linhas["nome"];
			$_SESSION["idperfil"] 	= $this->linhas["idperfilusuario"];
			$_SESSION["perfil"] 	= $this->linhas["perfil"];
			$_SESSION["login"]		= $this->login;
			
/* Verifica Nivel de acesso, nesse caso usuario com Nivel 0 estão bloqueados */			
				$perfil=$_SESSION["idperfil"];
					echo $perfil;
					if($perfil==0){
						  session_destroy();
						  echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=usuario_bloqueado.php'>";
                       }else {
					     echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index2.php'>";   
							//header("location: index2.php");
							}
		}
	}
	
	private function getAcesso(){
		$osql = "
			";
		
		try{
			$result = Conexao::singleton()->executar($osql);
			//print 'akiiii';
			$olinhas = mysql_fetch_array($result);
			
		} catch (Exception $e){
			print '<br><hr><b>*Erro: </b> '.$e->getMessage().'<br><hr><br>';
			
		}
		
		$_SESSION["idperfil"] 	= $this->linhas["idperfilusuario"];
	}

}	
	
	//----------------------------------------------------------------
	$oAcesso = new Acesso($_POST);
	
	
?>
