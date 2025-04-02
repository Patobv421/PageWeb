<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Psychopharmacological Drugs - HealthSelf</title>

  @vite(['resources/css/shop.css', 'resources/js/shop.js'])

  <style>
    .psychopharmacological-container {
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
    }
    .back-to-shop a:hover {
      text-decoration: underline;
    }
    .psychopharmacological-container h1 {
      margin-bottom: 30px;
    }
  </style>
</head>
<body>
  <!-- Header -->
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
        <!-- SVG del buscador -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke-width="1.5"
             stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="m21 21-5.197-5.197m0 0A7.5 7.5 
                   0 1 0 5.196 5.196a7.5 7.5 
                   0 0 0 10.607 10.607Z" />
        </svg>
      </button>
    </div>
    <div class="top-bar-right">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none"
           viewBox="0 0 24 24" stroke-width="1.5"
           stroke="currentColor" class="icon-user">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0
                 a9 9 0 1 0-11.963 0m11.963 0
                 A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275
                 M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
      </svg>

      <div class="container-favorites-icon">
        <a href="{{ route('favorites') }}">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none"
               viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="icon-favorite">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5
                     -1.935 0-3.597 1.126-4.312 2.733
                     -.715-1.607-2.377-2.733-4.313-2.733
                     C5.1 3.75 3 5.765 3 8.25
                     c0 7.22 9 12 9 12s9-4.78 9-12Z"/>
          </svg>
        </a>
      </div>

      <div class="container-icon">
        <div class="container-cart-icon">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none"
               viewBox="0 0 24 24" stroke-width="1.5"
               stroke="currentColor" class="icon-cart">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15.75 10.5V6a3.75 3.75 0 
                     10-7.5 0v4.5m11.356-1.993
                     l1.263 12c.07.665-.45 1.243-1.119 1.243
                     H4.25a1.125 1.125 0 0 1-1.12-1.243
                     l1.264-12A1.125 1.125 0 0 1 5.513 7.5
                     h12.974c.576 0 1.059.435 1.119 1.007z"/>
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
  <!-- Fin Header -->

  <div class="psychopharmacological-container">
    <div class="back-to-shop">
      <a href="{{ route('shop.index') }}">← Back to Shop</a>
    </div>

    <h1>Psychopharmacological Drugs</h1>

    <div class="container-items">
      {{-- Producto 1 --}}
      <div class="item">
        <div class="heart-icon">
          @include('components.heart-icon')
        </div>
        <div class="item-container">
          <div class="item-image">
            <div class="image-container">
              <img src="https://www.assetpharmacy.com/wp-content/uploads/2017/09/Sertraline-100mg-Tablets-28-Tablets.jpg" alt="Sertraline" />
            </div>
          </div>
          <div class="item-details">
            <div class="item-title"><h2>Sertraline</h2></div>
            <div class="item-description">
              <p class="description">An SSRI antidepressant used to treat depression, anxiety, and other mental health conditions.</p>
            </div>
            <div class="item-info">
              <div class="info-product">
                <p class="price">$70.00</p>
                <button class="btn-add-cart">Add to cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Producto 2 --}}
      <div class="item">
        <div class="heart-icon">
          @include('components.heart-icon')
        </div>
        <div class="item-container">
          <div class="item-image">
            <div class="image-container">
              <img src="https://th.bing.com/th/id/OIP.e_MmNtwQti9H6egZqMoP3QAAAA?rs=1&pid=ImgDetMain" alt="Fluoxetine" />
            </div>
          </div>
          <div class="item-details">
            <div class="item-title"><h2>Fluoxetine</h2></div>
            <div class="item-description">
              <p class="description">Another SSRI used for depression, OCD, bulimia, and panic disorders.</p>
            </div>
            <div class="item-info">
              <div class="info-product">
                <p class="price">$65.00</p>
                <button class="btn-add-cart">Add to cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Producto 3 --}}
      <div class="item">
        <div class="heart-icon">
          @include('components.heart-icon')
        </div>
        <div class="item-container">
          <div class="item-image">
            <div class="image-container">
              <img src="https://res.cloudinary.com/walmart-labs/image/upload/d_default.jpg/w_960,dpr_auto,f_auto,q_auto:best/gr/images/product-images/img_large/00750138450243L.jpg" alt="Clonazepam" />
            </div>
          </div>
          <div class="item-details">
            <div class="item-title"><h2>Clonazepam</h2></div>
            <div class="item-description">
              <p class="description">A benzodiazepine used for seizure disorders and panic attacks (controlled medication).</p>
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
    </div> <!-- /.container-items -->
  </div> <!-- /.psychopharmacological-container -->

  @include('shop.partials.footer')
</body>
</html>
