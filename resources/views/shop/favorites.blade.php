<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Favorites - HealthSelf</title>
  {{-- Se incluye el archivo global de estilos mediante Vite --}}
  @vite(['resources/css/shop.css'])
  <!-- Estilos extra para la página de favoritos -->
  <style>
    .favorites-container {
      max-width: 1200px;
      margin: 20px auto;
      padding: 20px;
    }
    .back-to-shop {
      margin-bottom: 20px;
    }
    .back-to-shop a {
      color: #7f4ac8;
      text-decoration: none;
      font-weight: 500;
      font-size: 1rem;
    }
    .back-to-shop a:hover {
      text-decoration: underline;
    }
    .favorite-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }
    .favorite-item-info {
      display: flex;
      align-items: center;
      gap: 20px;
      flex-grow: 1;
    }
    .favorite-image-container {
      display: inline-block;
    }
    .favorite-image-container img {
      width: 100px;
      height: auto;
      object-fit: cover;
      border-radius: 10px;
    }
    .favorite-details {
      display: flex;
      flex-direction: column;
    }
    .favorite-details h2 {
      margin: 0;
      font-size: 18px;
    }
    .favorite-details p {
      margin: 5px 0 0;
      font-size: 16px;
    }
    .favorite-actions {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: flex-start;
      gap: 10px;
    }
    .favorite-actions .heart-icon {
      cursor: pointer;
      width: 24px;
      height: 24px;
      position: static;
    }
    .btn-add-cart {
      border: none;
      background: #02C8BF;
      color: #fff;
      padding: 10px 20px;
      font-size: 14px;
      font-weight: 700;
      border-radius: 20px;
      cursor: pointer;
      transition: background 0.3s;
    }
    .btn-add-cart:hover {
      background: #029e95;
    }
  </style>
</head>
<body>
  <!-- Barra Superior -->
  <header class="top-bar">
    <div class="top-bar-left">
      <div class="logo-container">
        <img src="{{ asset('images_shop/healthself.png') }}" alt="HealthSelf" class="logo-icon" />
        <span class="brand-name">HealthSelf</span>
      </div>
    </div>
    <div class="top-bar-right">
      <!-- Ícono de Usuario -->
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
           viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon-user">
        <path stroke-linecap="round" stroke-linejoin="round" 
              d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975
                 m11.963 0a9 9 0 1 0-11.963 0
                 m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
      </svg>
      <!-- Ícono de Carrito (se usa en todas las vistas) -->
      <div class="container-icon">
        <div class="container-cart-icon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none"
               viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon-cart">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5
                     m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z" />
          </svg>
          <div class="count-products">
            <span id="contador-productos">0</span>
          </div>
        </div>
        <div class="container-cart-products hidden-cart">
          <div class="row-product"></div>
          <div class="cart-total">
            <h3>Total:</h3>
            <span class="total-pagar">$0</span>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <main class="favorites-container">
    <!-- Enlace para volver a la tienda -->
    <div class="back-to-shop">
      <a href="{{ route('shop.index') }}">← Back to Shop</a>
    </div>
    <h1>Favorites</h1>
    <div class="favorites-items">
      <!-- Los favoritos se cargarán dinámicamente aquí -->
    </div>
  </main>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="footer-container">
      <!-- Columna Izquierda -->
      <div class="footer-left">
        <div class="footer-brand">
          <img src="{{ asset('images_shop/healthself.png') }}" alt="HealthSelf Logo" class="footer-logo" />
          <h2>HealthSelf</h2>
        </div>
        <p class="footer-description">
          We simplify healthcare with hospital connections, medication purchases, 
          and appointment scheduling aided by a chat-bot that analyzes results.
        </p>
        <span class="footer-category">Medical</span>
      </div>
      <!-- Columna Central -->
      <div class="footer-middle">
        <div class="footer-column">
          <h3>Helpful Link</h3>
          <ul>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Terms & Conditions</a></li>
            <li><a href="#">Change Language</a></li>
          </ul>
        </div>
        <div class="footer-column">
          <h3>Support</h3>
          <ul>
            <li><a href="#">Support</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms & Conditions</a></li>
          </ul>
        </div>
      </div>
      <!-- Columna Derecha -->
      <div class="footer-right">
        <h3>Contact Us</h3>
        <ul>
          <li>UNIPOLI</li>
          <li>Health Self FB</li>
          <li>+52 618 814 1516</li>
          <li>health_self@domain.com</li>
        </ul>
      </div>
    </div>
  </footer>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Cargar favoritos desde localStorage
      const favorites = JSON.parse(localStorage.getItem('favoriteProducts')) || [];
      const container = document.querySelector('.favorites-items');
      container.innerHTML = "";
      
      if (favorites.length === 0) {
        container.innerHTML = '<p>No favorites added.</p>';
      } else {
        favorites.forEach(product => {
          const div = document.createElement('div');
          div.classList.add('favorite-item');
          div.innerHTML = `
            <div class="favorite-item-info">
              <div class="favorite-image-container">
                <img src="${product.image}" alt="${product.title}">
              </div>
              <div class="favorite-details">
                <h2>${product.title}</h2>
                <p>Price: $${product.price}</p>
              </div>
            </div>
            <div class="favorite-actions">
              <div class="heart-icon favorited">
                <svg 
                  xmlns="http://www.w3.org/2000/svg" 
                  fill="currentColor" 
                  viewBox="0 0 24 24" 
                  stroke-width="1.5" 
                  stroke="currentColor" 
                  class="size-6">
                  <path 
                    stroke-linecap="round" 
                    stroke-linejoin="round"
                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-..."/>
                </svg>
              </div>
              <button class="btn-add-cart">Add to cart</button>
            </div>
          `;
          container.appendChild(div);
        });
      }
      
      // Remover favorito al dar clic en el ícono de corazón
      document.querySelectorAll('.heart-icon').forEach(heart => {
        heart.addEventListener('click', (e) => {
          e.stopPropagation();
          const favoriteItem = heart.closest('.favorite-item');
          const title = favoriteItem.querySelector('.favorite-details h2').textContent;
          let storedFavorites = JSON.parse(localStorage.getItem('favoriteProducts')) || [];
          storedFavorites = storedFavorites.filter(p => p.title !== title);
          localStorage.setItem('favoriteProducts', JSON.stringify(storedFavorites));
          favoriteItem.remove();
          if (storedFavorites.length === 0) {
            container.innerHTML = '<p>No favorites added.</p>';
          }
        });
      });

      // Funcionalidad del carrito en la página de favorites
      let allProducts = [];
      const btnCart = document.querySelector('.container-cart-icon');
      const containerCartProducts = document.querySelector('.container-cart-products');
      const rowProduct = document.querySelector('.row-product');
      const totalPagar = document.querySelector('.total-pagar');
      const countProducts = document.querySelector('#contador-productos');

      btnCart.addEventListener('click', () => {
        containerCartProducts.classList.toggle('hidden-cart');
      });

      function updateCart() {
        rowProduct.innerHTML = '';
        let total = 0;
        let totalProducts = 0;
        allProducts.forEach(product => {
          total += product.quantity * product.price;
          totalProducts += product.quantity;
          rowProduct.innerHTML += `
            <div class="cart-product">
              <div class="info-cart-product">
                <span class="cantidad-producto-carrito">${product.quantity}</span>
                <p class="titulo-producto-carrito">${product.title}</p>
                <span class="precio-producto-carrito">$${product.price * product.quantity}</span>
                <div class="quantity-controls">
                  <button class="btn-minus">-</button>
                  <button class="btn-plus">+</button>
                </div>
              </div>
              <svg class="icon-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                <path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2"/>
              </svg>
            </div>
          `;
        });
        totalPagar.textContent = `$${total}`;
        countProducts.textContent = totalProducts;
      }

      // Agregar producto al carrito desde la lista de favoritos
      document.querySelectorAll('.btn-add-cart').forEach(button => {
        button.addEventListener('click', (e) => {
          const productItem = e.target.closest('.favorite-item');
          const title = productItem.querySelector('.favorite-details h2').textContent;
          const priceText = productItem.querySelector('.favorite-details p').textContent; // "Price: $XX"
          const price = parseFloat(priceText.replace("Price: $", ""));
          const image = productItem.querySelector('.favorite-image-container img').src;
          
          const exists = allProducts.find(p => p.title === title);
          if (exists) {
            exists.quantity++;
          } else {
            allProducts.push({ quantity: 1, title, price, image });
          }
          updateCart();
        });
      });

      // Controles del carrito: incrementar, decrementar y eliminar productos
      rowProduct.addEventListener('click', (e) => {
        if (e.target.classList.contains('btn-plus')) {
          const title = e.target.closest('.cart-product').querySelector('.titulo-producto-carrito').textContent;
          const product = allProducts.find(prod => prod.title === title);
          if (product) {
            product.quantity++;
            updateCart();
          }
        } else if (e.target.classList.contains('btn-minus')) {
          const title = e.target.closest('.cart-product').querySelector('.titulo-producto-carrito').textContent;
          const product = allProducts.find(prod => prod.title === title);
          if (product) {
            product.quantity--;
            if (product.quantity <= 0) {
              allProducts = allProducts.filter(prod => prod.title !== title);
            }
            updateCart();
          }
        } else if (e.target.closest('.icon-close')) {
          const removeBtn = e.target.closest('.icon-close');
          const title = removeBtn.parentElement.querySelector('.titulo-producto-carrito').textContent;
          allProducts = allProducts.filter(product => product.title !== title);
          updateCart();
        }
      });
    });
  </script>
  <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
