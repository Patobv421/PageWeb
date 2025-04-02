// Catalogo de productos (usa URLs absolutas o rutas relativas según tus assets en public/)
const productCatalog = {
    "Paracetamol": {
      price: 80,
      image: "https://boticaportugal.com/cdn/shop/products/9342026200_b669a73d-f18b-464c-8f6a-dabc2098cdc7.png?v=1648745438"
    },
    "Loratadina": {
      price: 20,
      image: "https://www.plmconnection.com/plmservices/PharmaSearchEngine/Mexico/DEF/SIDEF/400x400/sanfer_loratadina_10mg_tabs_caja10.png"
    },
    "Naproxen": {
      price: 50,
      image: "https://www.aflofarm.com.pl/media/__sized__/produkt_zdjecia/naproxen-aflofarm-zdjecie-glowne-M2-thumbnail-450x450.png"
    },
    "Iboprufeno": {
      price: 90,
      image: "https://chedrauimx.vtexassets.com/arquivos/ids/36460577-800-auto?v=638628048668400000&width=800&height=auto&aspect=true"
    },
    "Aspirina": {
      price: 50,
      image: "https://www.fahorro.com/media/catalog/product/7/5/7501008491966_4.jpg"
    },
    "Diclofenaco": {
      price: 60,
      // Si tienes la imagen en public/images_shop, puedes usar una ruta relativa:
      image: "/images_shop/Diclofenaco.png"
    }
  };
  
  // Elementos del DOM
  const btnCart = document.querySelector('.container-cart-icon');
  const containerCartProducts = document.querySelector('.container-cart-products');
  const productsList = document.querySelector('.container-items');
  const rowProduct = document.querySelector('.row-product');
  const totalPagar = document.querySelector('.total-pagar');
  const countProducts = document.querySelector('#contador-productos');
  
  // Inicializa el carrito con datos guardados en localStorage (si existen)
  let allProducts = JSON.parse(localStorage.getItem('cartProducts')) || [];
  
  // Función para actualizar el carrito: renderiza productos, totales y guarda en localStorage
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
  
  // Toggle para mostrar/ocultar el carrito
  btnCart.addEventListener('click', () => {
    containerCartProducts.classList.toggle('hidden-cart');
  });
  
  // Agregar producto al carrito
  productsList.addEventListener('click', e => {
    if (e.target.classList.contains('btn-add-cart')) {
      const productElem = e.target.closest('.item');
      const title = productElem.querySelector('h2').textContent.trim();
  
      const infoProduct = {
        quantity: 1,
        title: title,
        price: productCatalog[title]?.price || 0,
        image: productCatalog[title]?.image || ''
      };
  
      // Verifica si el producto ya existe en el carrito
      const exists = allProducts.find(p => p.title === infoProduct.title);
      if (exists) {
        exists.quantity++;
      } else {
        allProducts.push(infoProduct);
      }
  
      updateCart();
    }
  });
  
  // Control de cantidades y eliminación de productos en el carrito
  rowProduct.addEventListener('click', e => {
    if (e.target.classList.contains('btn-plus')) {
      const title = e.target.closest('.cart-product').querySelector('.titulo-producto-carrito').textContent.trim();
      const product = allProducts.find(prod => prod.title === title);
      if (product) {
        product.quantity++;
        updateCart();
      }
    } else if (e.target.classList.contains('btn-minus')) {
      const title = e.target.closest('.cart-product').querySelector('.titulo-producto-carrito').textContent.trim();
      const product = allProducts.find(prod => prod.title === title);
      if (product) {
        product.quantity--;
        if (product.quantity <= 0) {
          allProducts = allProducts.filter(prod => prod.title !== title);
        }
        updateCart();
      }
    } else if (e.target.closest('.icon-close')) {
      const title = e.target.closest('.cart-product').querySelector('.titulo-producto-carrito').textContent.trim();
      allProducts = allProducts.filter(product => product.title !== title);
      updateCart();
    }
  });
  
  // Inicializar el carrito al cargar la página
  document.addEventListener('DOMContentLoaded', () => {
    updateCart();
  });
  
  // --- Funcionalidad del carrusel ---
  document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.carrusel-slide');
    const btnPrev = document.querySelector('.carrusel-controls .prev');
    const btnNext = document.querySelector('.carrusel-controls .next');
    let currentIndex = 0;
  
    const showSlide = (index) => {
      slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === index);
      });
    };
  
    btnPrev.addEventListener('click', () => {
      currentIndex = (currentIndex - 1 + slides.length) % slides.length;
      showSlide(currentIndex);
    });
  
    btnNext.addEventListener('click', () => {
      currentIndex = (currentIndex + 1) % slides.length;
      showSlide(currentIndex);
    });
  
    setInterval(() => {
      currentIndex = (currentIndex + 1) % slides.length;
      showSlide(currentIndex);
    }, 5000);
  
    showSlide(currentIndex);
  });
  
  // --- Funcionalidad de Favoritos ---
  let favoriteProducts = JSON.parse(localStorage.getItem('favoriteProducts')) || [];
  
  function updateLocalStorageFavorites() {
    localStorage.setItem('favoriteProducts', JSON.stringify(favoriteProducts));
  }
  
  function handleFavoriteClick(event) {
    event.stopPropagation();
  
    const itemElem = event.currentTarget.closest('.item');
    const titleElem = itemElem.querySelector('.item-title h2') || itemElem.querySelector('h2');
    const title = titleElem.textContent.trim();
    const price = parseFloat(itemElem.querySelector('.price').textContent.replace('$', ''));
    const image = itemElem.querySelector('.item-image img').src;
    const heartIcon = itemElem.querySelector('.heart-icon');
  
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
  
  function bindFavoriteButtons() {
    document.querySelectorAll('.item .heart-icon').forEach(icon => {
      icon.removeEventListener('click', handleFavoriteClick);
      icon.addEventListener('click', handleFavoriteClick);
    });
  }
  
  function updateFavoriteIcons() {
    document.querySelectorAll('.item').forEach(item => {
      const titleElem = item.querySelector('.item-title h2') || item.querySelector('h2');
      const title = titleElem.textContent.trim();
      const heartIcon = item.querySelector('.heart-icon');
  
      if (favoriteProducts.some(product => product.title === title)) {
        heartIcon.classList.add('favorited');
      } else {
        heartIcon.classList.remove('favorited');
      }
    });
  }
  
  // Inicializa favoritos y enlaza botones una vez cargada la página
  document.addEventListener('DOMContentLoaded', () => {
    updateFavoriteIcons();
    bindFavoriteButtons();
  
    // --- Botones de Categorías ---
    const categoryButtons = document.querySelectorAll('.category-btn');
    const categoryLinks = [
      '/antimicrobials', 
      '/analgesics', 
      '/psychopharmacological', 
      '/cardiovascular', 
      '/gastrointestinal', 
      '/metabolic'
    ];
  
    categoryButtons.forEach((button, index) => {
      button.addEventListener('click', () => {
        window.location.href = categoryLinks[index];
      });
    });
  });
  
  // --- Redirigir a la vista de detalle del producto (si no es clic en Add to cart) ---
  document.addEventListener('DOMContentLoaded', () => {
    const productsList = document.querySelector('.container-items');
    if (!productsList) return;
  
    productsList.addEventListener('click', (e) => {
      if (e.target.classList.contains('btn-add-cart')) return;
      const itemElem = e.target.closest('.item');
      if (itemElem) {
        window.location.href = '/product-detail'; // Ajusta esta ruta según corresponda
      }
    });
  });
  
  // --- Funcionalidad del Buscador ---
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
  
    searchInput.addEventListener('input', filterProducts);
    searchInput.addEventListener('keypress', e => {
      if (e.key === 'Enter') {
        e.preventDefault();
        filterProducts();
      }
    });
    searchButton.addEventListener('click', e => {
      e.preventDefault();
      filterProducts();
    });
  });
  
  // --- Funcionalidad para limpiar el carrito ---
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
  document.addEventListener('DOMContentLoaded', () => {
    const categoryButtons = document.querySelectorAll('.category-btn');
  
    if (categoryButtons.length >= 6) {
      categoryButtons[0].addEventListener('click', () => {
        window.location.href = window.routes.antimicrobials;
      });
      categoryButtons[1].addEventListener('click', () => {
        window.location.href = window.routes.analgesics;
      });
      categoryButtons[2].addEventListener('click', () => {
        window.location.href = window.routes.psychopharmacological;
      });
      categoryButtons[3].addEventListener('click', () => {
        window.location.href = window.routes.cardiovascular;
      });
      categoryButtons[4].addEventListener('click', () => {
        window.location.href = window.routes.gastrointestinal;
      });
      categoryButtons[5].addEventListener('click', () => {
        window.location.href = window.routes.metabolic;
      });
    }
  });