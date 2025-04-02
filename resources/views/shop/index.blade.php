<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Gastrointestinal Drugs - HealthSelf</title>
  {{-- Se incluye el archivo global de estilos mediante Vite --}}
  @vite(['resources/css/shop.css','resources/js/shop.js'])
  <!-- Estilos extra para el contenedor y el Back to Shop -->
  <style>
    .gastrointestinal-container {
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
    /* Mayor separación debajo del título */
    .gastrointestinal-container h1 {
      margin-bottom: 30px;
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
    <div class="search-container">
      <input type="text" class="search-input" placeholder="What are you looking for?" />
      <button class="search-btn">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" 
                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
      </button>
    </div>
    <div class="top-bar-right">
      <!-- Ícono de Usuario -->
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
           viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon-user">
        <path stroke-linecap="round" stroke-linejoin="round" 
              d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975
                 m11.963 0a9 9 0 1 0-11.963 0
                 m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275
                 M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
      </svg>
      <!-- Ícono de Favoritos -->
      <div class="container-favorites-icon">
        <a href="{{ route('favorites') }}">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
               viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon-favorite">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5
                     -1.935 0-3.597 1.126-4.312 2.733
                     -.715-1.607-2.377-2.733-4.313-2.733
                     C5.1 3.75 3 5.765 3 8.25
                     c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
      </div>
      <!-- Carrito -->
      <div class="container-icon">
        <div class="container-cart-icon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
               viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon-cart">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5
                     m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25
                     a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974
                     c.576 0 1.059.435 1.119 1.007z" />
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
          <div class="cart-buttons">
            <button id="btn-clear-cart">Vaciar carrito</button>
            <a href="{{ route('cart') }}" id="btn-go-to-cart">Ir al carrito</a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Fin Barra Superior -->

  <!-- Carrusel -->
  <div class="carrusel-container">
    <div class="carrusel-slide active">
      <img src="{{ asset('images_shop/carrusel1.webp') }}" alt="Slide 1">
    </div>
    <div class="carrusel-slide">
      <img src="{{ asset('images_shop/carrusel2.jpg') }}" alt="Slide 2">
    </div>
    <div class="carrusel-slide">
      <img src="{{ asset('images_shop/carrusel3.1.png') }}" alt="Slide 3">
    </div>
    <!-- Flechas de control -->
    <div class="carrusel-controls">
      <span class="prev">&#10094;</span>
      <span class="next">&#10095;</span>
    </div>
  </div>
  <!-- Fin Carrusel -->

  <!-- Botones de Categorías -->
  <div class="categories-container">
    <button class="category-btn">
      <span>Antimicrobials</span>
    </button>
    <button class="category-btn">
      <span>Analgesics</span>
    </button>
    <button class="category-btn">
      <span>Psychopharmacological Drugs</span>
    </button>
    <button class="category-btn">
      <span>Cardiovascular Drugs</span>
    </button>
    <button class="category-btn">
      <span>Gastrointestinal Drugs</span>
    </button>
    <button class="category-btn">
      <span>Metabolic Drugs</span>
    </button>
  </div>
  <!-- Fin Categorías -->

  <!-- Sección de Productos -->
  <div class="container">
    <div class="container-items">
      <!-- Producto 1: Paracetamol -->
      <div class="item">
        <div class="heart-icon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
               viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </div>
        <div class="item-container">
          <div class="item-image">
            <div class="image-container">
              <img src="https://boticaportugal.com/cdn/shop/products/9342026200_b669a73d-f18b-464c-8f6a-dabc2098cdc7.png?v=1648745438" alt="Paracetamol" />
            </div>
          </div>
          <div class="item-details">
            <div class="item-title">
              <h2>Paracetamol</h2>
            </div>
            <div class="item-description">
              <p class="description">
                Analgesic / Anti-inflammatory. This medication contains Paracetamol, which belongs to a group of medications called analgesics.
              </p>
            </div>
            <div class="item-info">
              <div class="info-product">
                <p class="price">$80.00</p>
                <button class="btn-add-cart">Add to cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Producto 2: Loratadina -->
      <div class="item">
        <div class="heart-icon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
               viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </div>
        <div class="item-container">
          <div class="item-image">
            <div class="image-container">
              <img src="https://www.plmconnection.com/plmservices/PharmaSearchEngine/Mexico/DEF/SIDEF/400x400/sanfer_loratadina_10mg_tabs_caja10.png" alt="Loratadina" />
            </div>
          </div>
          <div class="item-details">
            <div class="item-title">
              <h2>Loratadina</h2>
            </div>
            <div class="item-description">
              <p class="description">
                Antihistamine used to relieve allergy symptoms such as sneezing, runny nose, and itching.
              </p>
            </div>
            <div class="item-info">
              <div class="info-product">
                <p class="price">$20.00</p>
                <button class="btn-add-cart">Add to cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Producto 3: Naproxen -->
      <div class="item">
        <div class="heart-icon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
               viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </div>
        <div class="item-container">
          <div class="item-image">
            <div class="image-container">
              <img src="https://www.aflofarm.com.pl/media/__sized__/produkt_zdjecia/naproxen-aflofarm-zdjecie-glowne-M2-thumbnail-450x450.png" alt="Naproxen" />
            </div>
          </div>
          <div class="item-details">
            <div class="item-title">
              <h2>Naproxen</h2>
            </div>
            <div class="item-description">
              <p class="description">
                Similar to Ibuprofen, it is an NSAID used to treat inflammatory pains, such as arthritis, as well as menstrual or muscle pain.
              </p>
            </div>
            <div class="item-info">
              <div class="info-product">
                <p class="price">$50.00</p>
                <button class="btn-add-cart">Add to cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Producto 4: Iboprufeno -->
      <div class="item">
        <div class="heart-icon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
               viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </div>
        <div class="item-container">
          <div class="item-image">
            <div class="image-container">
              <img src="https://chedrauimx.vtexassets.com/arquivos/ids/36460577-800-auto?v=638628048668400000&width=800&height=auto&aspect=true" alt="Iboprufeno" />
            </div>
          </div>
          <div class="item-details">
            <div class="item-title">
              <h2>Iboprufeno</h2>
            </div>
            <div class="item-description">
              <p class="description">
                A nonsteroidal anti-inflammatory drug (NSAID) that helps reduce inflammation, pain, and fever. It is commonly used for muscle, headache, or joint pain.
              </p>
            </div>
            <div class="item-info">
              <div class="info-product">
                <p class="price">$90.00</p>
                <button class="btn-add-cart">Add to cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Producto 5: Aspirina -->
      <div class="item">
        <div class="heart-icon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
               viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </div>
        <div class="item-container">
          <div class="item-image">
            <div class="image-container">
              <img src="https://www.fahorro.com/media/catalog/product/7/5/7501008491966_4.jpg?optimize=medium&bg-color=255,255,255&fit=bounds&height=700&width=700&canvas=700:700" alt="Aspirina" />
            </div>
          </div>
          <div class="item-details">
            <div class="item-title">
              <h2>Aspirina</h2>
            </div>
            <div class="item-description">
              <p class="description">
                Used to reduce pain, fever or inflammation. It is also used in low doses to prevent blood clots.
              </p>
            </div>
            <div class="item-info">
              <div class="info-product">
                <p class="price">$50.00</p>
                <button class="btn-add-cart">Add to cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Producto 6: Diclofenaco -->
      <div class="item">
        <div class="heart-icon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
               viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </div>
        <div class="item-container">
          <div class="item-image">
            <div class="image-container">
              <img src="{{ asset('images_shop/Diclofenaco.png') }}" alt="Diclofenaco" />
            </div>
          </div>
          <div class="item-details">
            <div class="item-title">
              <h2>Diclofenaco</h2>
            </div>
            <div class="item-description">
              <p class="description">
                An NSAID commonly used to reduce inflammation and treat pain.
              </p>
            </div>
            <div class="item-info">
              <div class="info-product">
                <p class="price">$60.00</p>
                <button class="btn-add-cart">Add to cart</button>
              </div>
            </div>
          </div>
        </div> 
      </div>
      <!-- Fin de Productos -->
    </div>
  </div>
  <!-- Fin Contenedor -->

  <!-- Footer (sección inferior) -->
  <footer class="site-footer">
    <div class="footer-container">
      <!-- Columna Izquierda: Logo + Descripción -->
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
  
      <!-- Columna Central: Helpful Link + Support -->
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
  
      <!-- Columna Derecha: Contacto -->
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

  <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
