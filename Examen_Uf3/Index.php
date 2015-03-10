<?php
	
	ini_set('display_errors','on');
	include  'Conectar.php';
	
		
		function DB_connect($config){
			try{
				$db=new PDO($config['DRIVER'].':host='.$config['DBHOST'].';dbname='.$config['DBNAME'],$config['DBUSER'],$config['DBPASSWD']);	
				return $db;
			}catch(PDOException $e){
				echo '<p>Error: '. $e->getMessage().'</p>';
				die;
				exit;
			}
		}

		$gbd=DB_connect($config);

 		$user = $_POST['user'];
		$passwd = $_POST['passwd'];

			
		$result = $gbd->prepare("SELECT * FROM users WHERE name = ?");
		$result -> bindParam(1, $user);
		$result ->execute();
		while($row = $result->fetch()){
			
			$user_compr = $row["name"];
			$passwd_compr = $row["pass"];
			$rol = $row['rol'];
     		
		}
		
			
		if($user_compr == $user && $passwd_compr == $passwd){
				
			echo "Bienvenido ". $user.": <br/> <br/>";
			
			if($rol == 3){
				echo "<a href='Registrate_Interno.html'><input type='button' value='Registrar Usuarios' id='registro'></a><br/> <br/>";
				echo "<a href='listar_usuarios.php'><input type='button' value='Lista Usuarios' id='listar'></a>";
				
				
			}
			
			
			
		}else{
			
			header("Location:Login.html");
			
		}
			
	
	$gbd=null;
	
