<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Product Detail - HealthSelf</title>
  {{-- Incluye los estilos globales y específicos mediante Vite --}}
  @vite(['resources/css/shop.css', 'resources/css/product-detail.css', 'resources/js/product-detail.js'])
</head>
<body>
  <!-- HEADER -->
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
              d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
      </svg>
      <!-- Ícono de Favoritos -->
      <div class="container-favorites-icon">
        <a href="{{ route('favorites') }}">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
               viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon-favorite">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
          </svg>
        </a>
      </div>
      <!-- Carrito -->
      <div class="container-icon">
        <div class="container-cart-icon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none"
               viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon-cart">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z" />
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

  <!-- MIGAS DE PAN -->
  <div class="breadcrumb">
    <a href="{{ route('shop.index') }}">Inicio</a> / 
    <a href="{{ route('shop.index') }}">Shop</a> / 
    <span>Paracetamol</span>
  </div>

  <!-- SECCIÓN SUPERIOR: IMÁGENES E INFORMACIÓN DEL PRODUCTO -->
  <div class="product-detail-top">
    <!-- Miniaturas -->
    <div class="product-thumbs">
      <div class="thumb-item">
        <img src="https://boticaportugal.com/cdn/shop/products/9342026200_b669a73d-f18b-464c-8f6a-dabc2098cdc7.png?v=1648745438" alt="Paracetamol 1" />
      </div>
      <div class="thumb-item">
        <img src="https://boticaportugal.com/cdn/shop/products/9342026200_b669a73d-f18b-464c-8f6a-dabc2098cdc7.png?v=1648745438" alt="Paracetamol 2" />
      </div>
      <div class="thumb-item">
        <img src="https://boticaportugal.com/cdn/shop/products/9342026200_b669a73d-f18b-464c-8f6a-dabc2098cdc7.png?v=1648745438" alt="Paracetamol 3" />
      </div>
      <div class="thumb-item">
        <img src="https://boticaportugal.com/cdn/shop/products/9342026200_b669a73d-f18b-464c-8f6a-dabc2098cdc7.png?v=1648745438" alt="Paracetamol 4" />
      </div>
    </div>
    <!-- Imagen principal -->
    <div class="product-main-image">
      <img src="https://boticaportugal.com/cdn/shop/products/9342026200_b669a73d-f18b-464c-8f6a-dabc2098cdc7.png?v=1648745438" alt="Paracetamol Principal" />
    </div>
    <!-- Información del producto -->
    <div class="product-info">
      <div class="product-title">
        Paracetamol <span class="in-stock">In Stock</span>
      </div>
      <div class="rating-reviews">
        <span class="rating-stars">★★★★☆</span>
        <span>4.8</span>
        <span>|</span>
        <span>40 Reviews</span>
      </div>
      <div class="prices">
        <span class="new-price">$80</span>
      </div>
      <p class="product-short-description">
        Clora asparti tolais sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
        Nulla non nibh eleifend, blandit diam quis, ultrices et ipsum. Nulla magna a consequat pulvinar.
      </p>
      <div class="product-meta">
        <p><strong>Category:</strong> Healthy</p>
      </div>
      <div class="product-buttons">
        <button class="btn-add-cart">Add to Cart</button>
        <div class="heart-icon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
               viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5
                     -1.935 0-3.597 1.126-4.312 2.733
                     -.715-1.607-2.377-2.733-4.313-2.733
                     C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/>
          </svg>
        </div>
      </div>
    </div>
  </div>

  <!-- TABS: DESCRIPTIONS Y CUSTOMER FEEDBACK -->
  <div class="tabs-container">
    <div class="tabs-header">
      <div class="tab-title active" data-tab="desc">Descriptions</div>
      <div class="tab-title" data-tab="feedback">Customer Feedback</div>
    </div>
    <div class="tab-content active" id="desc">
      <div class="description-content">
        <div class="description-text">
          <p>
            Paracetamol is a pain reliever and a fever reducer. It is used to treat mild to moderate pain
            (from headaches, menstrual periods, toothaches, backaches, osteoarthritis, or cold/flu aches and pains)
            and to reduce fever.
          </p>
          <p>
            Additional details:
            <ul>
              <li>Form: 120mg / 5mL</li>
              <li>Box content: 1 bottle, instructions</li>
              <li>Manufacturer: PharmaX</li>
            </ul>
          </p>
        </div>
        <div class="description-image">
          <img src="https://a.files.bbci.co.uk/worldservice/live/assets/images/2015/05/18/150518114118_analgesico_624x351_thinkstock.jpg" alt="Analgesic" />
        </div>
      </div>
    </div>
    <div class="tab-content" id="feedback">
      <div class="comments-section">
        <h2>Comments</h2>
        <div class="write-review">
          <label for="review-input">Write a review</label>
          <textarea id="review-input" rows="3" placeholder="Add your opinion about the product"></textarea>
          <div class="star-rating">
            <label>Rate the product:</label>
            <div class="stars">
              <input type="radio" id="star5" name="rating" value="5" />
              <label for="star5">★</label>
              <input type="radio" id="star4" name="rating" value="4" />
              <label for="star4">★</label>
              <input type="radio" id="star3" name="rating" value="3" />
              <label for="star3">★</label>
              <input type="radio" id="star2" name="rating" value="2" />
              <label for="star2">★</label>
              <input type="radio" id="star1" name="rating" value="1" />
              <label for="star1">★</label>
            </div>
          </div>
          <button>Add opinion</button>
        </div>
        <div class="comment">
          <div class="author">Dr. Smith</div>
          <div class="date">3 min ago</div>
          <div class="text">This product has helped many of my patients achieve better pain management.</div>
        </div>
        <div class="comment">
          <div class="author">Nurse Jane</div>
          <div class="date">Apr 30, 2021</div>
          <div class="text">I appreciate the effectiveness of this medication; it really helps to reduce discomfort.</div>
        </div>
        <div class="comment">
          <div class="author">John Doe</div>
          <div class="date">2 min ago</div>
          <div class="text">Excellent product! It provided relief quickly and with minimal side effects.</div>
        </div>
        <div class="comment">
          <div class="author">Dr. Adams</div>
          <div class="date">1 min ago</div>
          <div class="text">Highly recommended for patients dealing with chronic pain.</div>
        </div>
        <div class="load-more">
          <button>Load More</button>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="site-footer">
    <div class="footer-container">
      <div class="footer-left">
        <div class="footer-brand">
          <img src="{{ asset('images_shop/healthself.png') }}" alt="HealthSelf Logo" class="footer-logo" />
          <h2>HealthSelf</h2>
        </div>
        <p class="footer-description">
          We simplify healthcare with hospital connections, medication purchases, and appointment scheduling aided by a chat‐bot that analyzes results.
        </p>
        <span class="footer-category">Medical</span>
      </div>
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

  {{-- Si tienes JavaScript adicional para esta vista y no lo quieres mover a un archivo, lo puedes incluir aquí --}}
  <script>
    // Lógica simple para los tabs (Descriptions / Customer Feedback)
    document.addEventListener('DOMContentLoaded', () => {
      const tabTitles = document.querySelectorAll('.tab-title');
      const tabContents = document.querySelectorAll('.tab-content');

      tabTitles.forEach(title => {
        title.addEventListener('click', () => {
          tabTitles.forEach(t => t.classList.remove('active'));
          tabContents.forEach(c => c.classList.remove('active'));

          title.classList.add('active');
          const tabId = title.dataset.tab;
          document.getElementById(tabId).classList.add('active');
        });
      });
    });
  </script>
</body>
</html>
