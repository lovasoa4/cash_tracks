<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="#">
    <title>Creation du compte</title>
</head>

<body>
    <h1>Remplissez le formulaire</h1>
    <form action="../controller/UsersController.php" method="POST">
        <label for="nom">Nom</label>
        <input type="text" name="nom">
        <label for="email">E-mail</label>
        <input type="text" name="email">
        <label for="mdp">Mot de passe</label>
        <input type="text" name="mdp">

        <button type="submit">Envoyer</button>
    </form>
</body>

</html>