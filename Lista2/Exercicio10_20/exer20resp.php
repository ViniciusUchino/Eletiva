<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resposta exercicio 20</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Resposta do exercício 20</h1>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            try {
                $distancia = (int) $_POST['distancia'] ?? 0;
                $tempo = (int) $_POST['tempo'] ?? 0;
                // +   -   *   /   %   ++   --  **

                if ($distancia > $tempo)
                {
                    $media = ($distancia / $tempo);
                }
                echo "<p>A velocidade média é: $media</p>";
                
            } catch (Exception $e) {
                echo "Erro! " . $e->getMessage();
            }
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>