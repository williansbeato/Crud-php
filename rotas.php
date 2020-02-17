<?php
	function rotas($url) {

		$dados = explode("/", $url);

		// CADASTRAR
		if(strcmp($dados[0], "cadastro") == 0) {
            echo "<script>location.href='viewCadastro.php'</script>";

		}
		// ALTERAR
		else if(strcmp($dados[0], "alterar") == 0) {
			echo "<script> alert('ALTERAR') </script>";
		}
		// REMOVER
		else if(strcmp($dados[0], "remover") == 0){
			 echo "<script> alert('REMOVER') </script>";
		}

		//home
		else if(strcmp($dados[0], "home") == 0){
			echo "<script>location.href='index.php'</script>";
	   }

	  
	}
?>
