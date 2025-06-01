// Gestionnaire de cookies
const CookieManager = {
    setCookie: (name, value, days) => {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = `${name}=${encodeURIComponent(value)};expires=${date.toUTCString()};path=/`;
    },
    getCookie: (name) => {
        const cookies = document.cookie.split('; ');
        for (let cookie of cookies) {
            const [key, value] = cookie.split('=');
            if (key === name) {
                return decodeURIComponent(value);
            }
        }
        return null;
    },
    deleteCookie: (name) => {
        document.cookie = `${name}=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/`;
    }
};

// Gestion du caddie
const CartManager = {
    addItem: (item) => {
        let cart = JSON.parse(CookieManager.getCookie('cart') || '[]');
        cart.push(item);
        CookieManager.setCookie('cart', JSON.stringify(cart), 7);
    },
    getCart: () => {
        return JSON.parse(CookieManager.getCookie('cart') || '[]');
    },
    hasItem: (itemName) => {
        let cart = JSON.parse(CookieManager.getCookie('cart') || '[]');
        return cart.some(item => item.name === itemName);
    },
    removeItem(itemName) {
        let cart = JSON.parse(CookieManager.getCookie('cart') || '[]');
        cart = cart.filter(item => item.name !== itemName);
        CookieManager.setCookie('cart', JSON.stringify(cart), 7);
    },
    getItem(itemName) {
        let cart = JSON.parse(CookieManager.getCookie('cart') || '[]');
        return cart.find(item => item.name === itemName) || null;
    },
    getNumberInCart: () => {
        let cart = JSON.parse(CookieManager.getCookie('cart') || '[]');
        return cart.reduce((total, item) => total + item.quantity, 0);
    },
    clearCart: () => {
        CookieManager.deleteCookie('cart');
    }
};


// Gestion des paramètres utilisateurs
const UserSettingsManager = {
    setSetting: (key, value) => {
        let settings = JSON.parse(CookieManager.getCookie('userSettings') || '{}');
        settings[key] = value;
        CookieManager.setCookie('userSettings', JSON.stringify(settings), 30);
    },
    getSetting: (key) => {
        let settings = JSON.parse(CookieManager.getCookie('userSettings') || '{}');
        return settings[key] || null;
    },
    clearSettings: () => {
        CookieManager.deleteCookie('userSettings');
    }
};