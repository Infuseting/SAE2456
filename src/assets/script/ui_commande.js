const buyButtons = document.querySelectorAll('.btn.btn-primary.buy');

buyButtons.forEach(button => {
    buyButtonsFunc(button);
});

function buyButtonsFunc(button) {
    const name = button.parentElement.parentElement.querySelector('.name').textContent;
    if (CartManager.hasItem(name)) {
        const item = CartManager.getItem(name);
        const parent = button.parentElement;
        button.remove();
        parent.innerHTML += `
            <div class="btn-group flex flex-row">
                <button class="btn btn-error remove-from-cart mx-1">-</button>
                <input type="text" class="input w-10 h-10 px-1" />
                <button class="btn btn-success add-to-cart mx-1">+</button>
            </div>`;
        const input = parent.querySelector('input');
        input.value = item.quantity;
        input.addEventListener('change', () => {
            if (input.value < 1) {
                const el = parent.querySelector('.btn-group')
                el.remove();
                parent.innerHTML += `<button onclick="buyButtons(this)" class="btn btn-primary buy">Buy Now</button>`;
                CartManager.removeItem(name);
                buyButtonsFunc(parent.querySelector('.btn.btn-primary.buy'));
            }
            item.quantity = parseInt(input.value);
            CartManager.removeItem(name);
            CartManager.addItem(item);
            document.getElementById('cart_number_item').textContent = CartManager.getNumberInCart();
        });
        parent.querySelector('.add-to-cart').addEventListener('click', () => {
            input.value = parseInt(input.value) + 1;
            item.quantity = parseInt(input.value);
            CartManager.removeItem(name);
            CartManager.addItem(item);
            document.getElementById('cart_number_item').textContent = CartManager.getNumberInCart();
        });
        parent.querySelector('.remove-from-cart').addEventListener('click', () => {
            input.value = parseInt(input.value) - 1;
            if (input.value < 1) {
                const el = parent.querySelector('.btn-group')
                el.remove();
                parent.innerHTML += `<button class="btn btn-primary buy">Buy Now</button>`;
                CartManager.removeItem(name);
                buyButtonsFunc(parent.querySelector('.btn.btn-primary.buy'));
                document.getElementById('cart_number_item').textContent = CartManager.getNumberInCart();
            } else {
                item.quantity = parseInt(input.value);
                CartManager.removeItem(name);
                CartManager.addItem(item);
                document.getElementById('cart_number_item').textContent = CartManager.getNumberInCart();
            }
        });

    }
    button.addEventListener('click', () => {
        onClickBuy(button);
    });
}
function onClickBuy(button) {
    const name = button.parentElement.parentElement.querySelector('.name').textContent;
    const price = button.parentElement.parentElement.querySelector('.price').textContent.replace('€', '').trim();
    let quantity = 1;
    if (CartManager.hasItem(name)) {
        const item = CartManager.getItem(name);
        quantity += item.quantity;
        CartManager.removeItem(name);
    }
    const item = {
        name: name,
        price: parseFloat(price),
        quantity: quantity
    };
    CartManager.addItem(item);
    document.getElementById('cart_number_item').textContent = CartManager.getNumberInCart();
    buyButtonsFunc(button);
}
