<?php 
	/**
	* 	Clase de Conexion
	*/
	class mySqlx
	{
		function conecta($bd = "webhelp",$user = "root",$pass = "",$host = "127.0.0.1")
		{
			$connect =  mysqli_connect($host,$user,$pass,$bd);
			return $connect;
		}

		function consulta($sql)
		{
			$con = $this->conecta();
			$result = mysqli_query($con,$sql);
			mysqli_close($con);			
			return $result;
		}
		
		function regUser($nombre, $paterno, $materno, $user, $pass, $address, $tel, $mail, $type)
		{
			$qry  = "INSERT INTO usuario ";
			$qry .= " (`nombre`, "; 
			$qry .= "`ap_pat`, ";
			$qry .= "`ap_mat` ,";
			$qry .= "`usuario`, ";
			$qry .= "`pass`, ";
			$qry .= "`direccion`, ";
			$qry .= "`telefono`, ";
			$qry .= "`e_mail`, ";
			$qry .= "`tipo_usuario`) ";
			$qry .= "VALUES ";
			$qry .= "('" . $nombre . "', ";
			$qry .= " '" . $paterno . "', ";
			$qry .= "'" . $materno . "', ";
			$qry .= "'" . $user . "', ";
			$qry .= "'" . $pass . "', ";
			$qry .= "'" . $address . "', ";
			$qry .= "'" . $tel . "', ";
			$qry .= "'" . $mail . "', ";
			$qry .= "'" . $type . "');";

			$result = $this->consulta($qry);
			return $result;
		}
		
		function modUser($id,$nombre, $paterno, $materno, $user, $pass, $address, $tel, $mail, $type)
		{
			$qry  = "UPDATE usuario ";
			$qry .= " SET nombre = '$nombre', ap_pat = '$paterno', ap_mat = '$materno', usuario = '$user', pass = '$pass', direccion = '$address', telefono = '$tel', e_mail = '$mail', tipo_usuario = '$type'";
			$qry .= " WHERE usuarioid = $id;";
			$result = $this->consulta($qry);
			return $result;
		}
		
		function delUser($id)
		{
			session_start();
			if ($id != $_SESSION['userid'])
			{
				$qry = "DELETE FROM usuario WHERE usuarioid = $id;";
				$result = $this->consulta($qry);
				var_dump(result);
				return $result;
			}
			else
				return 2;
		}
		
		function login($user,$pass)
		{
			$connect = $this->conecta();
			$user = mysqli_real_escape_string($connect, $user);
			$pass = mysqli_real_escape_string($connect, $pass);
			$qry  = "SELECT ";
			$qry .= "	usuarioid, ";
			$qry .= "	tipo_usuario, ";
			$qry .= "	CONCAT(IF(NOT ISNULL(nombre),nombre,' '),' ',IF(NOT ISNULL(ap_pat),ap_pat,' '),' ',IF(NOT ISNULL(ap_mat),ap_mat,' ')) AS name ";
			$qry .= "FROM ";
			$qry .= "	usuario ";
			$qry .= "WHERE ";
			$qry .= "	usuario  = '" . $user . "' ";
			$qry .= "	AND pass ='" . $pass . "';";
			$result = mysqli_query($connect,$qry);
			$data = mysqli_fetch_array($result);
			
			if(!empty($data['tipo_usuario']))
			{
				session_start();
				$_SESSION["name"] = $data['name'];
				$_SESSION['userid'] = $data['usuarioid'];
				$_SESSION['type'] = $data['tipo_usuario'];
				return $data;
				
			}
			else
				return 0;	
		}

		function getUsersList()
		{
			$query = "SELECT usuario FROM usuario;";
			$connect = $this->conecta();
			$result = mysqli_query($connect,$query);
			$usersList = array();
			while ($data = mysqli_fetch_array($result)) 
				array_push($usersList, $data[0]);
			
			return $usersList;
		}

		function regComment($comment, $user)
		{
			$state = 0;// CASOS : 0 = NO LEIDO, 1 = LEIDO, 2= CANCELADO 
			$query = "INSERT INTO registro (fecha,comentario,usuarioid,estatus,usuario_can,fecha_can)";
			$query .= "VALUES (NOW(), '". $comment ."', '". $user ."', '". $state ."', NULL, NULL);";
			$connect = $this->conecta();
			$result = mysqli_query($connect,$query);
			if($result)
				echo 1;
			else
				echo 0;
		}

		function updateComment($status,$commentId)
		{
			$connect = $this->conecta();
			$query = "UPDATE registro SET estatus =" . $status . " WHERE regid = ". $commentId .";";
			$result = mysqli_query($connect,$query);
			if($result)
				echo 1;
			else
				echo 0;
		}

		

		function cancelComment($commentId,$user)
		{
			$connect = $this->conecta();
			$query = "UPDATE registro SET estatus = 2, usuario_can = '". $user ."', fecha_can = NOW()   WHERE regid = '". $commentId ."';";
			$result = mysqli_query($connect,$query);
			if($result)
				echo 1;
			else
				echo 0;
		}
		
		function dropComment($commentId)
		{
			$date = date('Y-m-d');
			$connect = $this->conecta();
			$query = "DELETE FROM registro  WHERE regid = '". $commentId ."';";
			$result = mysqli_query($connect,$query);
			if($result)
				echo 1;
			else
				echo 0;
		}

		function getComments($userid=false)
		{
			$qry  = "SELECT ";
			$qry .= "	regid,";
			$qry .= "	fecha,";
			$qry .= "	comentario,";
			$qry .= "	(SELECT CONCAT(nombre,' ',ap_pat,' ',ap_mat) ";
			$qry .= "		FROM ";
			$qry .= "			usuario u ";
			$qry .= "		WHERE ";
			$qry .= "			u.usuarioid = r.usuarioid) AS usuarioid,";
			$qry .= "	estatus,";
			$qry .= "	usuario_can,";
			$qry .= "	fecha_can ";
			$qry .= "	FROM";
			$qry .= " registro r ";
			$qry .= ($userid != false) ? "WHERE usuarioid = " . $userid . ";" : ";" ;
			
			$result = $this->consulta( $qry );
						
			if($result->num_rows > 0)
			{
				$dataArray = array();
				for ($i=0; $i < $result->num_rows ; $i++) 
				{ 
					$data = $result->fetch_array(MYSQLI_ASSOC);
					array_push($dataArray,$data);
				}
				return $dataArray;
			}
			else
				return 0;
		}

		function logout()
		{
			session_start();
			session_destroy();
			echo "<!DOCTYPE html>
				<head>
					<script>
						function exit(){
							location.href = '../index.php';
						}
					</script>
				</head>
				<body onload='exit()'>
				</body>
			</html>";
		}
	}
?>