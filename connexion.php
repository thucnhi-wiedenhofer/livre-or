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
    
/*routine de validation des données*/
    
//connexion en tant que membre:
if (isset($_POST['submit'])) {
    function valid_data($data){
        $data = trim($data);/*enlève les espaces en début et fin de chaîne*/
        $data = stripslashes($data);/*enlève les slashs dans les textes*/
        $data = htmlspecialchars($data);/*enlève les balises html comme ""<>...*/
        return $data;
    }
        /*on récupère les valeurs login ,password du formulaire et on y applique
         les filtres de la fonction valid_data*/
        $login = valid_data($_POST["login"]);
        $password = $_POST["password"];
            
    
          $db=mysqli_connect("localhost","root","","livreor");
        /*on prépare une requête pour vérifier les données de l'utilisateur */
        $read_utilisateur= "SELECT * FROM utilisateurs WHERE login='$login'";
        $requete = mysqli_query($db, $read_utilisateur);
        $result = mysqli_fetch_all($requete);
        
            if (empty($result))//champs vide
            {
                $error="Ce login n'existe pas!";
            }
            elseif (password_verify($password, $result[0][2]))//vérification de password
            { 
                $_SESSION['login']=$result[0][1];                                      
            } 
            else //si password différent
            {
                $error='Le mot de passe est invalide.';
                mysqli_close($db);
            }
}
       
?>
    

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Connexion</title>
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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="livre-or.php">Livre d'or</a>
                    </li>
                                
                    <?php 
                    if(isset($_SESSION['login'])) //message de connexion dans la navbar et bouton de déconnexion
                    {
                        echo '<li class="nav-item align-right">
                        <form action="connexion.php" method="post">                                            
                            <button type="submit" class="btn btn-info" name="session_fin">Déconnexion</button><br/>                        
                        </form>
                        </li>';
                    }
                    else //si on est pas connecté:
                    {
                        echo '<li class="nav-item">                        
                            <a class="nav-link" href="inscription.php">S\'inscrire</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="connexion.php">Se connecter</a>
                            <span class="sr-only">(current)</span>
                        </li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <main>
            <div class="jumbotron">
                <h1>Connexion</h1>
                <p class="lead">Veuillez vous connecter pour ajouter un commentaire.</p>
                <hr class="my-4">
                <?php
                    if(isset($_SESSION['login']) && !isset($_SESSION['update'])){
                    //connexion valide de l'utilisateur avec mot de passe avant modification 
                    echo '<p class="h5"> Bonjour, vous êtes connecté(e).<br/><br/>
                    Pour vérifier ou modifier vos informations:</p>';
                    echo '<form action="profil.php" method="post"><button type="submit" 
                    class="btn btn-primary" name="modifier">Modifier votre profil</button></form><br/>';
                    echo '<p class="h5">Vous pouvez consulter et laisser un commentaire dans le
                     <a href="livre-or.php">livre d\'or</a>.</p>';
                    }
                    elseif(isset($_SESSION['login']) && $_SESSION['update']="Ok"){
                        //connexion valide de l'utilisateur après modification valide
                        echo '<h2>Espace membres</h2>';
                        echo '<p class="h5">Vos informations ont bien été modifiées.</p>';
                    }
                    else{ //premier accès à la page ou  erreur de l'utilisateur qui doit se reconnecter
                        echo '<form action="connexion.php" method="post">
                            <fieldset>';

                           if(!empty($error)){echo '<p class="h4 text-warning">'.$error.'</p>'; }  
                        
                        echo '<div class="form-group">
                        <label for="login">Identifiant</label>
                        <input type="txt" class="form-control" id="login" name="login" 
                        placeholder="login" required>
                        </div>   

                        <div class="form-group">
                        <label for="password">Mot de passse</label>
                        <input type="password" class="form-control" id="password" name="password" 
                        placeholder="Password" required>
                        </div>  
                 
                        <button type="submit" class="btn btn-primary" name="submit">Valider</button>
                        </fieldset>
                    </form>';
                    }
                ?>
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