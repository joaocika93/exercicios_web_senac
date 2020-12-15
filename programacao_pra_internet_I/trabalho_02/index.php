<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trabalho IMC</title>
	<style>
		@import url("css/style.css");
	</style>
</head>

<body>
	<header>Calculadora IMC Sem Cópia :):):)</header>
	<form action="index.php" method="POST">
		<section class="formPessoas">
			<?php
			for ($i = 1; $i <= 3; $i++) {
				print('
					<section class="pessoa">
						<h1>Pessoa ' . $i . '</h1>
						<div>
							<div>
								<input name="nome[' . $i . ']" type="text" placeholder="Digite seu nome..." required>
							</div>
							<div>
								<input name="idade[' . $i . ']" type="number" placeholder="Digite sua idade..." required>
							</div>
							<div>
								<input name="peso[' . $i . ']" type="number" step="0.01" placeholder="Digite seu peso..." required>
							</div>
							<div>
								<input name="altura[' . $i . ']" type="number" step="0.01" placeholder="Digite sua altura..." required>
							</div>
						</div>
					</section>
					');
			}
			?>
		</section>
		<section><button class="cadastrar" type="submit" name="acao">Clique Aqui para Calcular...</button></section>
		</section>
	</form>

	<section class="dados">
		<?php
		$pessoas = array();
		$mediaImc = 0;
		$mediaIdade = 0;
		$categoria;
		if ($_POST) {
			include "./php/pessoa.class.php";

			for ($i = 1; $i <= count($_POST["nome"]); $i++) {
				$pessoa = new Pessoa($_POST["nome"][$i], $_POST["idade"][$i], $_POST["peso"][$i], $_POST["altura"][$i]);

				$pessoa->setImc($pessoa->getPeso(), $pessoa->getAltura());
				$pessoa->setGrupo($pessoa->getImc());
				$pessoas[] = $pessoa;
			}

			foreach ($pessoas as $pessoa) {
				$mediaImc += $pessoa->getImc();
				$mediaIdade += $pessoa->getIdade();
			}

			$mediaImc = round($mediaImc / count($pessoas), 2);
			$mediaIdade = round($mediaIdade / count($pessoas), 2);

			if ($mediaImc < 18.5) {
				$categoria = 'Abaixo do Peso';
			} elseif ($mediaImc >= 18.5 && $mediaImc <= 24.9) {
				$categoria = 'Peso Normal';
			} elseif ($mediaImc >= 25 && $mediaImc <= 29.9) {
				$categoria = 'Sobrepeso';
			} elseif ($mediaImc >= 30 && $mediaImc <= 34.9) {
				$categoria = 'Obesidade grau I';
			} elseif ($mediaImc >= 35 && $mediaImc <= 39.9) {
				$categoria = 'Obesidade grau II';
			} elseif ($mediaImc >= 40) {
				$categoria = 'Obesidade grau III';
			}

			foreach ($pessoas as $pessoa) {
				print('
				<section class="dadosPessoas">
				Nome - ' . $pessoa->getNome() . ' ---  Idade - ' . $pessoa->getIdade() . ' <br>
				Seu imc é ' . $pessoa->getImc() . ' e você está com ' . $pessoa->getGrupo() . ' <br>
				Resultado obtido a partir do peso ' . $pessoa->getPeso() . ' Kg e da altura ' . $pessoa->getAltura() . ' m <br>
				</section>');
			}

		}
		?>
	</section>
	<section class="informacao">
		<?php
		if ($_POST){
		print('<section >
			A média de imc das pessoas é ' . $mediaImc . ' corresponde à ' . $categoria . ' <br>
				A média de idade é ' .intval($mediaIdade) . ' anos <br>
			</section>');
		}
		?>
	</section>
	<footer>
		<div>
			<h1>By João Marcos</h1>
		</div>
	</footer>
</body>

</html>