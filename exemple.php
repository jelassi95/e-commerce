<?php
Session_start();
if(isset($_SESSION['NOM'])) {

}
include "../inc/functions.php";
$user = true;

if (!empty($_POST)) {
    $user = ConnectAdmin($_POST);
        if (is_array($user) && count($user) > 0 ) {
        Session_start();
        $_SESSION['email'] = $user['email'];
        $_SESSION['mp'] = $user['mp'];
        $_SESSION['nom'] = $user['nom'];
        header('location:profil.php');
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Page de Connexion</title>
    
    <!-- Inclure les fichiers CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        body {
            background: #007bff;
            background: linear-gradient(to right, #0062E6, #33AEFF);
        }

        .login-container {
            margin-top: 5%;
            margin-bottom: 5%;
        }

        .login-form {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .login-form img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto;
            display: block;
            margin-bottom: 20px;
        }

        .login-form label {
            font-weight: bold;
        }

        .login-form input {
            margin-bottom: 20px;
        }

        .login-form button {
            background: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center login-container">
        <div class="col-md-4">
            <div class="login-form">
                <img src="images/logo.png" alt="Logo" class="mx-auto d-block">
                <h4 class="text-center mb-4">Connexion</h4>
                <form action="connexion.php" method="POST">
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur :</label>
                        <input type="text" name="email" class="form-control" id="username" placeholder="Entrez votre nom d'utilisateur">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" name="mp" class="form-control" id="password" placeholder="Entrez votre mot de passe">
                    </div>
                    <button type="submit" class="btn btn-block">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Inclure les fichiers JS de Bootstrap et jQuery (assurez-vous d'inclure jQuery avant Bootstrap.js) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php 
      if (!$user){
        print "
        <script>
        Swal.fire({
         title: 'Erreur',
         text: 'Cordonnées non valide',
         icon: 'error',
         confirmButtonText: 'ok',
         timer:2000
         }) 
         </script>
        ";
      }
  
     ?>
</body>
</html>
