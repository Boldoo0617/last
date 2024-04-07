let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('active');
    
}

window.onscroll = () => {
    menu.classList.rmeove('bx-x');
    navbar.classList.remove('active');
    
}


document.addEventListener("DOMContentLoaded", function() {
    fetchProducts();
  });
  
  function fetchProducts() {
    fetch("get_products.php")
      .then(response => response.json())
      .then(products => {
        const productContainer = document.getElementById("product-container");
        products.forEach(product => {
          const productCard = createProductCard(product);
          productContainer.appendChild(productCard);
        });
      })
      .catch(error => {
        console.error("Error fetching products:", error);
      });
  }



  function createProductCard(product) {
    const card = document.createElement("div");
    card.classList.add("box");
  
    const name = document.createElement("h4");
    name.textContent = product.name;
    card.appendChild(name);
    
    const img = document.createElement("img");
    img.src = product.image;
    img.alt = product.name;
    card.appendChild(img);
  
    const price = document.createElement("h5");
    price.textContent = "$" + product.price;
    card.appendChild(price);
  
    const about = document.createElement("span");
    about.textContent = product.about;
    card.appendChild(about);

// ded heseg


    const cartDiv = document.createElement("div");
    cartDiv.classList.add("cart");

    // Create an anchor element for cart icon
    const cartAnchor = document.createElement("a");
    cartAnchor.href = "#";
    
    // Create an icon element for cart
    const iconElement = document.createElement("i");
    iconElement.classList.add("bx", "bx-cart");
    
    cartAnchor.appendChild(iconElement);
    cartDiv.appendChild(cartAnchor);

    card.appendChild(cartDiv);
    return card;
  }
  