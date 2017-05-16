<? session_start(); 
if (!isset($_SESSION["login"])) {header("location: index.php");}
	$nivel = $_SESSION['idperfil'];
	
	
?>
<head>
    	<script type="text/javascript" SRC="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>

    <!-- MASTER STYLESHEET-->
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    
    <!-- LOAD TIPSY TOOLTIPS-->
    <script type="text/javascript" SRC="js/jquery.tipsy.js"></script>
   
    <!-- LOAD CUSTOM JQUERY SCRIPTS-->
    <script type="text/javascript" SRC="js/scripts.js"></script>	
    
	 <!-- LOAD FACEBOX -->
	<script type="text/javascript" SRC="js/facebox.js"></script>
    <link href="css/facebox.css" rel="stylesheet" type="text/css" />
    

    <!-- LOAD FLOT GRAPHS -->
    <script type="text/javascript" SRC="js/jquery.flot.pack.js"></script>
    <!--[if IE]>
     <script language="javascript" type="text/javascript" src="js/excanvas.pack.js"></script>
    <![endif]-->
    
    
    <!--[if IE 6]>
    <script src="js/pngfix.js"></script>
    <script>
        DD_belatedPNG.fix('.png_bg');
    </script>        
    <![endif]-->

	
    <!-- LOAD GRAPH JAVASCRIPT FILE-->
	<script SRC="js/graphs.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/bubble-tooltip.css" media="screen">
	<script type="text/javascript" src="js/bubble-tooltip.js"></script>
        <title>SISGERA -  Gestão | Negocios | Controles</title>
</head>
<?
   $data = date('Y-m-d'); 
 	$idperfil = isset($_SESSION["idperfil"])? $_SESSION["idperfil"] : 0;

	@include "config.php";
	@include $coreLocation."/coreInc.php";
    @include "headerSite.php";
	    ?>
   
<body>
	<style type="text/css">
	body{
		background-image:url('../../images/heading3.gif');
		background-repeat:no-repeat;
		font-family: Trebuchet MS, Lucida Sans Unicode, Arial, sans-serif;
		font-size:0.9em;
		

	}
	a{
		color: #D60808;
		text-decoration:none;
	}
	a:hover{
		border-bottom:1px dotted #317082;
		color: #307082;
	}
	</style>
<div id="bubble_tooltip">
	<div class="bubble_top"><span></span></div>
	<div class="bubble_middle"><span id="bubble_tooltip_content"></span></div>
	<div class="bubble_bottom"></div>
</div>

    <link href="css/facebox.css" rel="stylesheet" type="text/css" />
<div class="clearfix">&nbsp;</div>
    <center>        	
    <table width="900" align="center" border="0" cellpadding="0" cellspacing="0">
	 
      <tr>
	    <th  scope="col"><b> Lista de Clientes</b></th>
      </tr>
</table>
	<table width="900" align="center" border="1" cellpadding="0" cellspacing="0">
	  <tr>
	    <th width="82" scope="col"><center>
	      <a href="#" onMouseOver="showToolTip(event,'Informações do Cliente');return false" onMouseOut="hideToolTip()">ID Cliente</a>
	    </center></th>
        
        <th width="82" scope="col"><center>
	      Nome
	    </center></th>
        
        <th width="52" scope="col"><center>
            E-Mail
        </center></th>
        
        <th width="322" scope="col"><center>
          Tel. Residencial
        </center></th>
        
        <th width="56" scope="col"><center>
          Celular
        </center></th>
        
	    <th width="129" scope="col"><center>Status</center></th>
        
        <th scope="col" colspan="3"><center>Ferramentas</center></th>
      </tr>
  </div>
	  <?php
				    //Executa a consulta
//////////////////////////////////////////////////////////////////////////////////////
  $conn ;
  $bco ;
  $conn = 0;
   
		    //Executa a consulta
//////////////////////////////////////////////////////////////////////////////////////
  include "config/conexao.php" ;
  $sql ="SELECT * FROM cad_cliente";
 
  $resmes = mysql_query($sql,$conec) ;
  $linhasmes = mysql_num_rows($resmes) ;
  $rowm = mysql_fetch_array($resmes) ;
  $linhasinim = 1 ;  
  ///////////////////////////////////////////////////////////////////////////////////////
			while ($linhasinim <= $linhasmes) {
		
						$id=$rowm['id'];
						$nome=$rowm['nome'];
					 	$email=$rowm['email'];
						$telresidencial=$rowm['telresidencial'];
						$celular=$rowm['celular'];
									
						$endereco=$rowm['endereco'];
						$cep=$rowm['cep'];
						
						
												

					
			    ?>

 		<tr >
	    <td scope="col"><center><a href="#" onMouseOver="showToolTip(event,'<? echo "$endereco | $cep |"; ?> ');return false" onMouseOut="hideToolTip()"><?=$id?></a></center></td>
        <td scope="col"><center><?=$nome?></center></td>
        <td scope="col"><center><?=$email?></center></td>
        <td scope="col"><?=$telresidencial?></td>
        <td scope="col"><?=$celular?></td>
        <td scope="col"><center><?=$status?></center></td>
	    <td width="44" align="center" scope="col"><center><a href=".php?id=<?=$id?>"><img src="images/alterar.jpg" alt="Atualizar" width="15" height="15" border="0" /></a></center></td>
   	    <td width="44" align="center" scope="col"><center><a href=".php?id=<?=$id?>"><img src="images/cancel.png" alt="Excluir" width="16" height="16" border="0" /></a></center></td>
    	<td width="53" align="center" scope="col"><center><a href=".php?id=<?=$id?>"><img src="images/lapis.png" alt="Editar" width="16" height="16" border="0" /></a></center></td>
      </tr>
       <?php
			 	
		$linhasinim++ ;
   		$rowm = mysql_fetch_array($resmes) ;
		
		
		 }		
     
			    ?>
   
    <tr>
     	<td colspan="8" align="center" scope="col"><a href="javascript:self.print()"> <img src="images/print.png" border="0"></a> </td>
    </tr>
 </table>
</center>

</body>
</html>
