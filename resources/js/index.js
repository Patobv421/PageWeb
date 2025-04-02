// Funcionalidades del carrito
const btnCart = document.querySelector('.container-cart-icon');
const containerCartProducts = document.querySelector('.container-cart-products');

btnCart.addEventListener('click', () => {
    containerCartProducts.classList.toggle('hidden-cart');
});

const productsList = document.querySelector('.container-items');
const rowProduct = document.querySelector('.row-product');
const totalPagar = document.querySelector('.total-pagar');
const countProducts = document.querySelector('#contador-productos');

let allProducts = JSON.parse(localStorage.getItem('cartProducts')) || [];

productsList.addEventListener('click', e => {
    if (e.target.classList.contains('btn-add-cart')) {
        const product = e.target.closest('.item');
        const infoProduct = {
            quantity: 1,
            title: product.querySelector('h2').textContent,
            price: parseFloat(product.querySelector('.price').textContent.replace('$', '')),
        };

        const exists = allProducts.find(p => p.title === infoProduct.title);
        if (exists) {
            exists.quantity++;
        } else {
            allProducts.push(infoProduct);
        }

        updateCart();
    }
});

rowProduct.addEventListener('click', e => {
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

// Inicializa productos desde localStorage al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    updateCart();
});
document.addEventListener('DOMContentLoaded', () => {
    // ... (tu código existente)

    // Funcionalidad del carrusel
    const slides = document.querySelectorAll('.carrusel-slide');
    const btnPrev = document.querySelector('.carrusel-controls .prev');
    const btnNext = document.querySelector('.carrusel-controls .next');
    let currentIndex = 0;

    // Función para mostrar la diapositiva correspondiente
    function showSlide(index) {
        slides.forEach((slide, i) => {
            // Puedes usar el toggle de la clase "active" o cambiar la opacidad
            slide.classList.toggle('active', i === index);
        });
    }

    // Escucha para botón "prev"
    btnPrev.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        showSlide(currentIndex);
    });

    // Escucha para botón "next"
    btnNext.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    });

    // Cambio automático de diapositivas cada 5 segundos
    setInterval(() => {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }, 5000);

    // Mostrar la primera diapositiva inicialmente
    showSlide(currentIndex);
});


// Guarda productos del carrito en localStorage al actualizar carrito
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

    localStorage.setItem('cartProducts', JSON.stringify(allProducts));
}

/* FUNCIONALIDAD DE FAVORITOS MEJORADA */
let favoriteProducts = JSON.parse(localStorage.getItem('favoriteProducts')) || [];

function updateLocalStorageFavorites() {
    localStorage.setItem('favoriteProducts', JSON.stringify(favoriteProducts));
}

function handleFavoriteClick(event) {
    event.stopPropagation();

    const itemElement = event.currentTarget.closest('.item');
    const titleElement = itemElement.querySelector('.item-title h2') || itemElement.querySelector('h2');
    const title = titleElement.textContent.trim();
    const price = parseFloat(itemElement.querySelector('.price').textContent.replace('$', ''));
    const image = itemElement.querySelector('.item-image img').src;
    const heartIcon = itemElement.querySelector('.heart-icon');

    const index = favoriteProducts.findIndex(product => product.title === title);

    if (index !== -1) {
        favoriteProducts.splice(index, 1);
        heartIcon.classList.remove('favorited');
    } else {
        favoriteProducts.push({ title, price, image });
        heartIcon.classList.add('favorited');
    }

    updateLocalStorageFavorites();
}

function updateLocalStorageFavorites() {
    localStorage.setItem('favoriteProducts', JSON.stringify(favoriteProducts));
}

function bindFavoriteButtons() {
    document.querySelectorAll('.item .heart-icon').forEach(icon => {
        icon.removeEventListener('click', handleFavoriteClick);
        icon.addEventListener('click', handleFavoriteClick);
    });
}

function updateFavoriteIcons() {
    document.querySelectorAll('.item').forEach(item => {
        const titleElement = item.querySelector('.item-title h2') || item.querySelector('h2');
        const title = titleElement.textContent.trim();
        const heartIcon = item.querySelector('.heart-icon');

        if (favoriteProducts.some(product => product.title === title)) {
            heartIcon.classList.add('favorited');
        } else {
            heartIcon.classList.remove('favorited');
        }
    });
}

// Inicializa favoritos y categorías correctamente en todas las páginas
document.addEventListener('DOMContentLoaded', () => {
    updateFavoriteIcons();
    bindFavoriteButtons();

    // CATEGORIES-BUTTONS
    const categoryButtons = document.querySelectorAll('.category-btn');
    const categoryLinks = ['antimicrobials.html','analgesics.html','psychopharmacological.html','cardiovascular.html','gastrointestinal.html','metabolic.html'];
  
    categoryButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            window.location.href = categoryLinks[index];
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Seleccionamos el contenedor de productos (asegúrate de que la clase sea correcta)
    const productsList = document.querySelector('.container-items');
    if (!productsList) return; // Si no existe, salimos
  
    productsList.addEventListener('click', (e) => {
      // Verifica si fue clic en el botón Add to cart
      if (e.target.classList.contains('btn-add-cart')) {
        // Aquí tu lógica existente de añadir al carrito...
        // O simplemente deja que siga tu código actual
        return;
      }
  
      // Si NO es clic en "Add to cart", entonces redirigimos
      const item = e.target.closest('.item');
      if (item) {
        // Entra a la nueva página de detalle
        window.location.href = 'product-detail.html';
      }
    });
  });

  // === FUNCIONALIDAD DE BUSCADOR REAL CON SCROLL ===
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.querySelector('.search-input');
    const searchButton = document.querySelector('.search-btn');
    const itemsContainer = document.querySelector('.container-items');
  
    if (!searchInput || !itemsContainer || !searchButton) return;
  
    const scrollToResults = () => {
      itemsContainer.scrollIntoView({ behavior: 'smooth' });
    };
  
    const filterProducts = () => {
      const searchTerm = searchInput.value.toLowerCase();
      const items = itemsContainer.querySelectorAll('.item');
  
      let hasMatch = false;
      items.forEach(item => {
        const title = item.querySelector('h2')?.textContent.toLowerCase() || '';
        const description = item.querySelector('.description')?.textContent.toLowerCase() || '';
        const match = title.includes(searchTerm) || description.includes(searchTerm);
  
        item.style.display = match ? 'block' : 'none';
        if (match) hasMatch = true;
      });
  
      if (hasMatch) scrollToResults();
    };
  
    // Escucha input dinámico
    searchInput.addEventListener('input', filterProducts);
  
    // Enter desde el teclado
    searchInput.addEventListener('keypress', e => {
      if (e.key === 'Enter') {
        e.preventDefault();
        filterProducts();
      }
    });
  
    // Clic en el botón lupa
    searchButton.addEventListener('click', e => {
      e.preventDefault();
      filterProducts();
    });
  });
  
  document.addEventListener('DOMContentLoaded', () => {
    const btnClearCart = document.getElementById('btn-clear-cart');
    if (btnClearCart) {
      btnClearCart.addEventListener('click', () => {
        allProducts = [];
        localStorage.removeItem('cartProducts');
        updateCart();
      });
    }
  });
  