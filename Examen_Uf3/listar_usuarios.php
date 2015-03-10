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
		
		$result = $gbd->query("SELECT * FROM users");
			while($row = $result->fetch()){
				
				echo "Id Usuario: ".$row['idusers']." "."User: ".$row['name']." "."Email: ".$row['email']." "."Password: ".$row['pass']." "."Rol: ".$row['rol']."<br/><br/>";
			}
		
		echo "<a href='login.html'><input type='button' id='atras' value='Atras'/></a>";