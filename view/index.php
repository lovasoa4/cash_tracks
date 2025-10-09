<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/index.css">
</head>
<body>
   
        <div class="dddddd">
            <a href="insert_transaction.php"> inserer</a>
            <a href="dashbord.php">se connecter</a>
        </div>
    
    <form action="../controller/UsersController.php" method="POST"  class="insertform">
     
      <section>
        <div class="premiere">
            <p> <label for="nom"> Nom</label><br>
               <input type="text" id="nom" name="nom" placeholder="Nom"></p>
            <p> <label for="email"> Email</label>
                <input type="text" id="email" name="email" placeholder="Votre e-mail"><br></p>
            <p> <label for="montant">Mot de passe</label>
                <input type="text" id="mdp" name="mdp" placeholder="Mot de passe"><br></p>
            <p> <label for="description">Mot de passe</label>
               <input type="text" id="mdp" name="mdp" placeholder="Confirmer mot de passe"></p>
          
        </div>
    
             <div class="deuxieme">
            <button>Submit</button>
        </div>

   
    
</body>
</html>