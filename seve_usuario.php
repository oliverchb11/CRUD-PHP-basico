<?php
   include('conexiondb.php');
   if(isset($_POST['save_user'])){
   
    $nombre = $_POST['nombre'];
    $apellido =  $_POST['apellido'];
    $email =  $_POST['email'];
    $password =  $_POST['password'];
    $celular =  $_POST['celular'];

    $query = "INSERT INTO datos (nombre,apellido,email,password,celular) VALUES ('$nombre','$apellido','$email','$password','$celular')";

    $results = mysqli_query($conn,$query);
    if(!$results){
       die ('error en la consulta');
    }
    else{
       $_SESSION['message']=' Usuario creado';
       $_SESSION['message-type'] = 'success';
      header('Location:index.php');
    }
   } 




?>