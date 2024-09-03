<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resposta exercicio 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Resposta do exercício 4</h1>
    <?php
    $valorProduto = floatval($_POST['valor1']);

    if ($valorProduto > 100) {
        $desconto = $valorProduto * 0.15; 
        $novoValor = $valorProduto - $desconto; 
    } else {
        $novoValor = $valorProduto;
    }

    // Exibindo o novo valor
    echo "<h2>O valor do produto com desconto é: R$ " . number_format($novoValor, 2, ',', '.') . "</h2>";
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>