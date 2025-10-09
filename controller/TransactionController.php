<?php
include_once('../model/Transaction.php');
include_once('view/assets/TransactionController.css');

class TransactionController {

    //  Ajouter une transaction
    public function AjouterTransaction() {
        if (
            !empty($_POST["description"]) &&
            !empty($_POST["type"]) &&
            !empty($_POST["montant"]) &&
            !empty($_POST["date_transaction"]) &&
            !empty($_POST["id_user"])
        ) {
            $description = $_POST["description"];
            $type = $_POST["type"];
            $montant = $_POST["montant"];
            $date_transaction = $_POST["date_transaction"];
            $id_user = $_POST["id_user"];

            $success = Transaction::create_transaction($type, $date_transaction, $montant, $description, $id_user);
            if ($success) {
                echo " <script>alert('Transaction ajoutée avec succès !');</script>";
            } else {
                echo " <script>alert('Erreur lors de l'ajout de la transaction.');</script>";
            }

            // Redirection après ajout
            header("location:../view/ListeTransaction.php") ;
            exit;
        }
    }

    // Supprimer une transaction
    public function effacerTransaction() {
        if (!empty($_POST["id_delete"])) {
            $id = $_POST["id_delete"];
            $success = Transaction::delete_transaction($id);

            if ($success) {
                echo "<script>alert('Transaction supprimée avec succès !');</script>";
            } else {
                echo "<script>alert('Erreur lors de la suppression de la transaction.');</script>";
            }

            // Redirection pour recharger la page proprement
            echo "<script>window.location.href='../view/ListeTransaction.php';</script>";
            exit;
        }
    }

    //  Afficher toutes les transactions
    public function AfficherTransaction() {
        $transactionsData = Transaction::select_transaction();
        $tableau = [];
        foreach ($transactionsData as $trans) {
            $tableau[] = new Transaction(
                $trans['id'],
                $trans['type'],
                $trans['date_transaction'],
                $trans['montant'],
                $trans['description'],
                $trans['id_user']
            );
        }
        include('../view/ListeTransaction.php');
    }
}

// ROUTAGE SELON LE POST
$controller = new TransactionController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["id_delete"])) {
        $controller->effacerTransaction(); // suppression
    } else {
        $controller->AjouterTransaction(); // ajout
    }
} else {
    $controller->AfficherTransaction(); // affichage normal
}
?>