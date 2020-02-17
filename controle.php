<?php

	function imprime() {



		$pessoas = array();
		$fp = fopen('pessoas.txt', 'r');

        if ($fp) {

            while(!feof($fp)) {
				$arr = array();
                $cpf = fgets($fp);
				$dados = fgets($fp);
				if(!empty($dados)) {
					$arr = explode("#", $dados);
					$pessoas[$cpf] = $arr;
				}
			}

			// fclose($fp);
		}
		
		foreach ($pessoas as $cpf => $dados) {

			if(!empty($dados)) {
				echo "<tr>";
					echo "<td>".$cpf."</td>";

					foreach ($dados as $valor) {
						echo "<td>".$valor."</td>";
					}

					echo "<td>";
						echo "<button type='submit' name='acao' value='alterar/'".$cpf.">";
							echo "<span class='glyphicon glyphicon-pencil'></span>";
						echo "</button>";
						echo "&nbsp";
						echo "<button type='submit' name='acao' value='remover/'".$cpf.">";
							echo "<span class='glyphicon glyphicon-remove'></span>";
						echo "</button>";
					echo "</td>";
				echo "</tr>";
			}
		}

	}


	function cadastrar($post) {
		
		// Monta o array
		$dados = array(
			$post['cpf'] => array(
				"nome" => $post['nome'],
				"endereco" => $post['endereco'],
				"telefone" => $post['telefone']
				
			)
		);
		//print_r($dados);
		cadastrou($dados);

	}


	function cadastrou($arr) {

		$fp = fopen('pessoas.txt', 'a+');

		if ($fp) {
			foreach($arr as $cpf => $dados) {
				if(!empty($dados)) {
					$linha = $cpf."\n".$dados['nome']."#".$dados['endereco']."#".$dados['telefone'];
					fputs($fp, "$linha\n");
				}
			}
			fclose($fp);
		}
		//print_r($linha);
		echo "[OK] Dados escritos com Sucesso!";
	}

?>