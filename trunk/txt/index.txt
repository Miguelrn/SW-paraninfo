<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Deportes UCM</title>
		<meta charset="utf-8">
		<meta name="Keywords" content="deportes, deportesUCM, deportes ucm, gratis, barato, rugby,tenis,futbito,futbol sala, baloncesto, ucm, paraninfo">
		<meta name="author" content="GRUPO 18 - SW - IVAN MENDEZ JIMENEZ - JOSE MIGUEL RODRIGUEZ NAVARRO">
		<link rel="shortcut icon" type="image/x-icon" href="./Images/favicon.ico">
		<link href="./css/bootstrap.css" rel="stylesheet" type="text/css"/>
		<link href="./css/index.css" rel="stylesheet" type="text/css"/>
		<script src="./jquery/jquery-2.1.0.min.js" type="text/javascript"></script>
		<script src="./jquery/paypal-button.min.js" type="text/javascript"></script>
		
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js' type='text/javascript'>
		</script>
		
		<script type="text/javascript">
			var $j = jQuery.noConflict();
			    $j(function () {
				    $j('#easy-slider div:gt(0)').hide();
				    setInterval(function(){
				      $j('#easy-slider div:first-child').fadeOut(0)
				         .next('div').fadeIn(1000)
				         .end().appendTo('#easy-slider');}, 4000);
				});
		</script>
		
	</head>
	<body>
		
		<div class="navbar navbar-inverse navbar-fixed-top cab col-md-12">
			<?php include_once './vista/cabecera.php';?>
		</div>
		<div class="cuerpo">
			<?php 
	                //print_r($_SESSION); 
	                if (isset($_SESSION['error'])){
	        ?>              
	        <script>                        
	                alert("<?php echo $_SESSION['error']?>");//informa del error mediante un popup          
	        </script>       
	        <?php
	                        unset($_SESSION['error']);
	                }                       
	        ?>
			<div class="col-md-2 sidebar-outer">
				<!--<div class="sidebar">-->
					<?php include_once './vista/categorias.php'; ?>	
				<!--</div>-->
			</div>
			<div class="zonaCentral col-md-7" id="zona_central">
				<?php include_once './vista/contenido.php'; ?>		
			</div>
			<div class="col-md-2 sidebar-outer">
				<!--<div class="sidebar">-->
					<?php include_once './vista/cesta.php'; ?>
				<!--</div>-->
				
			</div>
		</div>
		<div class="navbar navbar-inverse navbar-fixed-bottom">
			<?php include_once './vista/footer.php'; ?>
		</div>
		
	</body>
	</html>