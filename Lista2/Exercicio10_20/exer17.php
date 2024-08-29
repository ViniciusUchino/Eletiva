<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 17</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    <h1>Exercicio 17</h1>
    <form action="exer17resp.php" method="POST">
        <div class="row">
            <div class="col">
                <label for="capital" class="form-label">Informe o capital: </label>
                <input type="number" class="form-control" name="capital" id="capital">
            </div>
            <div class="col">
                <label for="taxa" class="form-label">Informe a taxa: </label>
                <input type="number" class="form-control" name="taxa" id="taxa">
            </div>
            <div class="col">
                <label for="periodo" class="form-label">Informe o período: </label>
                <input type="number" class="form-control" name="periodo" id="periodo">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>


</html>