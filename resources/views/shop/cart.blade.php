<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Checkout - HealthSelf</title>
  {{-- Incluye los estilos globales y específicos mediante Vite --}}
  @vite(['resources/css/shop.css', 'resources/css/cart.css'])
</head>
<body>

  <!-- Header -->
  <header class="top-bar">
    <div class="logo-container">
      <img src="{{ asset('images_shop/healthself.png') }}" alt="HealthSelf" class="logo-icon">
      <span class="brand-name">HealthSelf</span>
    </div>
  </header>

  <main>
    <div class="breadcrumb">
      <a href="{{ route('shop.index') }}">Inicio</a> / 
      <a href="{{ route('shop.index') }}">Shop</a> / 
      Checkout
    </div>

    <div class="checkout-container">
      <!-- LADO IZQUIERDO -->
      <div class="cart-left">
        <h2>You order</h2>
        <p>Checkout has been completed in this shop</p>

        <!-- Contenedor para los productos dinámicos (localStorage) -->
        <div id="cart-dynamic-items">
          <!-- Aquí se inyectarán los productos del localStorage -->
        </div>

        <!-- FORMULARIO DE ENTREGA -->
        <div class="delivery-info">
          <h3>Delivery information</h3>
          <form id="delivery-form">
            <div class="delivery-grid">
              <div>
                <label for="delivery-method"><strong>Delivery method</strong></label><br>
                <select id="delivery-method" name="delivery-method" required>
                  <option value="">-- Select method --</option>
                  <option value="standard">Standard (2–3 days)</option>
                  <option value="express">Express (1 day)</option>
                  <option value="pickup">In-store pickup</option>
                </select>
              </div>
              <div>
                <label for="delivery-address"><strong>Delivery Address</strong></label><br>
                <textarea 
                  id="delivery-address" 
                  name="delivery-address" 
                  rows="4" 
                  placeholder="Adelfa #107, Durango 34200" 
                  required
                ></textarea>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- LADO DERECHO -->
      <div class="order-summary">
        <h2>Order Summary</h2>
        <div class="summary-line">
          <span>Subtotal</span>
          <span id="subtotal-value">$16.99</span>
        </div>
        <div class="summary-line">
          <span>Shipping</span>
          <span id="shipping-value">$16.99</span>
        </div>
        <div class="summary-line">
          <span>Tax</span>
          <span id="tax-value">$16.99</span>
        </div>
        <div class="summary-line summary-total">
          <span>Total</span>
          <span id="total-value">$16.99</span>
        </div>
        <button class="btn-payment" onclick="submitDeliveryForm()">Complete payment</button>
        <p class="terms-note">
          By completing your purchase, you agree to our <a href="#">Terms & Conditions</a>
        </p>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="footer-container">
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
      <div class="footer-middle">
        <div class="footer-column">
          <h3>Helpful Link</h3>
          <ul>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Support</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Terms & Conditions</a></li>
          </ul>
        </div>
        <div class="footer-column">
          <h3>Support</h3>
          <ul>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Support</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Terms & Conditions</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-right">
        <h3>Contact Us</h3>
        <ul>
          <li>UNIPOLI</li>
          <li>Health Self PP</li>
          <li>+52 618 814 1516</li>
          <li>health_self@domain.com</li>
        </ul>
      </div>
    </div>
  </footer>

  <!-- Script para el envío del formulario -->
  <script>
    function submitDeliveryForm() {
      const form = document.getElementById('delivery-form');
      if (!form.checkValidity()) {
        alert('Please complete the delivery information.');
        return;
      }
      const method = document.getElementById('delivery-method').value;
      const address = document.getElementById('delivery-address').value;
      alert('Payment completed!\nDelivery Method: ' + method + '\nAddress: ' + address);
    }
  </script>

  <!-- Script para actualizar dinámicamente los productos y el Order Summary -->
  <script>
    let subtotal = 0;
    const taxRate = 0.08; // 8% de impuestos (ejemplo)

    function updateOrderSummary() {
      // Leemos el carrito desde localStorage
      const cartProducts = JSON.parse(localStorage.getItem('cartProducts')) || [];

      // Elementos donde mostramos la info
      const cartDynamicContainer = document.getElementById('cart-dynamic-items');
      const subtotalEl = document.getElementById('subtotal-value');
      const shippingEl = document.getElementById('shipping-value');
      const taxEl = document.getElementById('tax-value');
      const totalEl = document.getElementById('total-value');

      // Limpiamos contenedor
      cartDynamicContainer.innerHTML = '';
      subtotal = 0;

      // Recorremos cada producto y creamos su card
      cartProducts.forEach((product, index) => {
        const itemDiv = document.createElement('div');
        itemDiv.classList.add('cart-product-card');
        // Generamos HTML con botones +/-
        itemDiv.innerHTML = `
          <img src="${product.image || 'https://via.placeholder.com/100'}" alt="${product.title}">
          <div class="product-info">
            <h3>${product.title}</h3>
            <p>Size: Large</p>
            <div class="quantity-controls">
              <button class="btn-decrement">-</button>
              <span class="product-qty">${product.quantity}</span>
              <button class="btn-increment">+</button>
            </div>
          </div>
          <span class="product-price">$${(product.price * product.quantity).toFixed(2)}</span>
        `;
        cartDynamicContainer.appendChild(itemDiv);

        // Acumulamos el subtotal
        subtotal += product.quantity * product.price;

        // Escuchamos clics en los botones - y +
        const minusBtn = itemDiv.querySelector('.btn-decrement');
        const plusBtn = itemDiv.querySelector('.btn-increment');

        // Botón -
        minusBtn.addEventListener('click', () => {
          if (cartProducts[index].quantity > 1) {
            cartProducts[index].quantity--;
          } else {
            // Si llega a 1 y vuelven a presionar "-", quitamos el producto
            cartProducts.splice(index, 1);
          }
          localStorage.setItem('cartProducts', JSON.stringify(cartProducts));
          updateOrderSummary();
        });

        // Botón +
        plusBtn.addEventListener('click', () => {
          cartProducts[index].quantity++;
          localStorage.setItem('cartProducts', JSON.stringify(cartProducts));
          updateOrderSummary();
        });
      });

      // Calcular envío según método
      let shippingCost = 16.99; 
      const methodSelect = document.getElementById('delivery-method');
      if (methodSelect) {
        const method = methodSelect.value;
        if (method === 'standard') shippingCost = 16.99;
        else if (method === 'express') shippingCost = 25.00;
        else if (method === 'pickup') shippingCost = 0;
      }

      // Calculamos tax y total
      const tax = subtotal * taxRate;
      const total = subtotal + shippingCost + tax;

      // Actualizamos en pantalla
      subtotalEl.textContent = `$${subtotal.toFixed(2)}`;
      shippingEl.textContent = `$${shippingCost.toFixed(2)}`;
      taxEl.textContent = `$${tax.toFixed(2)}`;
      totalEl.textContent = `$${total.toFixed(2)}`;
    }

    document.addEventListener('DOMContentLoaded', () => {
      updateOrderSummary();
      const methodSelect = document.getElementById('delivery-method');
      if (methodSelect) {
        methodSelect.addEventListener('change', updateOrderSummary);
      }
    });
  </script>

  <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
