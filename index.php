<?php
    include ('Backend/conexion.php');
    $query="SELECT * FROM imagenes";
    $resultado=mysqli_query($mysqli,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h1 class="text-primary">Subir imagen</h1>
                <!--el mutipart/form-data es para que acepte subir imagenes-->
                <form action="Backend/subir.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="my-input">Seleccione una Imagen</label>
                        <input id="my-input"  type="file" name="imagen">
                    </div>
                    <div class="form-group">
                        <h1>Hola a todos</h1>
                        <label for="my-input">Titulo de la imagen</label>
                        <input class="form-control" type="text" name="titulo" id="my-input">
                    </div>
                    <?php
                        if(isset($_SESSION['mensaje'])){
                    ?>
                    <div class="alert alert-<?php echo($_SESSION['tipo'])?> alert-dismissible fade show" role="alert">
                        <strong>
                            <?php
                                echo $_SESSION['mensaje'];
                            ?>
                            
                        </strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                        session_unset();
                        }
                    ?>
                   <input type="submit" value="Guardar" name="Guardar" >
                </form>
            </div>
            <div class="col-lg-8">
                <h1 class="text-primary text-center">Galeria de imagenes</h1>
                <hr>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                    foreach($resultado as $row){
                ?>
                    <div class="col">
                        <div class="card">
                        <img src="Backend/imagenes/<?php echo $row['imagen']?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nombre']?></h5>
                            
                        </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>
