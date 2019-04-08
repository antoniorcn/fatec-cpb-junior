	<?php

		function default_value($var, $defaultValue) {
			if (isset($_REQUEST[$var])) { 
				return $_REQUEST[$var];
			} else {
				return $defaultValue;
			}
		}

		$contato_id = 1;

		$db = new PDO('mysql:host=localhost;dbname=fatec_junior;charset=utf8', 'fatec', 'fRcgOYqNefSNv5qQruLL');

		$nome = default_value('txtNome', "");
		$email = default_value('txtEmail', "");
		$telefone = default_value('txtTelefone', "");
		$telefonetipo = default_value('txtTelefoneTipo', "");
		$endereco = default_value('txtEndereco', "");
		$bairro = default_value('txtBairro', "");
		$cidade = default_value('txtCidade', "");
		$cep = default_value('txtCEP', "");
		$estado = default_value('txtEstado', "");
		$vinculo = default_value('txtVinculo', "");
		$curso = default_value('txtCurso', "");
		$semestre = default_value('txtSemestre', "");
		$trabalha = default_value('txtTrabalha', "");
		$empresa = default_value('txtEmpresa', "");
		$cargo = default_value('txtCargo', "");
		$funcao = default_value('txtFuncao', "");
		$tempo_disponivel = default_value('txtTempo', 0);
		$skills = default_value('txtSkills', []);
		$horarios =  default_value('txtHorario', []);
		$button =   default_value('txtButton', "");

		echo implode(",", $horarios) . "<br/>";

		session_start();
		if ($button == "submeter") {
			$error = 0;
			if (isset($nome)) {
				$sql = "INSERT INTO contatos (id, nome, email, telefone, tel_tipo, endereco, bairro, ";
				$sql = $sql . " cidade, estado, cep, vinculo, semestre, curso, trabalha, empresa_nome, ";
				$sql = $sql . " empresa_cargo, empresa_funcao, tempo_disponivel) ";
				$sql = $sql . " VALUES (0, :nome, :email, :tel, :tel_tipo, :endereco, :bairro, :cidade, ";
				$sql = $sql . " :estado, :cep, :vinculo, :semestre, :curso, :empresa_nome, :empresa_cargo, :empresa_funcao, :tempo_disponivel)";
				$stmt = $db->prepare($sql);
				$stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
				$stmt->bindValue(':email', $email, PDO::PARAM_STR);
				$stmt->bindValue(':tel', $telefone, PDO::PARAM_STR);
				$stmt->bindValue(':tel_tipo', $telefonetipo, PDO::PARAM_STR);
				$stmt->bindValue(':endereco', $endereco, PDO::PARAM_STR);
				$stmt->bindValue(':bairro', $bairro, PDO::PARAM_STR);
				$stmt->bindValue(':cidade', $cidade, PDO::PARAM_STR);
				$stmt->bindValue(':estado', $estado, PDO::PARAM_STR);
				$stmt->bindValue(':cep', $cep, PDO::PARAM_STR);
				$stmt->bindValue(':vinculo', $escolaridade, PDO::PARAM_STR);
				$stmt->bindValue(':curso', $curso, PDO::PARAM_STR);
				$stmt->bindValue(':semestre', $semestre, PDO::PARAM_STR);
				$stmt->bindValue(':trabalha', $trabalha, PDO::PARAM_STR);
				$stmt->bindValue(':empresa_nome', $empresa, PDO::PARAM_STR);
				$stmt->bindValue(':empresa_cargo', $cargo, PDO::PARAM_STR);
				$stmt->bindValue(':empresa_funcao', $funcao, PDO::PARAM_STR);
				$stmt->bindValue(':tempo_disponivel', $tempo_disponivel, PDO::PARAM_INT);
				$stmt->execute();
				echo "<p>SQL : $sql </p>";
				$result = $stmt->rowCount();
				$contato_id = $db->lastInsertId();
				if ($result != 1) {
					$error = 1;
				}
				echo "Contato saved $result";
			

				// Verifica as respostas das perguntas e adiciona-as no banco de dados;
				$sql = "SELECT * FROM perguntas";
				$stmt = $db->prepare($sql);
				$stmt->execute();
				$result = $stmt->rowCount();
				forEach( $stmt as $row ) {
					$chave = $row['chave'];
					$valor = default_value($chave, 0);
					//echo "Analisando pergunta : " . $row['id'] . " - " . $row['valor'] . " Localizado: $key <br/>";
					
					$pergunta_id = $row['id'];
					$sql = "INSERT INTO respostas (id, contato_id, pergunta_id, chave, valor) VALUES (0, :contato, :pergunta, :chave, :valor)";
					$stmt = $db->prepare($sql);
					$stmt->bindValue(':contato', $contato_id, PDO::PARAM_INT);
					$stmt->bindValue(':pergunta', $pergunta_id, PDO::PARAM_INT);
					$stmt->bindValue(':chave', $chave, PDO::PARAM_STR);
					$stmt->bindValue(':valor', $valor, PDO::PARAM_INT);
					$stmt->execute();
					$result = $stmt->rowCount();
					if ($result != 1) {
						$error = 1;
					}
				}

				if (isset($horarios) && count($horarios) > 0) {
					foreach($horarios as $horario) {
						$sql = "INSERT INTO horarios (id, contato_id, horario) VALUES (0, :contato, :horario)";
						$stmt = $db->prepare($sql);
						$stmt->bindValue(':contato', $contato_id, PDO::PARAM_INT);
						$stmt->bindValue(':horario', $horario, PDO::PARAM_STR);
						$stmt->execute();
						$result = $stmt->rowCount();
						if ($result != 1) {
							$error = 1;
						}
					}
		
				}
			}
			if ($error == 0) {
				$_SESSION['MENSAGEM'] = 'Questionario inserido com sucesso.';
				header('Location: ./success.php');
			} else { 
				$_SESSION['MENSAGEM'] = 'Erro ao registrar o questionário, por favor tente novamente mais tarde.';
				header('Location: ./skills.php');
			}
		} else { 
			$_SESSION['MENSAGEM'] = 'Por favor escolha ao menos um tipo de curso e um horário em que você tenha disponibilidade';
			header('Location: ./skills.php');
		}
		
?>