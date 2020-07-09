<?php include('conexiondb.php')?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM datos WHERE id = '$id' ";
    $results = mysqli_query($conn,$query);

    if(!$results){
        die('Error al eliminar el usuario');
    }else{
        $_SESSION['message']=' Usuario eliminado correctamente';
        $_SESSION['message-type'] = 'danger';
        header('Location:index.php');
    }


}

?>