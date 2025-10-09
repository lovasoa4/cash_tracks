<?php
include_once('../model/Transaction.php');

// Récupération de toutes les transactions
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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Transactions</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">📋 Liste des Transactions</h2>
        <a href="./AjouterTransaction.php" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Ajouter une transaction
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Montant (en  Ar)</th>
                            <th>Description</th>
                            <th>ID Utilisateur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php if (!empty($tableau)) : ?>
                            <?php foreach ($tableau as $transaction): ?>
                                <tr>
                                    <td><?= htmlspecialchars($transaction->getId()) ?></td>
                                    <td><?= htmlspecialchars($transaction->getType()) ?></td>
                                    <td><?= date('d/m/Y', strtotime($transaction->getDateTransaction())) ?></td>
                                    <td class="fw-semibold text-success">
                                        <?= number_format($transaction->getMontant(), 0, ',', ' ') ?>
                                    </td>
                                    <td><?= htmlspecialchars($transaction->getDescription()) ?></td>
                                    <td><?= htmlspecialchars($transaction->getIdUser()) ?></td>
                                    <td>
                                        <form action="../controller/TransactionController.php" method="post" class="d-inline">
                                            <input type="hidden" name="id_delete" value="<?= $transaction->getId() ?>">
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Supprimer cette transaction ?')">
                                                🗑️ Supprimer
                                            </button>
                                        </form>
                                        <a href="ModifierTransaction.php?id=<?= $transaction->getId() ?>" 
                                           class="btn btn-sm btn-warning text-white">
                                            ✏️ Modifier
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-muted py-4">Aucune transaction trouvée.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!--  Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!--  Icônes Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</body>
</html>