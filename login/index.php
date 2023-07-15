<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SisVentas PHP</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/template/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../public/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/template/dist/css/adminlte.min.css">

    <!--SweetAlert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body class="hold-transition login-page">
    
    <div class="login-box">

    <?php
        session_start();

        if (isset($_SESSION['mensaje']))
        {
            $respuesta = $_SESSION['mensaje'];
    ?>
            <script>
                Swal.fire({
                position: 'top-center',
                icon: 'error',
                title: 'Datos incorrectos, vuelva a intentarlo.',
                showConfirmButton: false,
                timer: 2000
                })
            </script>
    <?php

        }
    ?>
        <center>
            <img src="https://img.freepik.com/free-vector/pitch-meeting-concept-illustration_114360-6000.jpg?w=900&t=st=1687994676~exp=1687995276~hmac=33d90029618db27502a846601f4824bd9a0b13ed8ea5bc077e9866d50c11336b" alt="" width="300px">
        </center>
        <hr>
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Sistema de </b>Ventas</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Iniciar sesión</p>

                <form action="../app/controllers/login/ingreso.php" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="contrasena" class="form-control" placeholder="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../public/template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../public/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../public/template/dist/js/adminlte.min.js"></script>
</body>

</html>