<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HealthSelf - Profile</title>
  {{-- Importa el CSS a través de Vite --}}
  @vite(['resources/css/edit_profile.css'])
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

  <!-- MAIN SECTION -->
  <main class="main-section">
    <div class="content-container">
      <!-- Back Button -->
      <div class="back-button-container">
        <img src="{{ asset('images_perfil/back.png') }}" alt="Back Button" class="back-button" />
      </div>

      <!-- Patient Information Link -->
      <div class="profile-link-container">
        <a href="#" class="profile-link">Patient Information</a>
      </div>

      <!-- GRAY BOX con información del paciente -->
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
        <!-- Botón Accept Appointment -->
        <button class="accept-appointment-button" id="acceptAppointmentBtn">
          Accept Appointment
        </button>
      </section>

      <!-- Recuadro flotante para opciones de Appointment -->
      <div class="appointment-options" id="appointmentOptions">
        <button class="option-btn" onclick="hideOptions()">Back to Information Patient</button>
        <button class="option-btn" onclick="hideOptions()">Back to view more profiles</button>
      </div>

      <!-- MAIN TABS (Review, Vitals, Drugs, Appointments) -->
      <section class="profile-tabs">
        <div class="tab selected" data-tab="review">
          <img src="{{ asset('images_perfil/icon_review_selected.png') }}" alt="Review" />
          <span>Review</span>
        </div>
        <!-- Pestaña Vitals con flecha desplegable -->
        <div class="tab" data-tab="vitals" style="position: relative;">
          <img src="{{ asset('images_perfil/icon_vitals_unselected.png') }}" alt="Vitals" />
          <span>Vitals</span>
          <!-- Botón-flecha -->
          <button class="vitals-arrow-button" id="vitalsArrowBtn">
            <img src="{{ asset('images_perfil/arrow_down_vitals.png') }}" alt="Arrow down" class="arrow-icon" />
          </button>
          <!-- Menú desplegable -->
          <div class="vitals-dropdown" id="vitalsDropdown">
            <div class="dropdown-item" id="vitalsViewOption">View</div>
            <div class="dropdown-item" id="vitalsEditOption">Edit</div>
          </div>
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
                <select id="conditionStatus">
                  <option value="active" selected>Active</option>
                  <option value="inactive">Inactive</option>
                  <option value="completed">Completed</option>
                </select>
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
                <strong>Notes:</strong>
                <textarea id="notesTextarea" rows="2" placeholder="Initial diagnosis. It is predictable." oninput="limitWords(this)"></textarea>
              </div>
            </div>
          </div>
          <button class="save-changes-button">Save Changes</button>
        </div>
        <!-- Laboratory Results content -->
        <div class="diagnostic-content" data-content="labresults" style="display: none;">
          <div class="labresults-card">
            <h2>Laboratory Results</h2>
            <p>Results of your laboratory tests</p>
            <div class="lab-row">
              <div class="lab-condition-info">
                <input type="text" class="lab-condition-text" value="Diabetic" />
                <select class="lab-pill-selector">
                  <option value="normal" selected>Normal</option>
                  <option value="computed">Computed</option>
                  <option value="alert">Alert</option>
                </select>
              </div>
              <div class="lab-notes">
                <strong>Notes:</strong>
                <input type="text" class="lab-notes-input" value="Everything is stable" />
              </div>
              <div class="lab-date">
                <img src="{{ asset('images_perfil/icon_appoinments_unselected.png') }}" alt="Date Icon" class="lab-date-icon" />
                <input type="date" class="lab-date-input" value="2024-08-20" />
              </div>
            </div>
          </div>
          <button class="save-changes-button">Save Changes</button>
        </div>
        <!-- Review content (Editable) -->
        <div class="diagnostic-content" data-content="reviewSub" style="display: none;">
          <div class="review-card">
            <h2>Review</h2>
            <p>You can modify the information below</p>
            <div class="review-row">
              <div class="review-condition-info">
                <input type="text" class="review-condition-text" value="Electrocardiogram" />
                <select class="review-pill-selector">
                  <option value="normal" selected>Normal</option>
                  <option value="regular">Regular</option>
                  <option value="alert">Alert</option>
                </select>
              </div>
              <div class="review-date">
                <img src="{{ asset('images_perfil/icon_appoinments_unselected.png') }}" alt="Date Icon" class="review-date-icon" />
                <input type="date" class="review-date-input" value="2025-03-27" />
              </div>
            </div>
            <div class="review-doctor-row">
              <div class="review-doctor">
                <strong>Doctor:</strong>
                <input type="text" class="review-doctor-input" value="Alvarez Quiñones" />
              </div>
            </div>
            <div class="review-notes-row">
              <div class="review-notes">
                <strong>Notes:</strong>
                <textarea class="review-notes-textarea" rows="2">Initial diagnosis. All good so far.</textarea>
              </div>
            </div>
          </div>
          <button class="save-review-button">Save Changes</button>
        </div>
      </section>

      <!-- VITALS SECTION (Pestaña Vitals) -->
      <section class="vitals-section" id="vitals-section" style="display: none;">
        <!-- Vista de gráficas (View Mode) -->
        <div class="vitals-view-mode" id="vitalsViewMode">
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
        </div>

        <!-- Vista Editable (Edit Mode) -->
        <div class="vitals-edit-mode" id="vitalsEditMode" style="display: none;">
          <h2>Vitals - Edit Mode</h2>
          <div class="vitals-edit-grid">
            <!-- Recuadro 1: Alternate Pressure -->
            <div class="vitals-edit-card">
              <div class="vital-header">
                <h3>Alternate Pressure <small>(Last 6 months)</small></h3>
              </div>
              <div class="edit-inputs-container">
                <label>Jan</label>
                <input type="text" placeholder="Write the parameters of the patient" />
                <label>Feb</label>
                <input type="text" placeholder="Write the parameters of the patient" />
                <label>Mar</label>
                <input type="text" placeholder="Write the parameters of the patient" />
                <label>Apr</label>
                <input type="text" placeholder="Write the parameters of the patient" />
                <label>May</label>
                <input type="text" placeholder="Write the parameters of the patient" />
                <label>Jun</label>
                <input type="text" placeholder="Write the parameters of the patient" />
              </div>
            </div>
            <!-- Recuadro 2: Heart Rate -->
            <div class="vitals-edit-card">
              <div class="vital-header">
                <h3>Heart Rate <small>(Last 6 months)</small></h3>
              </div>
              <div class="edit-inputs-container">
                <label>Jan</label>
                <input type="text" placeholder="Write the parameters" />
                <label>Feb</label>
                <input type="text" placeholder="Write the parameters" />
                <label>Mar</label>
                <input type="text" placeholder="Write the parameters" />
                <label>Apr</label>
                <input type="text" placeholder="Write the parameters" />
                <label>May</label>
                <input type="text" placeholder="Write the parameters" />
                <label>Jun</label>
                <input type="text" placeholder="Write the parameters" />
              </div>
            </div>
            <!-- Recuadro 3: Weight -->
            <div class="vitals-edit-card">
              <div class="vital-header">
                <h3>Weight <small>(Last 6 months)</small></h3>
              </div>
              <div class="edit-inputs-container">
                <label>Jan</label>
                <input type="text" placeholder="Write the parameters" />
                <label>Feb</label>
                <input type="text" placeholder="Write the parameters" />
                <label>Mar</label>
                <input type="text" placeholder="Write the parameters" />
                <label>Apr</label>
                <input type="text" placeholder="Write the parameters" />
                <label>May</label>
                <input type="text" placeholder="Write the parameters" />
                <label>Jun</label>
                <input type="text" placeholder="Write the parameters" />
              </div>
            </div>
            <!-- Recuadro 4: Last Registers -->
            <div class="vitals-edit-card">
              <div class="vital-header">
                <h3>Last Registers <small>(Last values)</small></h3>
              </div>
              <div class="edit-inputs-container">
                <label>Temperature</label>
                <input type="text" placeholder="Write the parameters" />
                <label>Glucose</label>
                <input type="text" placeholder="Write the parameters" />
                <label>Oxygenation Saturation</label>
                <input type="text" placeholder="Write the parameters" />
                <label>IMC</label>
                <input type="text" placeholder="Write the parameters" />
              </div>
            </div>
          </div>
          <button class="save-vitals-changes-button" id="saveVitalsChangesBtn">Save Changes</button>
        </div>
      </section>

      <!-- DRUGS SECTION (Drugs tab) -->
      <section class="drugs-section" id="drugs-section" style="display: none;">
        <h2>Current medications</h2>
        <p>List of prescribed medications</p>

        <!-- Tarjeta 1: Asset / Unasset editable -->
        <div class="drug-card">
          <div class="drug-row">
            <div class="drug-left">
              <span class="drug-name">Atorvastatina</span>
              <select class="drug-pill-selector">
                <option value="asset" selected>Asset</option>
                <option value="unasset">Unasset</option>
              </select>
            </div>
            <div class="drug-date">
              <img src="{{ asset('images_perfil/icon_appoinments_unselected.png') }}" alt="Date Icon" class="drug-date-icon" />
              <input type="date" class="drug-date-input" value="2024-08-19" />
            </div>
          </div>
          <div class="drug-details-row">
            <div class="drug-detail">
              <strong>Dose:</strong>
              <input type="text" class="drug-detail-input" value="20mg" />
            </div>
            <div class="drug-detail">
              <strong>Frequency:</strong>
              <input type="text" class="drug-detail-input" value="what time a day" />
            </div>
            <div class="drug-detail">
              <strong>Notes:</strong>
              <input type="text" class="drug-detail-input" value="Take at night" />
            </div>
          </div>
        </div>

        <!-- Tarjeta 2: Filled / Unfilled editable -->
        <div class="drug-card">
          <div class="drug-row">
            <div class="drug-left">
              <span class="drug-name">Atorvastatina</span>
              <select class="drug-pill-selector">
                <option value="filled" selected>Filled</option>
                <option value="unfilled">Unfilled</option>
              </select>
            </div>
            <div class="drug-date">
              <img src="{{ asset('images_perfil/icon_appoinments_unselected.png') }}" alt="Date Icon" class="drug-date-icon" />
              <input type="date" class="drug-date-input" value="2024-08-19" />
            </div>
          </div>
          <div class="drug-details-row">
            <div class="drug-detail">
              <strong>Dose:</strong>
              <input type="text" class="drug-detail-input" value="20mg" />
            </div>
            <div class="drug-detail">
              <strong>Frequency:</strong>
              <input type="text" class="drug-detail-input" value="what time a day" />
            </div>
            <div class="drug-detail">
              <strong>Notes:</strong>
              <input type="text" class="drug-detail-input" value="Take at night" />
            </div>
          </div>
        </div>
      </section>

      <!-- APPOINTMENTS SECTION (Appointments tab) -->
      <section class="appointments-section" id="appoinments-section" style="display: none;">
        <h2>Dating history</h2>
        <p>Medical consultation record</p>

        <!-- Cita 1: Routine control (completed/incomplete editable) -->
        <div class="appointment-card">
          <div class="appointment-row">
            <div class="appointment-left">
              <span class="appointment-name">Routine control</span>
              <select class="appointment-pill-selector">
                <option value="completed" selected>completed</option>
                <option value="incomplete">incomplete</option>
              </select>
            </div>
            <div class="appointment-date">
              <img src="{{ asset('images_perfil/icon_appoinments_unselected.png') }}" alt="Date Icon" class="appointment-date-icon" />
              <input type="date" class="appointment-date-input" value="2024-08-19" />
            </div>
          </div>
          <div class="appointment-details-row">
            <div class="appointment-detail">
              <strong>Doctor:</strong>
              <input type="text" class="appointment-detail-input" value="Doc. Alaneo Quiñones" />
            </div>
            <div class="appointment-detail">
              <strong>Specialty:</strong>
              <input type="text" class="appointment-detail-input" value="General medicine" />
            </div>
          </div>
        </div>

        <!-- Cita 2: Cardiovascular evaluation (scheduled/unscheduled editable) -->
        <div class="appointment-card">
          <div class="appointment-row">
            <div class="appointment-left">
              <span class="appointment-name">Cardiovascular evaluation</span>
              <select class="appointment-pill-selector">
                <option value="scheduled" selected>scheduled</option>
                <option value="unscheduled">unscheduled</option>
              </select>
            </div>
            <div class="appointment-date">
              <img src="{{ asset('images_perfil/icon_appoinments_unselected.png') }}" alt="Date Icon" class="appointment-date-icon" />
              <input type="date" class="appointment-date-input" value="2024-08-19" />
            </div>
          </div>
          <div class="appointment-details-row">
            <div class="appointment-detail">
              <strong>Doctor:</strong>
              <input type="text" class="appointment-detail-input" value="Doc. Alaneo Quiñones" />
            </div>
            <div class="appointment-detail">
              <strong>Specialty:</strong>
              <input type="text" class="appointment-detail-input" value="Cardiology" />
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-left">
      <img src="{{ asset('images_perfil/logo.png') }}" alt="Logo" class="footer-logo">
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

  <!-- CHART.JS (opcional para Vitals) -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- SCRIPT: Manejo de TABS, limitador de palabras, Appointment Options y menú de Vitals (View/Edit) -->
  <script>
    // Actualiza las rutas de las imágenes en el mapeo, usando rutas absolutas desde el directorio público
    const iconMapping = {
      review: { selected: "/images_perfil/icon_review_selected.png", unselected: "/images_perfil/icon_review_unselected.png" },
      vitals: { selected: "/images_perfil/icon_vitals_selected.png", unselected: "/images_perfil/icon_vitals_unselected.png" },
      drugs: { selected: "/images_perfil/icon_drugs_selected.png", unselected: "/images_perfil/icon_drugs_unselected.png" },
      appoinments: { selected: "/images_perfil/icon_appoinments_selected.png", unselected: "/images_perfil/icon_appoinments_unselected.png" }
    };

    const diagnosticsSection = document.getElementById('diagnostics-section');
    const vitalsSection = document.getElementById('vitals-section');
    const drugsSection = document.getElementById('drugs-section');
    const appointmentsSection = document.getElementById('appoinments-section');

    document.querySelectorAll('.profile-tabs .tab').forEach(tab => {
      tab.addEventListener('click', function() {
        document.querySelectorAll('.profile-tabs .tab').forEach(t => {
          t.classList.remove('selected');
          const tName = t.getAttribute('data-tab');
          const tImg = t.querySelector('img');
          if (iconMapping[tName]) {
            tImg.src = iconMapping[tName].unselected;
          }
        });
        this.classList.add('selected');
        const tabName = this.getAttribute('data-tab');
        const img = this.querySelector('img');
        if (iconMapping[tabName]) {
          img.src = iconMapping[tabName].selected;
        }
        // Ocultar todas las secciones
        diagnosticsSection.style.display = 'none';
        vitalsSection.style.display = 'none';
        drugsSection.style.display = 'none';
        appointmentsSection.style.display = 'none';
        // Mostrar la sección correspondiente
        if (tabName === 'review') {
          diagnosticsSection.style.display = 'block';
        } else if (tabName === 'vitals') {
          vitalsSection.style.display = 'block';
        } else if (tabName === 'drugs') {
          drugsSection.style.display = 'block';
        } else if (tabName === 'appoinments') {
          appointmentsSection.style.display = 'block';
        }
      });
    });

    // SUB-TABS en Diagnostics
    document.querySelectorAll('.diagnostics-tabs .subtab').forEach(subtab => {
      subtab.addEventListener('click', function() {
        document.querySelectorAll('.diagnostics-tabs .subtab').forEach(st => st.classList.remove('selected'));
        this.classList.add('selected');
        const subtabName = this.getAttribute('data-subtab');
        document.querySelectorAll('.diagnostic-content').forEach(content => {
          content.style.display = (content.getAttribute('data-content') === subtabName) ? 'block' : 'none';
        });
      });
    });

    // Función para limitar el textarea a 30 palabras
    function limitWords(textarea) {
      const maxWords = 30;
      let text = textarea.value.trim();
      let words = text.split(/\s+/);
      if (words.length > maxWords) {
        words = words.slice(0, maxWords);
        textarea.value = words.join(" ");
      }
    }

    // Mostrar el recuadro flotante de Appointment Options solo al pulsar Accept Appointment
    const acceptBtn = document.getElementById('acceptAppointmentBtn');
    const appointmentOptions = document.getElementById('appointmentOptions');
    function hideOptions() {
      appointmentOptions.style.display = 'none';
    }
    acceptBtn.addEventListener('click', function() {
      appointmentOptions.style.display = 'block';
    });

    // Inicializar gráficos para Vitals (si existen)
    const ctxPressure = document.getElementById('pressureChart')?.getContext('2d');
    if (ctxPressure) {
      new Chart(ctxPressure, {
        type: 'line',
        data: {
          labels: ['Jan','Feb','Mar','Apr','May','Jun'],
          datasets: [{
            label: 'Alternate Pressure',
            data: [120,125,122,130,128,123],
            borderColor: 'green',
            backgroundColor: 'rgba(0,200,179,0.1)',
            fill: true,
          }]
        },
        options: { responsive: true, maintainAspectRatio: false }
      });
    }
    const ctxHeart = document.getElementById('heartRateChart')?.getContext('2d');
    if (ctxHeart) {
      new Chart(ctxHeart, {
        type: 'line',
        data: {
          labels: ['Jan','Feb','Mar','Apr','May','Jun'],
          datasets: [{
            label: 'Heart Rate',
            data: [72,75,70,73,74,72],
            borderColor: 'red',
            backgroundColor: 'rgba(255,0,0,0.1)',
            fill: true,
          }]
        },
        options: { responsive: true, maintainAspectRatio: false }
      });
    }
    const ctxWeight = document.getElementById('weightChart')?.getContext('2d');
    if (ctxWeight) {
      new Chart(ctxWeight, {
        type: 'line',
        data: {
          labels: ['Jan','Feb','Mar','Apr','May','Jun'],
          datasets: [{
            label: 'Weight',
            data: [75,74.5,75,74,73.5,74],
            borderColor: 'blue',
            backgroundColor: 'rgba(0,0,255,0.1)',
            fill: true,
          }]
        },
        options: { responsive: true, maintainAspectRatio: false }
      });
    }

    // Mostrar la sección activa al cargar la página según el tab seleccionado
    window.addEventListener('DOMContentLoaded', () => {
      const selectedMainTab = document.querySelector('.profile-tabs .tab.selected');
      if (selectedMainTab) {
        const tabName = selectedMainTab.getAttribute('data-tab');
        if (tabName === 'review') {
          diagnosticsSection.style.display = 'block';
        } else if (tabName === 'vitals') {
          vitalsSection.style.display = 'block';
        } else if (tabName === 'drugs') {
          drugsSection.style.display = 'block';
        } else if (tabName === 'appoinments') {
          appointmentsSection.style.display = 'block';
        }
      }
    });

    /* ===================== NUEVAS FUNCIONALIDADES PARA VITALS (View/Edit) ===================== */
    const vitalsArrowBtn = document.getElementById('vitalsArrowBtn');
    const vitalsDropdown = document.getElementById('vitalsDropdown');
    const vitalsViewOption = document.getElementById('vitalsViewOption');
    const vitalsEditOption = document.getElementById('vitalsEditOption');
    const vitalsViewMode = document.getElementById('vitalsViewMode');
    const vitalsEditMode = document.getElementById('vitalsEditMode');
    const saveVitalsBtn = document.getElementById('saveVitalsChangesBtn');

    // Mostrar/ocultar el menú de Vitals al pulsar la flecha
    vitalsArrowBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      vitalsDropdown.style.display = (vitalsDropdown.style.display === 'block') ? 'none' : 'block';
    });

    // Al pulsar "View" en Vitals
    if(vitalsViewOption) {
      vitalsViewOption.addEventListener('click', () => {
        vitalsViewMode.style.display = 'block';
        vitalsEditMode.style.display = 'none';
        vitalsDropdown.style.display = 'none';
      });
    }

    // Al pulsar "Edit" en Vitals
    vitalsEditOption.addEventListener('click', () => {
      vitalsViewMode.style.display = 'none';
      vitalsEditMode.style.display = 'block';
      vitalsDropdown.style.display = 'none';
    });

    // Cerrar menú de Vitals si se hace clic fuera
    document.addEventListener('click', function(event) {
      if (!vitalsDropdown.contains(event.target) && !vitalsArrowBtn.contains(event.target)) {
        vitalsDropdown.style.display = 'none';
      }
    });

    // Al pulsar "Save Changes" en Vitals (Edit Mode)
    saveVitalsBtn.addEventListener('click', function() {
      alert('Vitals changes saved (simulated). Returning to View mode...');
      vitalsViewMode.style.display = 'block';
      vitalsEditMode.style.display = 'none';
    });
  </script>
</body>
</html>
