<?php
session_start();

$db=mysqli_connect("localhost","root","","livreor");

//on vérifie que le formulaire a été envoyé
if(isset($_POST['submit']))
{
    
    if(isset($_POST['message']) AND !empty($_POST['message']))
    {
        $id_utilisateurs=$_SESSION['id'];
        $message=$_POST['message'];//on recupère le commentaire du formulaire
        //on insère le message dans la base livreor, table commentaires
        $insert="INSERT INTO commentaires (commentaire,id_utilisateur,date)
        VALUES('$message','$id_utilisateur',CURRENT_DATE())";
        $result=mysqli_query($db,$insert);
        echo 'votre commentaire a été ajouté avec succès';
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
                      
<main>
    <div class="jumbotron-bis">
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
    </div>         
</main>                   
                    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>                  
            
        
      
    
    