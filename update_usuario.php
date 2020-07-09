<?php include('conexiondb.php')?>
<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM datos WHERE id = '$id'";
        $results = mysqli_query($conn,$query);
        if(mysqli_num_rows($results)==1){
           $row = mysqli_fetch_array($results);
           $nombre = $row['nombre'];
           $apellido = $row['apellido'];
           $email = $row['email'];
           $celular = $row['celular'];
        }   
    }
        if(isset($_POST['edit_user'])){
            $ids = $_GET['id'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email =  $_POST['email'];
            $celular =  $_POST['celular'];
            
            $querys = "UPDATE datos SET nombre='$nombre', apellido = '$apellido', email = '$email' , celular = '$celular' WHERE id = '$id'";
            $resultsupdate = mysqli_query($conn,$querys);
            if($resultsupdate){
                $_SESSION['message'] = 'Usuario actualizado';
                $_SESSION['message-type'] = 'success';
                header('Location:index.php');
            }
            else{
                echo 'error al actializar un usuario';
            }
           
        };
?>

<?php include('includes/navbar.php')?>
<div class="container mt-3">
        <h1 class="text-center">Actualizar Cliente</h1>
        <div class="row mt-5">
            <div class="col-sm-12">
                <form action="update_usuario.php?id=<?php echo $id?>" method="POST">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" autofocus class="form-control" value="<?php echo $nombre?>">
                </div>
                <div class="form-group">
                    <label for="">Apelldio</label>
                    <input type="text" name="apellido" class="form-control"  value="<?php echo $apellido?>">
                </div>
                <div class="form-group">
                    <label for="">Correo</label>
                    <input type="email" name="email" class="form-control"  value="<?php echo $email?>">
                </div>
                <div class="form-group">
                    <label for="">Celular</label>
                    <input type="number" name="celular" class="form-control"  value="<?php echo $celular?>">
                </div>
                <input type="submit" name="edit_user" class="btn btn-outline-warning form-control" value="Editar" />
                </form>
            </div>
<?php include('includes/footer.php')?>