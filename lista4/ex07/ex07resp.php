<?php declare(strict_types=1)?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diferença entre Datas</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<main class="container">
		<?php
			
			function converterData(string $dataEntrada): DateTime {
				
				$partesData = explode('/', $dataEntrada);
				return new DateTime("{$partesData[2]}-{$partesData[1]}-{$partesData[0]}");
			}

			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				try {
					
					$dataInicial = (string) $_POST['dataInicial'];
					$dataFinal = (string) $_POST['dataFinal'];

					
					$dateTimeInicial = converterData($dataInicial);
					$dateTimeFinal = converterData($dataFinal);

					
					$diferencaDatas = $dateTimeInicial->diff($dateTimeFinal);

					
					echo "<p>A diferença entre as datas <strong>$dataInicial</strong> e <strong>$dataFinal</strong> é de <strong>{$diferencaDatas->days}</strong> dias.</p>";
					
				} catch (Exception $erro) {
					echo "Erro: " . $erro->getMessage();
				}
			}
		?>
		<form method="POST">
			<div class="mb-3">
				<label for="dataInicial" class="form-label">Digite a primeira data (dd/mm/yyyy):</label>
				<input type="text" class="form-control" id="dataInicial" name="dataInicial" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{4}" required>
			</div>
			<div class="mb-3">
				<label for="dataFinal" class="form-label">Digite a segunda data (dd/mm/yyyy):</label>
				<input type="text" class="form-control" id="dataFinal" name="dataFinal" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{4}" required>
			</div>
			<button type="submit" class="btn btn-primary">Calcular Diferença</button>
		</form>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
