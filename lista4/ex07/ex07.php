<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ex07</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form action="ex07resp.php" method="post">
        <div class="row m-5">
            <div class="col">
                <label for="data1" class="form-label">Digite a primeira data (dd/mm/yyyy):</label>
                <input type="text" class="form-control" id="data1" name="data1" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{4}" required>
            </div>
            <div class="col">
                <label for="data2" class="form-label">Digite a segunda data (dd/mm/yyyy):</label>
                <input type="text" class="form-control" id="data2" name="data2" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{4}" required>
            </div>
        </div>
        <div class="row m-5">
            <div class="col">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>