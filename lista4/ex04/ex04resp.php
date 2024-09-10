<?php declare(strict_types=1)?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validação de Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<main class="container">
		<?php
			function validarData(int $dia, int $mes, int $ano): bool {
				return checkdate($mes, $dia, $ano);
			}

			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				try {
					$dia = (int) $_POST['dia'];
					$mes = (int) $_POST['mes'];
					$ano = (int) $_POST['ano'];
					
					if (validarData($dia, $mes, $ano)) {
						$dataFormatada = sprintf("%02d/%02d/%04d", $dia, $mes, $ano);
						echo "<p>A data informada é válida: <strong>$dataFormatada</strong></p>";
					} else {
						echo "<p>A data informada é <strong>inválida</strong>.</p>";
					}
				} catch (Exception $e) {
					echo "Erro: " . $e->getMessage();
				}
			}
		?>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
