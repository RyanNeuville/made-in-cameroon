<?php
$page_title = "Catalogue des Produits Locaux";
require_once '../includes/head.php';
require_once '../includes/navbar_client.php';
?>

<main class="container mx-auto px-4 py-10">
    <h1 class="text-4xl font-extrabold mb-8 text-gray-900 border-b pb-2">
        Découvrez l'Authenticité Camerounaise
    </h1>

    <div class="lg:flex lg:space-x-8">

        <aside class="lg:w-1/4 mb-8 lg:mb-0 bg-white p-6 rounded-xl shadow-lg border border-gray-100">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800 flex items-center">
                <i class="fa fa-filter" aria-hidden="true"></i> Filtres Avancés
            </h2>

            <form action="catalogue.php" method="GET" class="space-y-6">

                <div class="form-control">
                    <label class="label"><span class="label-text font-medium">Catégories</span></label>
                    <select name="category" class="select select-bordered w-full">
                        <option value="">Toutes les catégories</option>
                        <option value="1">Agroalimentaire (120)</option>
                        <option value="2">Artisanat (85)</option>
                        <option value="3">Textile (50)</option>
                    </select>
                </div>

                <div class="form-control">
                    <label class="label"><span class="label-text font-medium">Région de Production</span></label>
                    <select name="region" class="select select-bordered w-full">
                        <option value="">Toutes les régions</option>
                        <option value="LITTORAL">LITTORAL - Douala</option>
                        <option value="CENTRE">CENTRE - Yaoundé</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-full mt-4 text-white">Appliquer les Filtres</button>
                <a href="catalogue.php" class="btn btn-error w-full">Réinitialiser</a>

            </form>
        </aside>

        <section class="lg:w-3/4">

            <div class="flex flex-col md:flex-row justify-between items-center mb-6 p-4 bg-white rounded-xl shadow-md">
                <input type="text" placeholder="Rechercher un produit ou un vendeur..."
                    class="input input-bordered w-full md:w-1/2 mb-4 md:mb-0" />

                <div class="flex items-center space-x-2">
                    <span class="text-sm font-medium text-gray-600">Trier par :</span>
                    <select class="select select-bordered select-sm">
                        <option selected>Nouveauté</option>
                        <option>Meilleures Notes</option>
                        <option>Prix croissant</option>
                        <option>Prix décroissant</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <?php
                // Simulation d'un statut particulier (SUCCESS pour le prix)
                $product_status = 'success'; // success, warning
                ?>

                <div
                    class="card bg-white shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <figure class="h-48 overflow-hidden">
                        <img src="https://imperialbaking.be/assets/files/general/_580x454_crop_center-center_none_ns/39280/Web-Ananasconiftuur.jpg"
                            alt="Confiture" class="w-full h-full object-cover" />
                    </figure>
                    <div class="card-body p-5">
                        <div class="flex justify-between items-center mb-2">
                            <div class="badge badge-lg bg-green-500 text-white font-bold text-sm">Agroalimentaire</div>
                        </div>

                        <h2 class="card-title text-xl mb-1 text-gray-800">
                            Confiture d'Ananas Camerounais
                        </h2>
                        <p class="text-gray-500 text-sm mb-3">Par Les Délices de Mungo</p>

                        <div class="text-2xl font-extrabold flex items-center text-<?php echo $product_status; ?>">
                            10 000 FCFA
                            <?php if ($product_status === 'success'): ?>
                                <span class="badge badge-success badge-outline ml-2 text-xs">Meilleur Prix</span>
                            <?php endif; ?>
                        </div>

                        <div class="card-actions justify-end mt-4">
                            <a href="produit_detail.php?id=1" class="btn btn-sm btn-outline btn-info">Voir Détails</a>
                            <button class="btn btn-sm btn-success text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Ajouter
                            </button>
                        </div>
                    </div>
                </div>
                <?php $product_status = 'warning'; ?>
                <div
                    class="card bg-white shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <figure class="h-48 overflow-hidden">
                        <img src="https://i.etsystatic.com/18350306/c/548/436/222/68/il/2a38e5/2743174447/il_340x270.2743174447_n94j.jpg"
                            alt="Panier tressé" class="w-full h-full object-cover" />
                    </figure>
                    <div class="card-body p-5">
                        <div class="flex justify-between items-center mb-2">
                            <div class="badge badge-lg bg-indigo-500 text-white font-bold text-sm">Artisanat</div>
                            <span class="badge badge-warning text-white font-semibold">Stock Faible</span>
                        </div>

                        <h2 class="card-title text-xl mb-1 text-gray-800">
                            Panier Tressé Traditionnel Bamileke
                        </h2>
                        <p class="text-gray-500 text-sm mb-3">Par Ateliers Mbongo</p>

                        <div class="text-2xl font-extrabold flex items-center text-<?php echo $product_status; ?>">
                            20 000 FCFA
                        </div>

                        <div class="card-actions justify-end mt-4">
                            <a href="produit_detail.php?id=2" class="btn btn-sm btn-outline btn-info">Voir Détails</a>
                            <button class="btn btn-sm btn-success text-white"> <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg> Ajouter</button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex justify-center mt-12">
                <div class="join">
                    <button class="join-item btn">«</button>
                    <button class="join-item btn btn-active btn-success text-white">Page 1</button>
                    <button class="join-item btn">Page 2</button>
                    <button class="join-item btn">Page 3</button>
                    <button class="join-item btn">»</button>
                </div>
            </div>

        </section>
    </div>
</main>

<script>
    // Mettre à jour la valeur du prix affiché lorsque le slider change
    const priceRange = document.getElementById('price-range');
    const priceValue = document.getElementById('price-value');
    priceRange.addEventListener('input', (event) => {
        priceValue.textContent = event.target.value;
    });
</script>

<?php require_once 'includes/footer.php'; ?>