<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="../../public/logo/logo.png">
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" href="../../public/output.css" />
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <!-- Header -->
  <header class="header">
    <div class="flex">
      <img src="../../public/logo/logo.png" alt="" class="w-6"> Made in Cameroon
    </div>
    <nav class="nav">
      <a href="#">Accueil</a>
      <a href="#">Produits</a>
      <a href="#">Blog</a>
      <a href="#">À propos</a>
      <a href="#">Contact</a>
      <a href="#">🛒</a>
    </nav>
    <div class="actions">
      <button class="btn btn-vendeur">Vendeur</button>
      <button class="btn btn-deco">Déconnexion</button>
    </div>
  </header>

  <!-- Contenu principal -->
  <main class="container">

    <section class="dashboard-header">
      <h2>Tableau de Bord Vendeur</h2>
      <p class="dashboard-header">Gérez vos produits et commandes</p>
      <button id="openModalBtn" class="btn-add-product">+ Ajouter un produit</button>
    </section>

    <!-- Stats -->
    <section class="stats">
      <div class="stat-card">
        <div class="stat-label">Revenu total</div>
        <div class="stat-value">2 450 000 F</div>
        <div class="stat-icon">$</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Commandes</div>
        <div class="stat-value">48</div>
        <div class="stat-icon">📦</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Produits</div>
        <div class="stat-value">12</div>
        <div class="stat-icon">👁</div>
      </div>
      <div class="stat-card growth">
        <div class="stat-label">Croissance</div>
        <div class="stat-value">+15%</div>
        <div class="stat-icon">📈</div>
      </div>
    </section>
    <div class="sections-wrapper">
      <!-- Mes Produits -->
      <section class="section products-section">
        <h3>Mes Produits</h3>
        <div class="products-list">
          <div class="product-card">
            <img src="image/1739948657096.jpg" alt="Panier Artisanal" class="product-img" />
            <div class="product-info">
              <div class="product-name">Panier Artisanal</div>
              <div class="product-price">15 000 FCFA</div>
              <div class="product-stock">Stock: 12 • Vendus: 24</div>
            </div>
            <div class="product-actions">
              <span class="status active">Actif</span>
              <button class="btn-edit">✏</button>
              <button class="btn-delete">🗑</button>
            </div>
          </div>
          <div class="product-card">
            <img src="image/image.jpg" alt="Sculpture en Bois" class="product-img" />
            <div class="product-info">
              <div class="product-name">Sculpture en Bois</div>
              <div class="product-price">35 000 FCFA</div>
              <div class="product-stock">Stock: 5 • Vendus: 8</div>
            </div>
            <div class="product-actions">
              <span class="status active">Actif</span>
              <button class="btn-edit">✏</button>
              <button class="btn-delete">🗑</button>
            </div>
          </div>
        </div>
      </section>

      <!-- Commandes récentes -->

      <section class="section orders-section">
        <h3>Commandes récentes</h3>
        <div class="orders-list">
          <div class="order-card">
            <div class="order-id">CMD-012</div>
            <div class="order-customer">Marie K.</div>
            <div class="order-product">Panier Artisanal</div>
            <div class="order-status pending">En attente</div>
            <div class="order-price">15 000 FCFA</div>
          </div>
          <div class="order-card">
            <div class="order-id">CMD-011</div>
            <div class="order-customer">Jean D.</div>
            <div class="order-product">Sculpture en Bois</div>
            <div class="order-status completed">Terminée</div>
            <div class="order-price">35 000 FCFA</div>
          </div>
        </div>
      </section>

  </main>
  </div>

  <!-- Modal Formulaire -->
  <div id="productModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Nouveau Produit</h2>
      <form id="productForm">
        <div class="form-group">
          <label for="productName">Nom du produit</label>
          <input type="text" id="productName" placeholder="Ex: Panier artisanal" required />
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="productPrice">Prix (FCFA)</label>
            <input type="number" id="productPrice" placeholder="15000" min="0" required />
          </div>
          <div class="form-group">
            <label for="productStock">Stock</label>
            <input type="number" id="productStock" placeholder="10" min="0" required />
          </div>
        </div>
        <div class="form-group">
          <label for="productCategory">Catégorie</label>
          <select id="productCategory" required>
            <option value="">Sélectionnez une catégorie</option>
            <option value="artisanat">Artisanat</option>
            <option value="sculpture">Sculpture</option>
            <option value="textile">Textile</option>
            <option value="alimentaire">Alimentaire</option>
          </select>
        </div>
        <div class="form-group">
          <label for="productDescription">Description</label>
          <textarea id="productDescription" rows="3" placeholder="Décrivez votre produit..."></textarea>
        </div>
        <div class="form-group">
          <label for="productImage">Image du produit</label>
          <input type="file" id="productImage" accept="image/*" />
        </div>
        <div class="form-actions">
          <button type="button" id="cancelBtn">Annuler</button>
          <button type="submit">Ajouter le produit</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    // Récupérer les éléments
    const openModalBtn = document.getElementById('openModalBtn');
    const productModal = document.getElementById('productModal');
    const closeModal = document.querySelector('.close');
    const cancelBtn = document.getElementById('cancelBtn');
    const productForm = document.getElementById('productForm');

    // Ouvrir le modal
    openModalBtn.addEventListener('click', () => {
      productModal.style.display = 'flex';
    });

    // Fermer le modal
    const closeModalFunc = () => {
      productModal.style.display = 'none';
    };

    closeModal.addEventListener('click', closeModalFunc);
    cancelBtn.addEventListener('click', closeModalFunc);

    // Fermer si clic en dehors
    window.addEventListener('click', (e) => {
      if (e.target === productModal) {
        closeModalFunc();
      }
    });

    // Soumission du formulaire
    productForm.addEventListener('submit', (e) => {
      e.preventDefault();
      alert('✅ Produit ajouté avec succès !');
      productForm.reset();
      closeModalFunc();
    });
  </script>


  <footer class="footer">
    <div class="footer-container">
      <!-- Colonne 1 : Logo + Description -->
      <div class="footer-col">
        <div class="footer-logo">
          <div class="flag-icon"></div>
          <span>Made in Cameroon</span>
        </div>
        <p class="footer-desc">
          Promotion et vente de produits locaux camerounais. Consommons local, soutenons nos artisans.
        </p>
      </div>

      <!-- Colonne 2 : Liens rapides -->
      <div class="footer-col">
        <h4>Liens rapides</h4>
        <ul>
          <li><a href="#">Accueil</a></li>
          <li><a href="#">Produits</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">À propos</a></li>
        </ul>
      </div>

      <!-- Colonne 3 : Catégories -->
      <div class="footer-col">
        <h4>Catégories</h4>
        <ul>
          <li><a href="#">Agroalimentaire</a></li>
          <li><a href="#">Artisanat</a></li>
          <li><a href="#">Mode</a></li>
          <li><a href="#">Cosmétique</a></li>
        </ul>
      </div>

      <!-- Colonne 4 : Contact -->
      <div class="footer-col">
        <h4>Contact</h4>
        <div class="contact-info">
          <p><i class="fas fa-envelope"></i> contact@madeincameroon.cm</p>
          <p><i class="fas fa-phone"></i> +237 675 74 21 29</p>
          <p><i class="fas fa-map-marker-alt"></i> Yaoundé, Cameroun</p>
        </div>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>
</body>

</html>