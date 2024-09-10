<?php declare(strict_types=1)?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultado</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<main class="container">
		<?php
			function transformarPalavra(string $palavra): array {
				return [
					'maiuscula' => strtoupper($palavra),
					'minuscula' => strtolower($palavra)
				];
			}

			if ($_SERVER['REQUEST_METHOD'] == "POST"){
				try{
					$palavra = (string) $_POST['palavra'];
					$resultado = transformarPalavra($palavra);
					echo "<p> Palavra original: $palavra</p>";
					echo "<p> Em maiúsculas: ".$resultado['maiuscula']."</p>";
					echo "<p> Em minúsculas: ".$resultado['minuscula']."</p>";
				}catch (Exception $e){
					echo "Erro: ".$e->getMessage();
				}
			}
		?>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
