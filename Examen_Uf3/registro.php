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
		$email = $_POST['email'];
		$rol = $_POST['rol'];
 		
		//echo $user;
		echo $passwd;
		
		$result = $gbd->query("SELECT idusers FROM users ORDER BY idusers DESC LIMIT 1");
		
		while($row = $result->fetch()){
			
			$ult_iduser = $row['idusers'];
		
		}
		
		$ult_iduser ++;
		$rol = 2;
		
		if($_POST['rol'] == NULL){
			
			$rol = 2;
			
		}else{
			
			$rol=$_POST['rol']; ;
		}
		
		echo $rol;
			
			
		$result = $gbd->prepare("INSERT INTO users (idusers,name,email,pass,rol) VALUES (?,?,?,?,?)");
		$result -> bindParam(1, $ult_iduser);
		$result -> bindParam(2, $user);
		$result -> bindParam(3, $email);
		$result -> bindParam(4, $passwd);
		$result -> bindParam(5, $rol);
		$result ->execute();
		
		$gbd=null;
		
		header("Location:Login.html");
	