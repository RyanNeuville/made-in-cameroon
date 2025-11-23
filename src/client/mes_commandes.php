<?php $page_title = "Mes Commandes";
require_once '../includes/head.php'; ?>
<?php require_once '../includes/navbar_client.php'; ?>

<main class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">
        <i class="fa fa-cube" aria-hidden="true"></i> Historique de Mes Commandes
    </h1>

    <div class="space-y-6">
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Commande #CM20250012 a été livrée avec succès !</span>
        </div>

        <div class="card bg-white shadow-xl">
            <div class="card-body p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h2 class="text-xl font-bold">Commande #CM20250012</h2>
                        <p class="text-sm text-gray-500">Passée le : 15 Septembre 2025</p>
                    </div>
                    <div class="badge badge-success text-white p-3 font-semibold">LIVRÉE</div>
                </div>
                <div class="border-t pt-4">
                    <p>Articles : Confiture, Pagne brodé (2 articles)</p>
                    <p class="text-lg font-semibold mt-2">Total Payé : 40 000 FCFA</p>
                </div>
                <div class="card-actions justify-end mt-4">
                    <a href="detail_commande.php?id=12" class="btn btn-outline btn-sm">Détails et Avis</a>
                </div>
            </div>
        </div>

        <div class="card bg-white shadow-xl">
            <div class="card-body p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h2 class="text-xl font-bold">Commande #CM20250020</h2>
                        <p class="text-sm text-gray-500">Passée le : 22 Novembre 2025</p>
                    </div>
                    <div class="badge badge-warning text-white p-3 font-semibold">EN COURS</div>
                </div>
                <div class="border-t pt-4">
                    <p>Articles : Parfum Essentiel (1 article)</p>
                    <p class="text-lg font-semibold mt-2">Total Payé : 40 000 FCFA</p>
                </div>
                <div class="card-actions justify-end mt-4">
                    <a href="detail_commande.php?id=20" class="btn btn-outline btn-sm">Suivi</a>
                </div>
            </div>
        </div>

        <div role="alert" class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Échec de paiement pour la commande #CM20250010. Veuillez réessayer.</span>
        </div>

    </div>
</main>
<?php require_once '../views/footer.php'; ?>