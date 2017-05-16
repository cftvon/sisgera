<?php
    session_start();
    @include "config.php";
       
    @include $coreLocation."/coreInc.php";


	//----------------------------------------------------------------
	
class Acesso{	
	
	private $sql="";
	private $linhas=null;
	private $email="";
	
	 // Um construtor privado
    public function __construct($oPOST) 
    {
		$this->email = isset($oPOST["email"])?$oPOST["email"]:"";
	
	    $this->sql="select u.login, u.nome, u.email from usuario u 
				where u.email = '$this->email'"; 
		
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
			echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=nok_acesso_email.php'>";
				//echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=noacess.php'>";
				/* echo "<html><body>";
				echo "<p align=\"center\">  <img src='img/usernao.PNG' width='30' height='33'> Login ou Senha Incorretos! </p>";
				echo "<p align=\"center\"> <a href = \"index.php\"> voltar </a></p>";
				echo "</html></body>";*/
		}
		else
		{
			
			echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=acesso_email.php'>";

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
