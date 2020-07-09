<?php include('conexiondb.php')?>

    <?php include('includes/navbar.php') ?>
    <div class="container mt-3">
        <h1 class="text-center">Datos Cliente</h1>
        <div class="row mt-5">
            <div class="col-sm-12">
                <?php if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-<?= $_SESSION['message-type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <?php session_unset(); }?>
                <form action="seve_usuario.php" method="POST">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" autofocus class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Apelldio</label>
                    <input type="text" name="apellido" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Correo</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Celular</label>
                    <input type="number" name="celular" class="form-control">
                </div>
                <input type="submit" name="save_user" class="btn btn-outline-primary form-control" value="Enviar" />
                </form>
            </div>
            <div class="col-sm-12 mt-4">
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Celular</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $query = "SELECT * FROM datos";
                        $results_users = mysqli_query($conn,$query);
                        while($row = mysqli_fetch_array($results_users)){?>
                         <tr>
                             <td><?php echo $row['nombre'] ?></td>
                             <td><?php echo $row['apellido'] ?></td>
                             <td><?php echo $row['email'] ?></td>
                             <td><?php echo $row['celular'] ?></td>
                             <td>
                                 <a class="btn btn-warning ml-5" href="update_usuario.php?id=<?php echo $row['id']?>">
                                 <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                                   <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                                </svg>
                                 </a>
                                 <a class="btn btn-danger ml-5" href="delete_usuario.php?id=<?php echo $row['id']?>">
                                 <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                    </svg>
                                 </a>
                             </td>
                        </tr>   

                         <?php  }?>
                    </tbody>
                </table>
            </div>
    </div>
    </div>
<?php include('includes/footer.php')?>