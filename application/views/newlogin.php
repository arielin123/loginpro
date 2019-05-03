<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="<?=base_url();?>bootstrap-4.3.1/site/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?=base_url();?>bootstrap-4.3.1/site/docs/4.3/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" method="POST" action="<?=site_url();?>/logincontrol/conectar">
  <center>
  <img class="mb-4" src="<?=base_url();?>assets/logologin.png" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesion</h1>
  <label for="username" class="sr-only">Usuario</label> 
  <input type="text" id="username" name="username" class="form-control" placeholder="username" required autofocus value= "19182019-3">  
  <label for="password" class="sr-only">Contraseña</label>
  <input type="Password" id="password" name="password" class="form-control" placeholder="password">
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Recordar Usuario
    </label>
    <br>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">conectar</button>
  </center>
</form>
</body>
</html>