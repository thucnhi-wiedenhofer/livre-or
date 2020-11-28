<?php
session_start();

$db=mysqli_connect("localhost","root","","livreor");

//on vérifie que le formulaire a été envoyé
if(isset($_POST['submit']))
{
    
    if(isset($_POST['message']) AND !empty($_POST['message']))
    {
        $id_utilisateur=$_SESSION['id'];//puisqu'on est déjà connecté
        $message=$_POST['message'];//on recupère le commentaire du formulaire

        //on insère le message dans la base livreor, table commentaires
        $insert="INSERT INTO commentaires (commentaire,id_utilisateur,date)
        VALUES('$message','$id_utilisateur',NOW())";
        $result=mysqli_query($db,$insert);
        
        header("Location: livre-or.php");
    }
    else{
        echo 'Veuillez entrer un commentaire';
    }
}

mysqli_close($db);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/flatbootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>commentaire</title>
</head>
<body>
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
                     

<div class="jumbotron-bis">
    <main>
        <div class="container"> 
            <h1 class="display-3">Livre d'or</h1><br/><br/>         
            <form action="commentaire.php" method="post">    
                <div class="card bg-light border-success mb-3" style="max-width: 70rem;">
                    <div class="card-header"><label for="message">
                        <h3>Aidez-nous à améliorer votre séjour.</h3></label>
                    </div>
                    <div class="card-body">
                        <textarea class="form-control" name="message" id="message" maxlength="1000" rows="3" 
                        required  placeholder="Ecrire votre commentaire ici"></textarea> 
                    </div>                   
                            
                    <div class="card-footer">
                        <p class="card-text"><input  class="btn btn-success btn-lg" 
                        type="submit" name="submit" id=submit value="Envoyer">
                    </div>
                </div>
            </form> 
        </div>     
    </main>      
               
    <footer id="footer">
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <li class="float-lg-right"><a href="#top">Back to top</a></li><br/>
                    
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
            
        
      
    
    