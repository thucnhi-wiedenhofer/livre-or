<?php
session_start();
//déconnexion
if(isset($_POST['session_fin']))
{
    //enlève les variables de la session
    session_unset();
    //détruit la session
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/flatbootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Profil</title>
</head>
<body>
    <div class="container">
        <header class="page-header" >
            <div id="banner"></div>       
                    
        </header>
    
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="livre-or.php">Livre d'or</a>
                    </li>
                                
                    <?php 
                    if(isset($_SESSION['login'])) //message de connexion dans la navbar et bouton de déconnexion
                    {
                        echo '<li class="nav-item active align-right">
                        <span class="nav-link">Vous êtes connecté(e)</span>    
                        </li>';
                        echo '<li class="nav-item align-right">
                        <form action="connexion.php" method="post">                                            
                            <button type="submit" class="btn btn-info" name="session_fin">Déconnexion</button><br/>                        
                        </form>
                        </li>';
                    }
                    else
                    {
                        echo '<li class="nav-item active">                        
                            <a class="nav-link" href="inscription.php">S\'inscrire</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="connexion.php">Se connecter</a>
                        </li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <main>
            <div class="jumbotron">
                <h1>Modifier mon profil</h1>
                <p class="lead">Veuillez vous inscrire pour ajouter un commentaire.</p>
                <hr class="my-4">

                <form action="profil.php"method="post">
                    <fieldset>
                       
                        <div class="form-group">
                        <label for="login">Identifiant</label>
                        <input type="txt" class="form-control" id="login" name="login" 
                        placeholder="login" required>
                        </div>   

                        <div class="form-group">
                        <label for="password"> Nouveau mot de passse</label>
                        <input type="password" class="form-control" id="password" 
                        name="password" placeholder="Password" required>
                        </div>                       
                        
                        <div class="form-group">
                        <label for="password">Confirmer votre nouveau mot de passe</label>
                        <input type="password" class="form-control" id="conf-password" 
                        name="conf-password" placeholder="Password" required>
                        </div>                                            
                                                    
                        <button type="submit" class="btn btn-primary" name="submit">Valider</button>
                    </fieldset>
                </form>
            </div>
        </main>
        <footer id="footer">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled">
                    <li class="float-lg-right"><a href="#top">Back to top</a></li>
                    
                    <li><a href="https://github.com/thucnhi-wiedenhofer">GitHub</a></li>
                    
                    </ul>
                    <p>Bootstrap style made by <a href="https://thomaspark.co/">Thomas Park</a>.</p>
                    <p>Code released under the <a href="https://github.com/thomaspark/bootswatch/blob/master/LICENSE">MIT License</a>.</p>
                    
                </div>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>