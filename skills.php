<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>		
		<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>	
	</head>

	<body>
		<div class="contact1">
			<?php
				$habilidades_values = ["0", "1", "2", "3", "4", "5"];
				session_start();
				
				$db = new PDO('mysql:host=localhost;dbname=fatec_junior;charset=utf8', 'root', '');

				if (isset($_SESSION['MENSAGEM'])) {
						$msg = $_SESSION['MENSAGEM'];
			?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong><?=$msg?></strong>
					<a href="javascript: window.history.go(-1);">clique aqui para retornar à página com os dados do questionário</a>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php 
				unset($_SESSION['MENSAGEM']);
				} 
			?>			
			<div class="container-contact1">
				<form action="./skillsController.php" class="validate-form">
					<span class="contact1-form-title">
						Formulário para registro de habilidades e competências para seleção de profissionais da empresa júnior Fatec - Carapicuíba
					</span>
					<div class="wrap-input1 validate-input" data-validate = "O nome completo deve ser informado">
						<input id="txtNome" name="txtNome" type="text" class="input1" placeholder="Nome Completo" validation="not_empty"/>
						<span class="shadow-input1"></span>
					</div>
					<div class="wrap-input1 validate-input" data-validate = "Informe um email valido">
						<input id="txtEmail" name="txtEmail" type="text" class="input1" placeholder="Email" validation="email"/>
						<span class="shadow-input1"></span>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<div class="wrap-input1 validate-input" data-validate = "Informe um numero de telefone para contato">
									<input id="txtTelefone" name="txtTelefone" type="text" class="input1" placeholder="Telefone" validation="not_empty"/>
									<span class="shadow-input1"></span>
								</div>
							</div>
							<div class="col-md-3">
								<label class="radio-container">    Fixo
									<input type="radio" name="txtTelefoneTipo" id="txtTelefoneTipo" value="fixo">
									<span class="radiomark"></span>
								</label>
							</div>
							<div class="col-md-3">
								<label class="radio-container">   Celular
									<input type="radio" name="txtTelefoneTipo" id="txtTelefoneTipo" value="celular"/>
									<span class="radiomark"></span>
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-8">
								<div class="wrap-input1 validate-input" data-validate = "Informe seu endereço completo">
									<input id="txtEndereco" name="txtEndereco" type="text" class="input1" placeholder="Endereço" validation="not_empty"/>
									<span class="shadow-input1"></span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="wrap-input1 validate-input" data-validate = "Informe o nome do seu bairro">
									<input id="txtBairro" name="txtBairro" type="text" class="input1" placeholder="Bairro" validation="not_empty"/>
									<span class="shadow-input1"></span>
								</div>		
							</div>				
						</div>
					</div>			
					<div class="form-group">
						<div class="row">
							<div class="col-md-5">
								<div class="wrap-input1 validate-input" data-validate = "Informe o nome da sua cidade">
									<input id="txtCidade" name="txtCidade" type="text" class="input1"  placeholder="Cidade" validation="not_empty"/>
									<span class="shadow-input1"></span>
								</div>		
							</div>
							<div class="col-md-3">
								<div class="wrap-input1 validate-input" data-validate = "Informe o seu CEP">								
									<input id="txtCEP" name="txtCEP" type="text" class="input1"  placeholder="CEP"/>
									<span class="shadow-input1"></span>
								</div>		
							</div>
							<div class="col-md-4">							
								<div class="wrap-input1 validate-input" data-validate = "Informe o estado onde mora">
									<select id="txtEstado" name="txtEstado" class="input1">
										<option value="sp" selected>São Paulo</option>
										<option value="ac">Acre</option>
										<option value="al">Alagoas</option>
										<option value="ap">Amapá</option>
										<option value="am">Amazonas</option>
										<option value="ba">Bahia</option>
										<option value="ce">Ceará</option>
										<option value="df">Distrito Federal</option>
										<option value="es">Espírito Santo</option>
										<option value="go">Goiás</option>
										<option value="ma">Maranhão</option>
										<option value="mt">Mato Grosso</option>
										<option value="ms">Mato Grosso do Sul</option>
										<option value="mg">Minas Gerais</option>
										<option value="pa">Pará</option>
										<option value="pb">Paraíba</option>
										<option value="pr">Paraná</option>
										<option value="pe">Pernambuco</option>
										<option value="pi">Piauí</option>
										<option value="rj">Rio de Janeiro</option>
										<option value="rn">Rio Grande do Norte</option>
										<option value="rs">Rio Grande do Sul</option>
										<option value="ro">Rondônia</option>
										<option value="rr">Roraima</option>
										<option value="sc">Santa Catarina</option>
										<option value="se">Sergipe</option>
										<option value="to">Tocantins</option>
									</select>
									<span class="shadow-input1"></span>
								</div>
							</div>
						</div>
					</div>

					<div class="wrap-input1 validate-input" data-validate = "Informe qual ciclo você esta cursando">
						<select id="txtVinculo" name="txtVinculo" class="input1">
							<option disabled selected>Vinculo com a Fatec</option>
							<option value="aluno_1sem">Aluno de 1o semestre</option>
							<option value="aluno_2sem">Aluno de 2o semestre</option>
							<option value="aluno_3sem">Aluno de 3o semestre</option>
							<option value="aluno_4sem">Aluno de 4o semestre</option>
							<option value="aluno_5sem">Aluno de 5o semestre</option>
							<option value="aluno_6sem">Aluno de 6o semestre</option>
							<option value="aluno_7sem">Aluno de 7o semestre</option>
							<option value="aluno_8sem">Aluno de 8o semestre</option>
							<option value="formado">Graduação concluída</option>
							<option value="professor">Professor</option>
							<option value="administrativo">Adiministrativo</option>
							<option value="sem_vinculo">Sem vinculo com a faculdade</option>
						</select>
						<span class="shadow-input1"></span>
					</div>

					<div class="wrap-input1" data-validate = "Informe o nome da empresa que está trabalhando">
						<input id="txtEmpresa" name="txtEmpresa" type="text" class="input1" placeholder="Se estiver trabalhando informe o nome da empresa onde trabalha"/>
						<span class="shadow-input1"></span>
					</div>

					<div class="form-group">
						<span class="contact1-form-title">
						Informe quais são suas habilidades
						</span>
						<span class="contact2-form-title">Marque seu nivel de conhecimento entre 0 e 5, conforme a escala abaixo:</span>
						<ul>
							<li> <b>0</b> - Inexistente, não conhece o assunto </li>
							<li> <b>1</b> - Conhecimento básico, compreensão comum sobre conceitos e técnicas básicas</li>
							<li> <b>2</b> - Aprendiz, Você tem o nível de experiência adquirido em uma sala de aula e/ou cenários experimentais ou como um estagiário no trabalho. Espera-se que você precise de ajuda ao executar essa habilidade.</li>
							<li> <b>3</b> - Intermediário, Você pode concluir com êxito tarefas nesta competência, conforme solicitado. A ajuda de um especialista pode ser necessária de tempos em tempos, mas normalmente você pode executar a habilidade de forma independente.</li>
							<li> <b>4</b> - Avançado, Você pode executar as ações associadas a essa habilidade sem assistência. Você é certamente reconhecido dentro de sua organização imediata como "uma pessoa para perguntar" quando surgirem questões difíceis a respeito dessa habilidade.</li>
							<li> <b>5</b> - Expert, Você é conhecido como um especialista nesta área. Você pode fornecer orientação, solucionar problemas e responder perguntas relacionadas a essa área de especialização e ao campo em que a habilidade é usada.</li>
						</ul>
					</div>

						<?php
							// Verifica as respostas das perguntas e adiciona-as no banco de dados;
							$sql = "SELECT * FROM perguntas order by grupo, indice";
							$stmt = $db->prepare($sql);
							$stmt->execute();
							$result = $stmt->rowCount();
							$new_row = true;
							$count = 0;
							$flush_text = false;
							$text_all = "";
							$texto = "";
							$lista = array();
							forEach( $stmt as $row ) { 
								array_push($lista, $row);
							} 
							$grupo = "";
							$new_row = true;
							$first_group = true;
							for ($i = 0; $i < count($lista); $i++) {
								$row = $lista[$i];
								$new_group = $grupo != $row['grupo'];
								if ($new_group == true && $first_group == false) { 
									$text_all = $text_all . "</div>\n";
								}

								if ($new_group == true) { 
									$grupo = $row['grupo'];
									$first_group = false;
									$text_all = $text_all . "<div class=\"form-group\">\n";
									$text_all = $text_all . "	<span class=\"contact2-form-title\">";
									$text_all = $text_all . "		Habilidades sobre $grupo";
									$text_all = $text_all . "	</span>\n";
									//$text_all = $text_all . "</div>\n";
								}

								$texto = $texto . "<div class=\"col-lg-6\">\n";
								$texto = $texto . "		<label class=\"my-tooltip\">" . $row['texto'];
								$texto = $texto . "			<span class=\"my-tooltiptext\">" . $row['descricao'] . "</span>\n";
								$texto = $texto . "		</label>\n";
								$texto = $texto . "</div>\n";

								for ($val = 0; $val < count($habilidades_values); $val++) {
									$checked = $val == 0 ? "checked" : "";
									$texto = $texto . "<div class=\"col-lg-1\">\n";
									$texto = $texto . "		<label class=\"radio-container\">" . $habilidades_values[$val];
									$texto = $texto . "			<input type=\"radio\" name=\"". $row['chave'] . "\" id=\"". $row['chave'] . "\" value=\"" . $habilidades_values[$val] . "\" $checked/>";
									$texto = $texto . "			<span class=\"radiomark\"></span>";
									$texto = $texto . "		</label>";
									$texto = $texto . "</div>\n";
								}
	
								if ( $new_row == true ) { 
									$text_all = $text_all . "<div class=\"row\">\n";
									$text_all = $text_all . $texto;
									$text_all = $text_all . "</div>\n";
									$texto = "";
								}
							}
							echo $text_all; 
						?>
					</div>
					<div class="form-group">
						<span class="contact1-form-title">
						Quais horários você tem disponibilidade para trabalhar na empresa junior
						</span>
						<table class="table">
							<thead>
								<tr>
									<th>Horários Dias da Semana</th>
									<th>Segunda-feira</th>
									<th>Terça-feira</th>
									<th>Quarta-feira</th>
									<th>Quinta-feira</th>
									<th>Sexta-feira</th>
									<th>Sábado</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>Manhã</th>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="seg-manha">
											<span class="checkmark"></span>										
										</label>
									</td>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="ter-manha">
											<span class="checkmark"></span>										
										</label>
									</td>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="qua-manha">
											<span class="checkmark"></span>										
										</label>
									</td>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="qui-manha">
											<span class="checkmark"></span>										
										</label>
									</td>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="sex-manha">
											<span class="checkmark"></span>										
										</label>
									</td>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="sab-manha">
											<span class="checkmark"></span>										
										</label>
									</td>
								</tr>

								<tr>
									<th>Tarde</th>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="seg-tarde">
											<span class="checkmark"></span>										
										</label>
									</td>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="ter-tarde">
											<span class="checkmark"></span>										
										</label>
									</td>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="qua-tarde">
											<span class="checkmark"></span>										
										</label>
									</td>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="qui-tarde">
											<span class="checkmark"></span>										
										</label>
									</td>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="sex-tarde">
											<span class="checkmark"></span>										
										</label>
									</td>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="sab-tarde">
											<span class="checkmark"></span>										
										</label>
									</td>
								</tr>

								<tr>
									<th>Noite</th>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="seg-noite">
											<span class="checkmark"></span>										
										</label>
									</td>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="ter-noite">
											<span class="checkmark"></span>										
										</label>
									</td>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="qua-noite">
											<span class="checkmark"></span>										
										</label>
									</td>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="qui-noite">
											<span class="checkmark"></span>										
										</label>
									</td>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="sex-noite">
											<span class="checkmark"></span>										
										</label>
									</td>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="sab-tarde">
											<span class="checkmark"></span>										
										</label>
									</td>
									<td><label class="check-container">
											<input class="form-check-input" type="checkbox"
											name="txtHorario[]" id="txtHorario" value="sab-noite">
											<span class="checkmark"></span>										
										</label>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="wrap-input1" data-validate = "Informe a quantidade de horas por semana que você pode trabalhar na empresa junior">
							<input id="txtTempo" name="txtTempo" type="number" min="0" max="44" class="input1" placeholder="Quantas horas por semana você pode trabalhar na empresa junior"/>
							<span class="shadow-input1"></span>
						</div>
					</div>
					<div class="container-contact1-form-btn">
						<button type="submit" name="txtButton" value="submeter" class="contact1-form-btn" aria-hidden="true">Submeter</button>
					</div>
				</form>					
			</div>
		</div>

	<!--===============================================================================================-->
	<script src="js/main.js"></script>
	</body>

</html>
