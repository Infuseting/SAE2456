<!-- Choix des produits jusqu'a la validation de la commande -->
<!-- Choix du restaurants -->
<!-- Choix sur place / emporter / autre -->
<!-- Choix du restaurant -->
<!-- Choix de la date et de l'heure a laquelle on retire la commande -->
<!-- Choix du mode de paiement -->



<?php
$conn = getConn();
?>



<div class="grid grid-cols-5 grid-rows-5 gap-4 h-screen w-screen">
    <div class="row-span-4 flex flex-start flex-col flex-nowrap overflow-y-auto">
        <div class="mx-14 my-8">
            <div id="menu_part" class="selector_commande hover:bg-base-200 card bg-base-100 shadow-sm">
                <figure class="px-10 pt-10">
                    <img
                            src="/assets/img/menu_part.png"
                            alt="Menu"
                            class="rounded-xl" />
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">Nos Menu</h2>
                </div>
            </div>
        </div>
        <div class="mx-14 my-8">
            <div id="kebab_part" class="selector_commande hover:bg-base-200 card bg-base-100 shadow-sm">
                <figure class="px-10 pt-10">
                    <img
                            src="/assets/img/kebab_part.png"
                            alt="Menu"
                            class="rounded-xl" />
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">Nos Kebab</h2>
                </div>
            </div>
        </div>
        <div class="mx-14 my-8">
            <div id="pizza_part" class="selector_commande hover:bg-base-200 card bg-base-100 shadow-sm">
                <figure class="px-10 pt-10">
                    <img
                            src="/assets/img/pizza_part.png"
                            alt="Menu"
                            class="rounded-xl" />
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">Nos Pizza</h2>
                </div>
            </div>
        </div>
        <div class="mx-14 my-8">
            <div id="accompagnements_part" class="selector_commande hover:bg-base-200 card bg-base-100 shadow-sm">
                <figure class="px-10 pt-10">
                    <img
                            src="/assets/img/accompagnements_part.png"
                            alt="Menu"
                            class="rounded-xl" />
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">Nos Accompagnements</h2>
                </div>
            </div>
        </div>
        <div class="mx-14 my-8">
            <div id="menu_part" class="selector_commande hover:bg-base-200 card bg-base-100 shadow-sm">
                <figure class="px-10 pt-10">
                    <img
                            src="/assets/img/dessert_part.png"
                            alt="Menu"
                            class="rounded-xl" />
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">Nos Dessert</h2>
                </div>
            </div>
        </div>
        <div class="mx-14 my-8">
            <div id="menu_part" class="selector_commande hover:bg-base-200 card bg-base-100 shadow-sm">
                <figure class="px-10 pt-10">
                    <img
                            src="/assets/img/boisson_part.png"
                            alt="Menu"
                            class="rounded-xl" />
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">Nos Boisson</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-5 col-start-1 row-start-5">2</div>
    <div class="col-span-4 row-span-4 col-start-2 row-start-1">3</div>
</div>


<script src="/assets/script/ui_commande.js"></script>