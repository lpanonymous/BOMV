
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Noticias</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body
        {
            font-family: "Times New Roman", Times, serif;
        }
        .cuerpo
        {
            align:center;
            margin-top: 50px;
            margin-bottom: 100px;
            margin-right: 10%;
            margin-left: 10%;
        }
    </style>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light navbar-fixed-top" style="background-image: linear-gradient(to right, green, white, red);">
    <a class="navbar-brand" href="inicio_usuarios.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    </nav>
    <div class="text-center">
    <h1>BOMV</h1>
    <h2><?php echo $_POST["titulo"];?></h2>
        <br>
        <img src="<?php echo $_POST["foto"];?>" class="rounded" alt="..." style="width:80%; height:80%;">
    </div>
    <div class="cuerpo">
        <h3><?php echo $_POST["fecha"];?></h3>
        <p style="font-size:24px"><?php echo $_POST["cuerpo"];?></p>
    </div>
</body>
</html>