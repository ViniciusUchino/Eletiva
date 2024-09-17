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
			
			function converterData(string $data): DateTime {
				
				$partes = explode('/', $data);
				return new DateTime("{$partes[2]}-{$partes[1]}-{$partes[0]}");
			}

			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				try {
					
					$data1 = (string) $_POST['data1'];
					$data2 = (string) $_POST['data2'];

					
					$dateTime1 = converterData($data1);
					$dateTime2 = converterData($data2);

					
					$diferenca = $dateTime1->diff($dateTime2);

					
					echo "<p>A diferença entre as datas <strong>$data1</strong> e <strong>$data2</strong> é de <strong>{$diferenca->days}</strong> dias.</p>";
					
				} catch (Exception $e) {
					echo "Erro: " . $e->getMessage();
				}
			}
		?>
		<form method="POST">
			<div class="mb-3">
				<label for="data1" class="form-label">Digite a primeira data (dd/mm/yyyy):</label>
				<input type="text" class="form-control" id="data1" name="data1" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{4}" required>
			</div>
			<div class="mb-3">
				<label for="data2" class="form-label">Digite a segunda data (dd/mm/yyyy):</label>
				<input type="text" class="form-control" id="data2" name="data2" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{4}" required>
			</div>
			<button type="submit" class="btn btn-primary">Calcular Diferença</button>
		</form>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
