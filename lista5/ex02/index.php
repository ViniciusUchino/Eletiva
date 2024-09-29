<?php declare(strict_types=1)?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ex02</title>
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
                    <label for="notas1[]" class="form-label">nota 1: </label>
                    <input type="text" name="notas1[]" id="notas1[]" class="form-group">
                </div>
                <div class="col">
                    <label for="notas1[]" class="form-label">nota 2: </label>
                    <input type="text" name="notas2[]" id="notas2[]" class="form-group">
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
                $notas1 = $_POST["notas1"];
                $notas2 = $_POST["notas2"];

                for($i = 0; $i < 5; $i++){
                    $media[$i] = ($notas1[$i] + $notas2[$i]) / 2;
                }

                $alunos = array_combine($nomes, $media);
                ksort($alunos);
                echo"<p>Lista de alunos</p>";
                foreach($alunos as $key => $value){
                    echo"<p>Nome: $key - Média: $value</p>";
                    
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