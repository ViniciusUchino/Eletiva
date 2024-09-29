<?php declare(strict_types=1)?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex03</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <form action="" method="post">
        <?php for($i = 0; $i < 5; $i++):    ?>
            <div class="row m-5">
                <div class="col">
                    <label for="nomes[]" class="form-label">Nome: </label>
                    <input type="text" name="nomes[]" id="nomes[]" class="form-group">
                </div>
                <div class="col">
                    <label for="codigos[]" class="form-label">Código: </label>
                    <input type="text" name="codigos[]" id="codigos[]" class="form-group">
                </div>
                <div class="col">
                    <label for="precos[]" class="form-label">Preço: </label>
                    <input type="text" name="precos[]" id="precos[]" class="form-group">
                </div>
            </div>
        <?php endfor;?>
        <div class="row m-5">
            <div class="col">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </div>
    </form>
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            try{
                $nomes = $_POST["nomes"];
                $codigos = $_POST["codigos"];
                $precos = $_POST["precos"];

                for($i = 0; $i < 5; $i++){
                    if($precos[$i]){
                        $precos[$i] -= $precos[$i] * 0.1;
                    }
                }

                $produto = [];
                for($i = 0; $i < 5; $i++){
                    $produto[$codigos[$i]] = [$nomes[$i] => $precos[$i]];
                }

                ksort($produto);
                echo"<p>Lista de produtos</p>";
                foreach($produto as $codigo => $informacoes){
                    echo"<p>Código: $codigo</p>";
                    foreach($informacoes as $nome => $precos){
                        echo"<p>Nome: $nome </p>";
                        echo"<p>Preço: $precos </p>";
                    }
                }
                
            }catch(Exception $e){
                echo"ERRO!".$e->getMessage();
            }
        }    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</body>
</html>