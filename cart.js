// كود تجريبي لتعبئة السلة
document.addEventListener("DOMContentLoaded", function () {
    
  
    const cartContainer = document.getElementById("cart-items");
    const totalPriceEl = document.getElementById("total-price");
  
    let total = 0;
  
    cartItems.forEach(item => {
      const itemEl = document.createElement("div");
      itemEl.classList.add("cart-item");
      itemEl.innerHTML = `
        <p>${item.name}</p>
        <p>${item.price} ج.م</p>
      `;
      cartContainer.appendChild(itemEl);
      total += item.price;
    });
  
    totalPriceEl.textContent = total;
  });
  