<!-- Choix des produits jusqu'a la validation de la commande -->
<!-- Choix du restaurants -->
<!-- Choix sur place / emporter / autre -->
<!-- Choix de la date et de l'heure a laquelle on retire la commande -->
<!-- Choix du mode de paiement -->


<?php
$conn = getConn();
?>


<div class="W-full px-4 py-4 overflow-y-auto">
    <div
            class="hero w-full"
            style="background-image: url(/assets/img/delivery/promotion.jpg);"
    >
        <div class="hero-overlay"></div>
        <div class="hero-content text-neutral-content text-center">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">Delicious Dishes, Delivered Fast</h1>
                <p class="mb-5">
                    Explore our extensive menu crafted with fresh, high-quality
                    ingredients.
                </p>
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col pt-4">
        <div class="flex flex-row">
            <button class="btn btn-primary mx-2">All</button>
            <button class="btn mx-2">Pizza</button>
            <button class="btn mx-2">Kebab</button>
            <button class="btn mx-2">Boisson</button>
            <button class="btn mx-2">Dessert</button>
            <button class="btn mx-2">Accompagnements</button>
        </div>
        <div class="divider"></div>
        <div class="flex flex-col">
            <div class="my-2" id="pizza_part">
                <h1 class="bold text-3xl">Pizza</h1>
                <div  class="flex flex-row flex-nowrap overflow-x-auto mt-2" style="scrollbar-width: none; -ms-overflow-style: none;">
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/PMAR/FR_PMAR_fr_hero_13359.png?v-536408585"
                                    alt="Pizza Margherita" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Margherita</h2>
                            <p>Sauce tomate, mozzarella, basilic frais. Simple et emblématique de l’Italie.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/PREI/FR_PREI_fr_hero_13359.png?v441182280"
                                    alt="Pizza Reine" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Reine</h2>
                            <p>Sauce tomate, mozzarella, jambon, champignons. Une des plus populaires en France.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/P4FR/FR_P4FR_fr_hero_13347.png?v1737304999"
                                    alt="Pizza Quatre Fromages" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Quatre Fromages</h2>
                            <p>Mélange de fromages comme mozzarella, gorgonzola, chèvre et emmental. Crémeuse et gourmande.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTB4UlzWXutwrIQgpv6GH1Nr-Bwh-7EQ_oDRA&s"
                                    alt="Pizza Napolitaine" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Napolitaine</h2>
                            <p>Sauce tomate, mozzarella, anchois, câpres, olives. Une pizza au goût prononcé et salé.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/media/isenimwt/fr_ecabsp_fr_hero_9878.png?width=800&upscale=false&animationprocessmode=false"
                                    alt="Pizza Calzone" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Calzone</h2>
                            <p>Pizza repliée en chausson, généralement garnie de jambon, fromage, et champignons.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/PHAP/FR_PHAP_fr_hero_13359.png?v504036970"
                                    alt="Pizza Hawaïenne" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Hawaïenne</h2>
                            <p>Sauce tomate, mozzarella, jambon, ananas. Sucrée-salée et controversée !</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.lu/ManagedAssets/LU/product/PDIA/LU_PDIA_all_hero_7548.jpg?v364412031"
                                    alt="Pizza Diavola" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Diavola</h2>
                            <p>Sauce tomate, mozzarella, salami piquant (type chorizo). Épicée et savoureuse.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.be/ManagedAssets/BE/product/P4SA/BE_P4SA_all_hero_9585.jpg?v-347264165"
                                    alt="Pizza Quatre Saisons" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Quatre Saisons</h2>
                            <p>Pizza divisée en quatre parties : jambon, artichauts, champignons, olives. Chaque quart représente une saison.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.be/ManagedAssets/BE/product/PVEG/BE_PVEG_all_hero_9585.jpg?v-909229252"
                                    alt="Pizza Végétarienne" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Végétarienne</h2>
                            <p> Sauce tomate, mozzarella, assortiment de légumes grillés ou frais : poivrons, courgettes, aubergines…</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYk37PxnPv5MNMltbwe05dubsQUnR94PJdOQ&s"
                                    alt="Shoes" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Capricciosa</h2>
                            <p> Sauce tomate, mozzarella, jambon, champignons, artichauts, olives. Une variante riche et généreuse de la Reine.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-2" id="kebab_part">
                <h1 class="bold text-3xl">Kebab</h1>
                <div  class="flex flex-row flex-nowrap overflow-x-auto mt-2" style="scrollbar-width: none; -ms-overflow-style: none;">
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/PMAR/FR_PMAR_fr_hero_13359.png?v-536408585"
                                    alt="Pizza Margherita" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Margherita</h2>
                            <p>Sauce tomate, mozzarella, basilic frais. Simple et emblématique de l’Italie.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/PREI/FR_PREI_fr_hero_13359.png?v441182280"
                                    alt="Pizza Reine" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Reine</h2>
                            <p>Sauce tomate, mozzarella, jambon, champignons. Une des plus populaires en France.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/P4FR/FR_P4FR_fr_hero_13347.png?v1737304999"
                                    alt="Pizza Quatre Fromages" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Quatre Fromages</h2>
                            <p>Mélange de fromages comme mozzarella, gorgonzola, chèvre et emmental. Crémeuse et gourmande.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTB4UlzWXutwrIQgpv6GH1Nr-Bwh-7EQ_oDRA&s"
                                    alt="Pizza Napolitaine" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Napolitaine</h2>
                            <p>Sauce tomate, mozzarella, anchois, câpres, olives. Une pizza au goût prononcé et salé.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/media/isenimwt/fr_ecabsp_fr_hero_9878.png?width=800&upscale=false&animationprocessmode=false"
                                    alt="Pizza Calzone" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Calzone</h2>
                            <p>Pizza repliée en chausson, généralement garnie de jambon, fromage, et champignons.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/PHAP/FR_PHAP_fr_hero_13359.png?v504036970"
                                    alt="Pizza Hawaïenne" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Hawaïenne</h2>
                            <p>Sauce tomate, mozzarella, jambon, ananas. Sucrée-salée et controversée !</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.lu/ManagedAssets/LU/product/PDIA/LU_PDIA_all_hero_7548.jpg?v364412031"
                                    alt="Pizza Diavola" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Diavola</h2>
                            <p>Sauce tomate, mozzarella, salami piquant (type chorizo). Épicée et savoureuse.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.be/ManagedAssets/BE/product/P4SA/BE_P4SA_all_hero_9585.jpg?v-347264165"
                                    alt="Pizza Quatre Saisons" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Quatre Saisons</h2>
                            <p>Pizza divisée en quatre parties : jambon, artichauts, champignons, olives. Chaque quart représente une saison.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.be/ManagedAssets/BE/product/PVEG/BE_PVEG_all_hero_9585.jpg?v-909229252"
                                    alt="Pizza Végétarienne" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Végétarienne</h2>
                            <p> Sauce tomate, mozzarella, assortiment de légumes grillés ou frais : poivrons, courgettes, aubergines…</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYk37PxnPv5MNMltbwe05dubsQUnR94PJdOQ&s"
                                    alt="Shoes" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Capricciosa</h2>
                            <p> Sauce tomate, mozzarella, jambon, champignons, artichauts, olives. Une variante riche et généreuse de la Reine.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-2" id="boisson_part">
                <h1 class="bold text-3xl">Boisson</h1>
                <div  class="flex flex-row flex-nowrap overflow-x-auto mt-2" style="scrollbar-width: none; -ms-overflow-style: none;">
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/PMAR/FR_PMAR_fr_hero_13359.png?v-536408585"
                                    alt="Pizza Margherita" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Margherita</h2>
                            <p>Sauce tomate, mozzarella, basilic frais. Simple et emblématique de l’Italie.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/PREI/FR_PREI_fr_hero_13359.png?v441182280"
                                    alt="Pizza Reine" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Reine</h2>
                            <p>Sauce tomate, mozzarella, jambon, champignons. Une des plus populaires en France.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/P4FR/FR_P4FR_fr_hero_13347.png?v1737304999"
                                    alt="Pizza Quatre Fromages" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Quatre Fromages</h2>
                            <p>Mélange de fromages comme mozzarella, gorgonzola, chèvre et emmental. Crémeuse et gourmande.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTB4UlzWXutwrIQgpv6GH1Nr-Bwh-7EQ_oDRA&s"
                                    alt="Pizza Napolitaine" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Napolitaine</h2>
                            <p>Sauce tomate, mozzarella, anchois, câpres, olives. Une pizza au goût prononcé et salé.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/media/isenimwt/fr_ecabsp_fr_hero_9878.png?width=800&upscale=false&animationprocessmode=false"
                                    alt="Pizza Calzone" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Calzone</h2>
                            <p>Pizza repliée en chausson, généralement garnie de jambon, fromage, et champignons.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/PHAP/FR_PHAP_fr_hero_13359.png?v504036970"
                                    alt="Pizza Hawaïenne" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Hawaïenne</h2>
                            <p>Sauce tomate, mozzarella, jambon, ananas. Sucrée-salée et controversée !</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.lu/ManagedAssets/LU/product/PDIA/LU_PDIA_all_hero_7548.jpg?v364412031"
                                    alt="Pizza Diavola" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Diavola</h2>
                            <p>Sauce tomate, mozzarella, salami piquant (type chorizo). Épicée et savoureuse.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.be/ManagedAssets/BE/product/P4SA/BE_P4SA_all_hero_9585.jpg?v-347264165"
                                    alt="Pizza Quatre Saisons" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Quatre Saisons</h2>
                            <p>Pizza divisée en quatre parties : jambon, artichauts, champignons, olives. Chaque quart représente une saison.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.be/ManagedAssets/BE/product/PVEG/BE_PVEG_all_hero_9585.jpg?v-909229252"
                                    alt="Pizza Végétarienne" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Végétarienne</h2>
                            <p> Sauce tomate, mozzarella, assortiment de légumes grillés ou frais : poivrons, courgettes, aubergines…</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYk37PxnPv5MNMltbwe05dubsQUnR94PJdOQ&s"
                                    alt="Shoes" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Capricciosa</h2>
                            <p> Sauce tomate, mozzarella, jambon, champignons, artichauts, olives. Une variante riche et généreuse de la Reine.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-2" id="dessert_part">
                <h1 class="bold text-3xl">Dessert</h1>
                <div  class="flex flex-row flex-nowrap overflow-x-auto mt-2" style="scrollbar-width: none; -ms-overflow-style: none;">
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/PMAR/FR_PMAR_fr_hero_13359.png?v-536408585"
                                    alt="Pizza Margherita" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Margherita</h2>
                            <p>Sauce tomate, mozzarella, basilic frais. Simple et emblématique de l’Italie.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/PREI/FR_PREI_fr_hero_13359.png?v441182280"
                                    alt="Pizza Reine" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Reine</h2>
                            <p>Sauce tomate, mozzarella, jambon, champignons. Une des plus populaires en France.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/P4FR/FR_P4FR_fr_hero_13347.png?v1737304999"
                                    alt="Pizza Quatre Fromages" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Quatre Fromages</h2>
                            <p>Mélange de fromages comme mozzarella, gorgonzola, chèvre et emmental. Crémeuse et gourmande.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTB4UlzWXutwrIQgpv6GH1Nr-Bwh-7EQ_oDRA&s"
                                    alt="Pizza Napolitaine" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Napolitaine</h2>
                            <p>Sauce tomate, mozzarella, anchois, câpres, olives. Une pizza au goût prononcé et salé.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/media/isenimwt/fr_ecabsp_fr_hero_9878.png?width=800&upscale=false&animationprocessmode=false"
                                    alt="Pizza Calzone" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Calzone</h2>
                            <p>Pizza repliée en chausson, généralement garnie de jambon, fromage, et champignons.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/PHAP/FR_PHAP_fr_hero_13359.png?v504036970"
                                    alt="Pizza Hawaïenne" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Hawaïenne</h2>
                            <p>Sauce tomate, mozzarella, jambon, ananas. Sucrée-salée et controversée !</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.lu/ManagedAssets/LU/product/PDIA/LU_PDIA_all_hero_7548.jpg?v364412031"
                                    alt="Pizza Diavola" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Diavola</h2>
                            <p>Sauce tomate, mozzarella, salami piquant (type chorizo). Épicée et savoureuse.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.be/ManagedAssets/BE/product/P4SA/BE_P4SA_all_hero_9585.jpg?v-347264165"
                                    alt="Pizza Quatre Saisons" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Quatre Saisons</h2>
                            <p>Pizza divisée en quatre parties : jambon, artichauts, champignons, olives. Chaque quart représente une saison.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.be/ManagedAssets/BE/product/PVEG/BE_PVEG_all_hero_9585.jpg?v-909229252"
                                    alt="Pizza Végétarienne" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Végétarienne</h2>
                            <p> Sauce tomate, mozzarella, assortiment de légumes grillés ou frais : poivrons, courgettes, aubergines…</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYk37PxnPv5MNMltbwe05dubsQUnR94PJdOQ&s"
                                    alt="Shoes" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Capricciosa</h2>
                            <p> Sauce tomate, mozzarella, jambon, champignons, artichauts, olives. Une variante riche et généreuse de la Reine.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-2" id="accompagnements_part">
                <h1 class="bold text-3xl">Accompagnements</h1>
                <div  class="flex flex-row flex-nowrap overflow-x-auto mt-2" style="scrollbar-width: none; -ms-overflow-style: none;">
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/PMAR/FR_PMAR_fr_hero_13359.png?v-536408585"
                                    alt="Pizza Margherita" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Margherita</h2>
                            <p>Sauce tomate, mozzarella, basilic frais. Simple et emblématique de l’Italie.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/PREI/FR_PREI_fr_hero_13359.png?v441182280"
                                    alt="Pizza Reine" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Reine</h2>
                            <p>Sauce tomate, mozzarella, jambon, champignons. Une des plus populaires en France.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/P4FR/FR_P4FR_fr_hero_13347.png?v1737304999"
                                    alt="Pizza Quatre Fromages" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Quatre Fromages</h2>
                            <p>Mélange de fromages comme mozzarella, gorgonzola, chèvre et emmental. Crémeuse et gourmande.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTB4UlzWXutwrIQgpv6GH1Nr-Bwh-7EQ_oDRA&s"
                                    alt="Pizza Napolitaine" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Napolitaine</h2>
                            <p>Sauce tomate, mozzarella, anchois, câpres, olives. Une pizza au goût prononcé et salé.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/media/isenimwt/fr_ecabsp_fr_hero_9878.png?width=800&upscale=false&animationprocessmode=false"
                                    alt="Pizza Calzone" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Calzone</h2>
                            <p>Pizza repliée en chausson, généralement garnie de jambon, fromage, et champignons.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.fr/ManagedAssets/FR/product/PHAP/FR_PHAP_fr_hero_13359.png?v504036970"
                                    alt="Pizza Hawaïenne" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Hawaïenne</h2>
                            <p>Sauce tomate, mozzarella, jambon, ananas. Sucrée-salée et controversée !</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.lu/ManagedAssets/LU/product/PDIA/LU_PDIA_all_hero_7548.jpg?v364412031"
                                    alt="Pizza Diavola" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Diavola</h2>
                            <p>Sauce tomate, mozzarella, salami piquant (type chorizo). Épicée et savoureuse.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.be/ManagedAssets/BE/product/P4SA/BE_P4SA_all_hero_9585.jpg?v-347264165"
                                    alt="Pizza Quatre Saisons" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Quatre Saisons</h2>
                            <p>Pizza divisée en quatre parties : jambon, artichauts, champignons, olives. Chaque quart représente une saison.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://www.dominos.be/ManagedAssets/BE/product/PVEG/BE_PVEG_all_hero_9585.jpg?v-909229252"
                                    alt="Pizza Végétarienne" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Végétarienne</h2>
                            <p> Sauce tomate, mozzarella, assortiment de légumes grillés ou frais : poivrons, courgettes, aubergines…</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-base-100 min-w-96 shadow-sm mx-4">
                        <figure>
                            <img
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYk37PxnPv5MNMltbwe05dubsQUnR94PJdOQ&s"
                                    alt="Shoes" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title name">Pizza Capricciosa</h2>
                            <p> Sauce tomate, mozzarella, jambon, champignons, artichauts, olives. Une variante riche et généreuse de la Reine.</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">15.00€</p>
                                <button class="btn btn-primary buy">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/assets/script/ui_commande.js"></script>
