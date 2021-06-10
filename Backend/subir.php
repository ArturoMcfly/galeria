<?php
    include('conexion.php');
    $botonGuardar = $_POST['Guardar'];
    if(isset($botonGuardar)){
        $imagen = $_FILES['imagen']['name'];
        $nombre = $_POST['titulo'];

        if(isset($imagen)&& $imagen!=""){
            $tipo = $_FILES['imagen']['type'];
            $temp = $_FILES['imagen']['tmp_name'];
            echo ("Parametros de la imagen: ".$imagen." nombre: ".$nombre." tipo: ".$tipo." temp: ".$temp);
            if(!((strpos($tipo,'gif')|| strpos($tipo,'jpeg')||strpos($tipo,'webp')||strpos($tipo,'png')))){
                $_SESSION['mensaje']='solo se permiten archivos jpeg,gif,webp';
                $_SESSION['tipo']='danger';
                header('location:../index.php');
            }else{
                $query="INSERT INTO imagenes  ( imagen, nombre) values ('$imagen','$nombre')";
                $resultado=mysqli_query($mysqli,$query);

                if($resultado){
                    move_uploaded_file($temp,'imagenes/'.$imagen);
                    $_SESSION['mensaje']="se ha subido correctamente";
                    $_SESSION['tipo']='success';
                    header('location:../index.php');

                }else{
                    $_SESSION['mensaje']='ha ocurrido un error';
                    $_SESSION['tipo']='danger';
                }
            }
        }
    }
?>