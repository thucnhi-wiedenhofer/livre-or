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
    <title>commentaire</title>
</head>
<body>
                      
            <main>             
                                     
                    
                      
            <form action="livre-or.php" method="post">    
                <div class="card bg-light border-success mb-3" style="max-width: 65rem;">
                    <div class="card-header"><label for="message">
                        <h3>Aidez-nous à améliorer votre séjour.</h3></label>
                    </div>
                    <div class="card-body"><textarea class="form-control" name="message" 
                    id="message" maxlength="1000" rows="3"required  placeholder="Ecrire votre commentaire ici"></textarea> 
                                         
                    </div>                     
                     
                    <div class="card-footer">
                        <p class="card-text"><input  class="btn btn-success btn-lg" type="submit" name="submit" id=submit value="Envoyer">
                    </div>
                </div>
            </form>  
            </main>
        
      
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>