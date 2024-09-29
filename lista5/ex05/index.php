<?php declare(strict_types=1)?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex05</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <form action="" method="post">
        <?php for($i = 0; $i < 5; $i++):    ?>
            <div class="row m-5">
                <div class="col">
                    <label for="titulos[]" class="form-label">Título: </label>
                    <input type="text" name="titulos[]" id="titulos[]" class="form-group">
                </div>
                <div class="col">
                    <label for="quantidade[]" class="form-label">Quantidade em estoque: </label>
                    <input type="text" name="quantidade[]" id="quantidade[]" class="form-group">
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
                $titulos = $_POST["titulos"];
                $quantidade = $_POST["quantidade"];

                $livros = array_combine($titulos, $quantidade);

                ksort($livros);
                echo"<p>Lista de livros</p>";
                foreach($livros as $key => $value){
                    echo"<p>Título: $key</p>";
                    echo"<p>Quantidade em estoque: $value";
                    if($value < 5){
                        echo"<p>Livro $key com quantidade inferior a 5</p>";
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