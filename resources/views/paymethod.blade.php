<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>HealthSelf</title>
  {{-- Carga el CSS a través de Vite --}}
  @vite('resources/css/paymethod.css')
</head>
<body>

  <!-- HEADER -->
  <header class="navbar">
    <div class="navbar-logo-group">
      <img src="{{ asset('images_payment/logo.png') }}" alt="HealthSelf Logo" class="logo">
      <span class="brand-name">HealthSelf</span>
    </div>
    <input type="text" placeholder="What are you looking for?" class="search-bar" />
    <img src="{{ asset('images_payment/HealthSelf.png') }}" alt="Search Icon" class="search-icon">
    <nav class="nav-links">
      <span>Favorites</span>
      <img src="{{ asset('images_payment/profile.png') }}" alt="Profile Icon" class="icon">
      <img src="{{ asset('images_payment/carrito.png') }}" alt="Cart Icon" class="icon">
    </nav>
  </header>

  <!-- MAIN -->
  <main class="main-section">
    <img src="{{ asset('images_payment/back.png') }}" alt="Back Button" class="back-button" />

    <section class="billing-section">
      <div class="billing-info">
        <h2>Billing Information</h2>
        <div class="form-row">
          <div class="form-group">
            <label>First Name</label>
            <input type="text" placeholder="Enter your last name" />
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" placeholder="Enter your last name" />
          </div>
        </div>

        <div class="form-group">
          <label>Street Address</label>
          <input type="text" placeholder="Enter your address" />
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Email</label>
            <input type="email" placeholder="Enter your E-mail address" />
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="tel" placeholder="Enter your phone number" />
          </div>
        </div>

        <h3>Additional Information</h3>
        <div class="form-group">
          <label>Order Notes</label>
          <textarea placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
        </div>
      </div>

      <div class="order-summary">
        <h3>Order Summery</h3>
        <div class="order-item">
          <p><strong>F</strong> Paracetamol x1 <span>$17.28</span></p>
        </div>
        <p>Subtotal: <span>$17.28</span></p>
        <p>Shipping: <span>Free</span></p>
        <hr />
        <p><strong>Total:</strong> <strong>$17.28</strong></p>

        <h4>Payment Method</h4>
        <div class="payment-logos">
          <img src="{{ asset('images_payment/paypal.png') }}" alt="PayPal" class="payment-icon">
          <img src="{{ asset('images_payment/visa.png') }}" alt="Visa" class="payment-icon">
          <img src="{{ asset('images_payment/mastercard.png') }}" alt="Mastercard" class="payment-icon">
        </div>

        <div class="payment-options">
          <label><input type="radio" name="payment" checked> Paypal</label>
          <label><input type="radio" name="payment"> Debit/Credit Card</label>
        </div>

        <button class="place-order">Place Order</button>
      </div>
    </section>
  </main>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-left">
      <img src="{{ asset('images_payment/logo.png') }}" alt="Logo" class="footer-logo" />
      <h2>HealthSelf</h2>
    </div>

    <div class="footer-description">
      <p>We simplify healthcare with hospital connections, medication purchases, and appointment scheduling, aided by a chatbot that analyzes results.</p>
      <small>Medical</small>
    </div>

    <div class="footer-links-wrapper">
      <div class="footer-links">
        <h4>Helpful Link</h4>
        <p>Privacy Policy</p>
        <p>Support</p>
        <p>FAQ</p>
        <p>Terms & Conditions</p>
        <p>Change Language</p>
      </div>

      <div class="footer-links">
        <h4>Support</h4>
        <p>Privacy Policy</p>
        <p>Support</p>
        <p>FAQ</p>
        <p>Terms & Conditions</p>
      </div>
    </div>

    <div class="footer-contact">
      <h4>Contact Us</h4>
      <p>🏢 UNIPOLI</p>
      <p>💳 Health Self PF</p>
      <p>📞 +52 618 618 15 16</p>
      <p>✉️ health_self59</p>
    </div>
  </footer>

  <!-- MODAL: Payment -->
  <div class="modal-overlay" id="modalOverlay">
    <div class="payment-modal">
      <h3>Payment</h3>
      <label>Card Number</label>
      <input type="text" placeholder="Enter your card number" />
      <label>Card Holder Name</label>
      <input type="text" placeholder="Enter your card holder name" />
      <div class="form-row">
        <div class="form-group">
          <label>Expiry</label>
          <input type="text" placeholder="MM/YY" />
        </div>
        <div class="form-group">
          <label>CVV</label>
          <input type="text" placeholder="123" />
        </div>
      </div>
      <label><input type="checkbox" /> Save this card for future transactions</label>
      <button class="place-order" id="proceedBtn">Proceed to Pay</button>
    </div>
  </div>

  <!-- MODAL: Confirmation -->
  <div class="modal-overlay" id="confirmationOverlay">
    <div class="confirmation-modal">
      <p>Wait your drugs, it will arrive soon</p>
      <button onclick="closeConfirmation()" class="place-order">Back Shop</button>
    </div>
  </div>

  <!-- SCRIPT -->
  <script>
    const modal = document.getElementById('modalOverlay');
    const confirmation = document.getElementById('confirmationOverlay');
    const placeOrderBtn = document.querySelector('.order-summary .place-order');
    const proceedBtn = document.getElementById('proceedBtn');

    placeOrderBtn.addEventListener('click', function (e) {
      e.preventDefault();
      modal.classList.add('active');
    });

    function closeConfirmation() {
      confirmation.classList.remove('active');
    }

    proceedBtn.addEventListener('click', function () {
      modal.classList.remove('active');
      confirmation.classList.add('active');
    });
  </script>

</body>
</html>
