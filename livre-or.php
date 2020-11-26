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

//Création de la connexion à a base de données
$db=mysqli_connect("localhost","root","","livreor");

// préparation de la requête dans la base
$requete= "SELECT `commentaire`,`date`,`login` FROM `commentaires` JOIN `utilisateurs`
 ON utilisateurs.id=commentaires.id_utilisateur ORDER BY commentaires.date DESC";

//execution de la requête
$query=mysqli_query($db,$requete);

mysqli_close($db);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/flatbootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Livre d'or</title>
</head>
<body>
    <div class="jumbotron-bis">
        <div class="container">
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarColor01">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item ">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="livre-or.php">Livre d'or</a>
                                <span class="sr-only">(current)</span>
                            </li>
                                        
                            <?php 
                            if(isset($_SESSION['login'])) //si connecté, bouton de déconnexion apparait
                            {
                                echo '<li class="nav-item align-right">
                                <form action="connexion.php" method="post">                                            
                                    <button type="submit" class="btn btn-info" name="session_fin">Déconnexion</button><br/>                        
                                </form>
                                </li>';
                            }
                            else
                            {
                                echo '<li class="nav-item">                        
                                    <a class="nav-link" href="inscription.php">S\'inscrire</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="connexion.php">Se connecter</a>
                                </li>';
                            }
                            ?>
                        </ul>
                    </div>
                </nav>     
            </header>
            </div>
        
        <main>
            <div class="container">
                <h1 class="display-3">Livre d'or</h1><br/>
                <p class="lead">Nos clients ont laissé des commentaires que vous pouvez consulter.</p><br/>
                <?php
                
                 while ($resultat= mysqli_fetch_assoc($query))
                 {
                    $date=date('d/m/Y', strtotime($resultat["date"]));//fonction pour mettre au format datetime(Y/m/d)
                ?>
                    
                
                <div class="card bg-light border-success mb-3" style="max-width: 40rem;">
                    <div class="card-body"><?php echo $resultat["commentaire"]; ?></div>                     
                     
                    <div class="card-footer">
                        <p class="card-text">Posté le <?php echo $resultat["date"]; ?> par <?php echo $resultat["login"]; ?>.</p>
                    </div>
                 </div>      
                 <?php
                  }
                    if(isset($_SESSION['login'])) 
                    {
                        //message de connexion apparait et ajout de commentaire possible
                        echo '<p class=" lead text-info">Vous êtes connecté(e).</p><br/>               
                                              
                        <p class="lead"><a class="btn btn-primary btn-lg" href="commentaire.php"
                         role="button">Ajouter un commentaire</a></p>'; 
                    }
                    else
                    {
                        echo '<p class="lead">Veuillez vous <a href="inscription.php">inscrire</a>, 
                        ou vous <a href="connexion.php">connecter</a>, pour ajouter un 
                        commentaire.</p>';
                    }
                        
                ?>
                
            </div>
        </main>
        
    </div>
    <div class="container ">
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