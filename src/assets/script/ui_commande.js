const buyButtons = document.querySelectorAll('.btn.btn-primary.buy');
const soloCommande = document.getElementById("solo_part");
const menuCommande = document.getElementById("menu_part");
buyButtons.forEach(button => {
    buyButtonsFunc(button);
});

function buyButtonsFunc(button) {
    button.addEventListener('click', () => {
        onClickBuy(button);
    });
}
function onClickBuy(button) {
    const name = button.parentElement.parentElement.querySelector('.name').textContent;
    const price = button.parentElement.parentElement.querySelector('.price').textContent.replace('€', '').trim();
    if (button.classList.contains('menu_commande')) {
        document.getElementById("menu_or_not").showModal();
        soloCommande.onclick = () => {
            document.getElementById("menu_or_not").close();
            addItem({"name": name, "price": parseFloat(price)});
            document.getElementById('cart_number_item').textContent = CartManager.getNumberInCart();
        }
        menuCommande.onClick = () => {
            document.getElementById("menu_or_not").close();
            newMenu(name, parseFloat(price));
        }
    } else {
        addItem({"name": name, "price": parseFloat(price)});
        document.getElementById('cart_number_item').textContent = CartManager.getNumberInCart();
    }


    //const name = button.parentElement.parentElement.querySelector('.name').textContent;
    //const price = button.parentElement.parentElement.querySelector('.price').textContent.replace('€', '').trim();
    //let quantity = 1;
    //if (CartManager.hasItem(name)) {
    //    const item = CartManager.getItem(name);
    //    quantity += item.quantity;
    //    CartManager.removeItem(name);
    //}
    //const item = {
    //    name: name,
    //    price: parseFloat(price),
    //    quantity: quantity
    //};
    //CartManager.addItem(item);
    //document.getElementById('cart_number_item').textContent = CartManager.getNumberInCart();µ
}


function addItem(json) {
    let quantity = 1;
    let cartItem = {
        item: json,
        quantity: quantity
    }
    if (CartManager.hasItem(json)) {
        cartItem = CartManager.getItem(json);
        quantity += cartItem.quantity;
        CartManager.removeItem(json);
    }
    cartItem.quantity = quantity;
    CartManager.addItem(cartItem);
    document.getElementById('cart_number_item').textContent = CartManager.getNumberInCart();
}

const MenuManager = {
    menu: [],
    loadMenu: (jsonMenu) => {
        try {
            MenuManager.menu = JSON.parse(jsonMenu);
        } catch (error) {
            console.error("Invalid JSON format:", error);
        }
    },
    getMenu: () => {
        return MenuManager.menu;
    },

    addItem: (item) => {
        MenuManager.menu.push(item);
    },

    removeItem: (itemName) => {
        MenuManager.menu = MenuManager.menu.filter(item => item.name !== itemName);
    },

    findItem: (itemName) => {
        return MenuManager.menu.find(item => item.name === itemName) || null;
    }
};


function newMenu(name, price) {
}
document.addEventListener('DOMContentLoaded', () => {
    const filterBtns = document.querySelector('.filterBtns');
    if (filterBtns && filterBtns.children) {
        Array.from(filterBtns.children).forEach(btn => {
            btn.addEventListener('click', () => {
                Array.from(filterBtns.children).forEach(btn => btn.classList.remove('btn-primary'));
                btn.classList.add('btn-primary');
                const filter = btn.getAttribute('data-filter');
                filterFunc(btn.textContent.toLowerCase());
            });
        });
    }
});
function filterFunc(filter) {
    if (filter === 'all') {
        Array.from(document.querySelector('.food_commande').children).forEach(item => {
            item.style.display = 'block';
        });
    } else {
        Array.from(document.querySelector('.food_commande').children).forEach(item => {
            console.log(item.id + " " + filter + '_part');
            if (item.id == filter + '_part') {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
}