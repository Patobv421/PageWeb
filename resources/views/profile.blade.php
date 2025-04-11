<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HealthSelf - Profile</title>
  {{-- Se importan el CSS y el JS mediante Vite --}}
  @vite(['resources/css/profile.css', 'resources/js/profile.js'])
</head>
<body>
  <!-- HEADER -->
  <header class="navbar">
    <div class="navbar-logo-group">
      <img src="{{ asset('images_perfil/logo.png') }}" alt="HealthSelf Logo" class="logo" />
      <span class="brand-name">HealthSelf</span>
    </div>
    <div class="search-container">
      <input type="text" placeholder="What are you looking for?" class="search-bar" />
      <img src="{{ asset('images_perfil/HealthSelf.png') }}" alt="Search Icon" class="search-icon" />
    </div>
    <nav class="nav-links">
      <span>Favorites</span>
      <img src="{{ asset('images_perfil/profile_header.png') }}" alt="Profile Icon" class="icon" />
      <img src="{{ asset('images_perfil/carrito.png') }}" alt="Cart Icon" class="icon" />
    </nav>
  </header>

  <!-- MAIN -->
  <main class="main-section">
    <div class="content-container">
      <!-- Back Button -->
      <div class="back-button-container">
        <img src="{{ asset('images_perfil/back.png') }}" alt="Back Button" class="back-button" />
      </div>

      <!-- Patient Information link -->
      <div class="profile-link-container">
        <a href="#" class="profile-link">Patient Information</a>
      </div>

      <!-- GRAY BOX with Patient Info -->
      <section class="profile-header">
        <div class="patient-info-container">
          <div class="patient-icon-container">
            <img src="{{ asset('images_perfil/profile_content.png') }}" alt="Patient Icon" class="patient-icon" />
          </div>
          <div class="patient-details-container">
            <div class="patient-name">Juan Luis Medina Ochoa</div>
            <div class="patient-id-pill"># 5458648789 | 41 years</div>
          </div>
        </div>
        <div class="patient-stats-container">
          <div class="patient-stats">
            <div class="stat-pill">
              <strong>Blood Type</strong>
              <span>A+</span>
            </div>
            <div class="stat-pill">
              <strong>Allergies</strong>
              <span>Any</span>
            </div>
            <div class="stat-pill">
              <strong>Last visit</strong>
              <span>03/20/2025</span>
            </div>
            <div class="stat-pill">
              <strong>Next visit</strong>
              <span>04/20/2025</span>
            </div>
          </div>
        </div>
      </section>

      <!-- MAIN TABS (Review, Vitals, Drugs, Appointments) -->
      <section class="profile-tabs">
        <div class="tab selected" data-tab="review">
          <img src="{{ asset('images_perfil/icon_review_selected.png') }}" alt="Review" />
          <span>Review</span>
        </div>
        <div class="tab" data-tab="vitals">
          <img src="{{ asset('images_perfil/icon_vitals_unselected.png') }}" alt="Vitals" />
          <span>Vitals</span>
        </div>
        <div class="tab" data-tab="drugs">
          <img src="{{ asset('images_perfil/icon_drugs_unselected.png') }}" alt="Drugs" />
          <span>Drugs</span>
        </div>
        <div class="tab" data-tab="appoinments">
          <img src="{{ asset('images_perfil/icon_appoinments_unselected.png') }}" alt="Appointments" />
          <span>Appointments</span>
        </div>
      </section>

      <!-- DIAGNOSTICS (Review tab) -->
      <section class="diagnostics" id="diagnostics-section">
        <div class="diagnostics-tabs">
          <div class="subtab selected" data-subtab="diagnostics">Diagnostics</div>
          <div class="subtab" data-subtab="labresults">Laboratory Results</div>
          <div class="subtab" data-subtab="reviewSub">Review</div>
        </div>
        <!-- Diagnostics content -->
        <div class="diagnostic-content" data-content="diagnostics" style="display: block;">
          <div class="diagnostic-card">
            <h2>Diagnostics</h2>
            <h3>Medical Conditions</h3>
            <div class="diagnostic-row">
              <div class="condition-info">
                <span class="condition-text">Diabetic</span>
                <span class="condition-pill">Active</span>
              </div>
              <div class="date-info">
                <img src="{{ asset('images_perfil/icon_appoinments_unselected.png') }}" alt="Date Icon" class="date-icon" />
                <span>19/08/2024</span>
              </div>
            </div>
            <div class="doctor-notes-row">
              <div class="doctor-info">
                <strong>Doctor:</strong> Alvarez Quiñones
              </div>
              <div class="notes-info">
                <strong>Notes:</strong> Initial diagnosis. It is predictable.
              </div>
            </div>
          </div>
        </div>
        <!-- Laboratory Results content -->
        <div class="diagnostic-content" data-content="labresults" style="display: none;">
          <div class="labresults-card">
            <h2>Laboratory Results</h2>
            <p>Results of your laboratory tests</p>
            <!-- Example row -->
            <div class="lab-row">
              <div class="lab-condition-info">
                <span class="lab-condition-text">Diabetic</span>
                <span class="lab-pill lab-normal">Normal</span>
              </div>
              <div class="lab-notes">
                <strong>Notes:</strong> Everything is stable
              </div>
              <div class="lab-date">
                <img src="{{ asset('images_perfil/icon_appoinments_unselected.png') }}" alt="Date Icon" class="lab-date-icon" />
                <span>20/08/2024</span>
              </div>
            </div>
          </div>
        </div>
        <!-- Review content -->
        <div class="diagnostic-content" data-content="reviewSub" style="display: none;">
          <div class="review-card">
            <h2>Review</h2>
            <p>Review already done</p>
            <div class="review-row">
              <div class="review-condition-info">
                <span class="review-condition-text">Electrocardiogram</span>
                <span class="review-pill review-normal">Normal</span>
              </div>
              <div class="review-date">
                <img src="{{ asset('images_perfil/icon_appoinments_unselected.png') }}" alt="Date Icon" class="review-date-icon" />
                <span>27/03/2025</span>
              </div>
            </div>
            <div class="review-doctor-row">
              <div class="review-doctor">
                <strong>Doctor:</strong> Alvarez Quiñones
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- VITALS SECTION (Vitals tab) -->
      <section class="vitals-section" id="vitals-section" style="display: none;">
        <h2>Vitals</h2>
        <div class="vitals-grid">
          <!-- Tarjeta 1: Alternate Pressure -->
          <div class="vital-card">
            <div class="vital-header">
              <h3>Alternate Pressure</h3>
              <small>(Last 6 months)</small>
            </div>
            <div class="vital-chart">
              <canvas id="pressureChart"></canvas>
            </div>
          </div>
          <!-- Tarjeta 2: Heart Rate -->
          <div class="vital-card">
            <div class="vital-header">
              <h3>Heart Rate</h3>
              <small>(Last 6 months)</small>
            </div>
            <div class="vital-chart">
              <canvas id="heartRateChart"></canvas>
            </div>
          </div>
          <!-- Tarjeta 3: Weight -->
          <div class="vital-card">
            <div class="vital-header">
              <h3>Weight</h3>
              <small>(Last 6 months)</small>
            </div>
            <div class="vital-chart">
              <canvas id="weightChart"></canvas>
            </div>
          </div>
          <!-- Tarjeta 4: Last Registers -->
          <div class="vital-card registers-card fancy-lastregisters">
            <div class="lastregisters-header">
              <h3>Last Registers</h3>
              <span class="lastregisters-subtitle">Last values</span>
            </div>
            <ul class="vital-registers fancy-registers">
              <li>
                <div class="register-left">
                  <span class="register-bullet" style="background-color: #52c41a;"></span>
                  <span class="register-label">Temperature</span>
                </div>
                <div class="register-value">36.8 °C</div>
              </li>
              <li>
                <div class="register-left">
                  <span class="register-bullet" style="background-color: #fa8c16;"></span>
                  <span class="register-label">Glucose</span>
                </div>
                <div class="register-value">85 mg/dl</div>
              </li>
              <li>
                <div class="register-left">
                  <span class="register-bullet" style="background-color: #1890ff;"></span>
                  <span class="register-label">Oxigenation Saturation</span>
                </div>
                <div class="register-value">98%</div>
              </li>
              <li>
                <div class="register-left">
                  <span class="register-bullet" style="background-color: #722ed1;"></span>
                  <span class="register-label">IMC</span>
                </div>
                <div class="register-value">23.4</div>
              </li>
            </ul>
          </div>
        </div>
      </section>

      <!-- DRUGS SECTION (Drugs tab) -->
      <section class="drugs-section" id="drugs-section" style="display: none;">
        <h2>Current medications</h2>
        <p>List of prescribed medications</p>

        <div class="drug-card">
          <div class="drug-row">
            <div class="drug-left">
              <span class="drug-name">Atorvastatina</span>
              <span class="drug-pill pill-asset">Asset</span>
            </div>
            <div class="drug-date">
              <img src="{{ asset('images_perfil/icon_appoinments_unselected.png') }}" alt="Date Icon" class="drug-date-icon" />
              <span>19/08/2024</span>
            </div>
          </div>
          <div class="drug-details-row">
            <div class="drug-detail">
              <strong>Dose:</strong> 20mg
            </div>
            <div class="drug-detail">
              <strong>Frequency:</strong> what time a day
            </div>
            <div class="drug-detail">
              <strong>Notes:</strong> Take at night
            </div>
          </div>
        </div>

        <div class="drug-card">
          <div class="drug-row">
            <div class="drug-left">
              <span class="drug-name">Atorvastatina</span>
              <span class="drug-pill pill-filled">Filled</span>
            </div>
            <div class="drug-date">
              <img src="{{ asset('images_perfil/icon_appoinments_unselected.png') }}" alt="Date Icon" class="drug-date-icon" />
              <span>19/08/2024</span>
            </div>
          </div>
          <div class="drug-details-row">
            <div class="drug-detail">
              <strong>Dose:</strong> 20mg
            </div>
            <div class="drug-detail">
              <strong>Frequency:</strong> what time a day
            </div>
            <div class="drug-detail">
              <strong>Notes:</strong> Take at night
            </div>
          </div>
        </div>
      </section>

      <!-- APPOINTMENTS SECTION (Appointments tab) -->
      <section class="appointments-section" id="appoinments-section" style="display: none;">
        <h2>Dating history</h2>
        <p>Medical consultation record</p>

        <!-- Tarjeta 1: Routine control (completed) -->
        <div class="appointment-card">
          <div class="appointment-row">
            <div class="appointment-left">
              <span class="appointment-name">Routine control</span>
              <span class="appointment-pill pill-completed">completed</span>
            </div>
            <div class="appointment-date">
              <img src="{{ asset('images_perfil/icon_appoinments_unselected.png') }}" alt="Date Icon" class="appointment-date-icon" />
              <span>19/08/2024</span>
            </div>
          </div>
          <div class="appointment-details-row">
            <div class="appointment-detail">
              <strong>Doctor:</strong> Alaneo Quiñones
            </div>
            <div class="appointment-detail">
              <strong>Specialty:</strong> General medicine
            </div>
          </div>
        </div>

        <!-- Tarjeta 2: Cardiovascular evaluation (Scheduled) -->
        <div class="appointment-card">
          <div class="appointment-row">
            <div class="appointment-left">
              <span class="appointment-name">Cardiovascular evaluation</span>
              <span class="appointment-pill pill-scheduled">Scheduled</span>
            </div>
            <div class="appointment-date">
              <img src="{{ asset('images_perfil/icon_appoinments_unselected.png') }}" alt="Date Icon" class="appointment-date-icon" />
              <span>19/08/2024</span>
            </div>
          </div>
          <div class="appointment-details-row">
            <div class="appointment-detail">
              <strong>Doctor:</strong> Alaneo Quiñones
            </div>
            <div class="appointment-detail">
              <strong>Specialty:</strong> Cardiology
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-left">
      <img src="{{ asset('images_perfil/logo.png') }}" alt="Logo" class="footer-logo" />
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
</body>
</html>
