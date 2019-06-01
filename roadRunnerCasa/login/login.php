<?php 

	if(isset($_POST['btnEntrar'])){

			$usuario = $_POST['txt_usuario'];
			$senha = $_POST['txt_senha'];
			$senha_crip = md5($senha);
			$btnlogin = $_POST['btnEntrar'];

			$sql = "SELECT tbl_usuario.*, tbl_nivel_usuario.* FROM tbl_usuario INNER JOIN tbl_nivel_usuario ON tbl_usuario.id_nivel_usuario = tbl_nivel_usuario.id_nivel_usuario WHERE tbl_usuario.status = 1 AND tbl_nivel_usuario.status = 1 AND tbl_usuario.login_usuario='".$usuario."' AND tbl_usuario.senha_usuario='".$senha_crip."'";

			$select = mysqli_query($conexao, $sql);

			if(mysqli_num_rows($select)){
				$login = mysqli_fetch_array($select);
				$_SESSION['nome'] = $login['nome_usuario'];    
				$_SESSION['nivel'] = $login['nivel_usuario'];

				header('location:../roadRunnerCms/cms.php');

			}else{

			}
		}
?>	



