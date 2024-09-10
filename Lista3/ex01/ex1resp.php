<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resposta exercicio 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Resposta do exercício 1</h1>
    <?php
    $valores = [
        $_POST['valor1'],
        $_POST['valor2'],
        $_POST['valor3'],
        $_POST['valor4'],
        $_POST['valor5'],
        $_POST['valor6'],
        $_POST['valor7']
    ];

    $valores = array_map('intval', $valores);

    $menorValor = $valores[0];
    $posicao = 0;

    for ($i = 1; $i < count($valores); $i++) {
        if ($valores[$i] < $menorValor) {
            $menorValor = $valores[$i];
            $posicao = $i;
        }
    }

    echo "<h2>O menor valor é: $menorValor</h2>";
    echo "<h2>A posição do menor valor na sequência é: " . ($posicao + 1) . "</h2>";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>