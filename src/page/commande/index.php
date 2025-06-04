<!-- Choix des produits jusqu'a la validation de la commande -->
<!-- Choix du restaurants -->
<!-- Choix sur place / emporter / autre -->
<!-- Choix de la date et de l'heure a laquelle on retire la commande -->
<!-- Choix du mode de paiement -->


<?php
$conn = getConn();


function getFoodDescriptions($name) {


}
?>

<dialog id="menu_or_not" class="modal">
    <div class="modal-box w-400">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="text-lg font-bold text-center">Menu ou seul ?</h3>
        <div class="flex flex-row justify-between py-4">
            <div id="menu_part" class="card bg-base-100 w-96 me-2 shadow-sm hover:cursor-pointer hover:bg-base-200">
                <figure class="px-10 pt-10">
                    <img
                            src="/assets/img/menu_part.png"
                            alt="Format Menu"
                            class="rounded-xl" />
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">Menu</h2>
                </div>
            </div>
            <div id="solo_part" class="card bg-base-100 w-96 me-2 shadow-sm hover:cursor-pointer hover:bg-base-200">
                <figure class="px-10 pt-10">
                    <img
                            src="/assets/img/solo_part.png"
                            alt="Format Seul"
                            class="rounded-xl" />
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">Seul</h2>
                </div>
            </div>
        </div>

    </div>
    <form method="dialog" class="modal-backdrop">
        <button class="btn-secondary">close</button>
    </form>
</dialog>

<dialog id="choose_" class="modal">
    <div class="modal-box w-400">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="text-lg font-bold text-center">Menu ou seul ?</h3>
        <div class="flex flex-row justify-between py-4">
            <div id="menu_part" class="card bg-base-100 w-96 me-2 shadow-sm hover:cursor-pointer hover:bg-base-200">
                <figure class="px-10 pt-10">
                    <img
                            src="/assets/img/menu_part.png"
                            alt="Format Menu"
                            class="rounded-xl" />
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">Menu</h2>
                </div>
            </div>
            <div id="solo_part" class="card bg-base-100 w-96 me-2 shadow-sm hover:cursor-pointer hover:bg-base-200">
                <figure class="px-10 pt-10">
                    <img
                            src="/assets/img/solo_part.png"
                            alt="Format Seul"
                            class="rounded-xl" />
                </figure>
                <div class="card-body items-center text-center">
                    <h2 class="card-title">Seul</h2>
                </div>
            </div>
        </div>

    </div>
    <form method="dialog" class="modal-backdrop">
        <button class="btn-secondary">close</button>
    </form>
</dialog>

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
                    <?php
                    $query = "WITH plats_nettoyes AS (
  SELECT
    PLA_NUM,
    TRIM(REGEXP_REPLACE(PLA_NOM, '\\\\s*\\\\([^)]*\\\\)', '')) AS PLA_NOM_CLEAN,
    PIZ_TAILLE,
    PLA_PRIX_VENTE_UNIT_HT,
    PLA_PROMOTION,
    PLA_DESC
  FROM RAP_PIZZA
  JOIN RAP_PLAT USING (PLA_NUM)
),
rangs_par_pizza AS (
  SELECT *,
    ROW_NUMBER() OVER (PARTITION BY PLA_NOM_CLEAN ORDER BY PIZ_TAILLE ASC) AS rang,
    COUNT(*) OVER (PARTITION BY PLA_NOM_CLEAN) > 1 AS PIZ_MULT_TAILLE
  FROM plats_nettoyes
)
SELECT
  PLA_NOM_CLEAN,
  PLA_DESC,
  PIZ_TAILLE,
  PLA_PRIX_VENTE_UNIT_HT,
  PLA_PROMOTION,
  PIZ_MULT_TAILLE
FROM rangs_par_pizza
WHERE rang = 1;";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $pizzaName = htmlspecialchars($row['PLA_NOM_CLEAN']);
                        $pizzaDesc = htmlspecialchars($row['PLA_DESC']);
                        $pizzaPrice = htmlspecialchars($row['PLA_PRIX_VENTE_UNIT_HT']);
                        $pizzaMultipleSize = $row['PLA_MULT_TAILLE'] == 1? 'multiple-size' : '';
                        echo '<div class="card bg-base-100 min-w-96 max-w-96 shadow-sm mx-4">
                        <figure>
    <div class="relative">
        <img
            src="/assets/img/food/pizza/'. str_replace(' ', '_', $pizzaName) . '.png"
            alt="'. $pizzaName .'"  />
    </div>
</figure>
                        <div class="card-body">
                            <h2 class="card-title name">'.$pizzaName.'</h2>
                            <p>'.$pizzaDesc.'</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">'.$pizzaPrice.'€</p>
                                <button class="btn btn-primary buy menu_commande '. $pizzaMultipleSize .'">Buy Now</button>
                            </div>
                        </div>
                    </div>';
                    }
                    $stmt->close();
                    ?>
                </div>
            </div>
            <div class="my-2" id="kebab_part">
                <h1 class="bold text-3xl">Kebab</h1>
                <div  class="flex flex-row flex-nowrap overflow-x-auto mt-2" style="scrollbar-width: none; -ms-overflow-style: none;">
                    <?php
                    $query = "WITH plats_nettoyes AS (
  SELECT
    PLA_NUM,
    TRIM(REGEXP_REPLACE(PLA_NOM, '(?i)sauce.*', '')) AS PLA_NOM_CLEAN,
    PLA_PRIX_VENTE_UNIT_HT,
    PLA_PROMOTION,
    PLA_DESC
  FROM RAP_KEBAB
  JOIN RAP_PLAT USING (PLA_NUM)
),
groupes AS (
  SELECT
    PLA_NOM_CLEAN,
    COUNT(*) AS count_plats
  FROM plats_nettoyes
  GROUP BY PLA_NOM_CLEAN
),
rangements AS (
  SELECT
    p.*,
    g.count_plats,
    ROW_NUMBER() OVER (PARTITION BY p.PLA_NOM_CLEAN ORDER BY PLA_NUM) AS rn
  FROM plats_nettoyes p
  JOIN groupes g ON p.PLA_NOM_CLEAN = g.PLA_NOM_CLEAN
)
SELECT
  PLA_NUM,
  PLA_NOM_CLEAN,
  PLA_PRIX_VENTE_UNIT_HT,
  PLA_PROMOTION,
  PLA_DESC,
  CASE WHEN count_plats > 1 THEN 1 ELSE 0 END AS PLA_MULT_SIZE
FROM rangements
WHERE rn = 1;
";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $pizzaName = htmlspecialchars($row['PLA_NOM_CLEAN']);
                        $pizzaDesc = htmlspecialchars($row['PLA_DESC']);
                        $pizzaPrice = htmlspecialchars($row['PLA_PRIX_VENTE_UNIT_HT']);
                        $pizzaMultipleSize = $row['PLA_MULT_TAILLE'] == 1? 'multiple-size' : '';
                        echo '<div class="card bg-base-100 min-w-96 max-w-96 shadow-sm mx-4">
                        <figure>
    <div class="relative">
        <img
            src="/assets/img/food/kebab/'. str_replace(' ', '_', $pizzaName) . '.png"
            alt="'. $pizzaName .'"  />
    </div>
</figure>
                        <div class="card-body">
                            <h2 class="card-title name">'.$pizzaName.'</h2>
                            <p>'.$pizzaDesc.'</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">'.$pizzaPrice.'€</p>
                                <button class="btn btn-primary buy menu_commande '. $pizzaMultipleSize .'">Buy Now</button>
                            </div>
                        </div>
                    </div>';
                    }
                    $stmt->close();
                    ?>
                </div>
            </div>
            <div class="my-2" id="boisson_part">
                <h1 class="bold text-3xl">Boisson</h1>
                <div  class="flex flex-row flex-nowrap overflow-x-auto mt-2" style="scrollbar-width: none; -ms-overflow-style: none;">
                    <?php
                    $query = "SELECT PLA_NUM, PLA_NOM, PLA_PRIX_VENTE_UNIT_HT, PLA_PROMOTION, PLA_DESC FROM RAP_BOISSON JOIN RAP_PLAT USING (PLA_NUM);";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $pizzaName = htmlspecialchars($row['PLA_NOM']);
                        $pizzaDesc = htmlspecialchars($row['PLA_DESC']);
                        $pizzaPrice = htmlspecialchars($row['PLA_PRIX_VENTE_UNIT_HT']);
                        $pizzaMultipleSize = $row['PLA_MULT_TAILLE'] == 1? 'multiple-size' : '';
                        echo '<div class="card bg-base-100 min-w-96 max-w-96 shadow-sm mx-4">
                        <figure>
    <div class="relative">µ
        <img
            src="/assets/img/food/boisson/'. str_replace(' ', '_', $pizzaName) . '.png"
            alt="'. $pizzaName .'"  />
    </div>
</figure>
                        <div class="card-body">
                            <h2 class="card-title name">'.$pizzaName.'</h2>
                            <p>'.$pizzaDesc.'</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">'.$pizzaPrice.'€</p>
                                <button class="btn btn-primary buy '. $pizzaMultipleSize .'">Buy Now</button>
                            </div>
                        </div>
                    </div>';
                    }
                    $stmt->close();
                    ?>
                </div>
            </div>
            <div class="my-2" id="dessert_part">
                <h1 class="bold text-3xl">Dessert</h1>
                <div  class="flex flex-row flex-nowrap overflow-x-auto mt-2" style="scrollbar-width: none; -ms-overflow-style: none;">
                    <?php
                    $query = "SELECT PLA_NUM, PLA_NOM, PLA_PRIX_VENTE_UNIT_HT, PLA_PROMOTION, PLA_DESC FROM RAP_DESSERT JOIN RAP_PLAT USING (PLA_NUM) WHERE PLA_NUM != 0;";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $pizzaName = htmlspecialchars($row['PLA_NOM']);
                        $pizzaDesc = htmlspecialchars($row['PLA_DESC']);
                        $pizzaPrice = htmlspecialchars($row['PLA_PRIX_VENTE_UNIT_HT']);
                        $pizzaMultipleSize = $row['PLA_MULT_TAILLE'] == 1? 'multiple-size' : '';
                        echo '<div class="card bg-base-100 min-w-96 max-w-96 shadow-sm mx-4">
                        <figure>
    <div class="relative">
        <img
            src="/assets/img/food/dessert/'. str_replace(' ', '_', $pizzaName) . '.png"
            alt="'. $pizzaName .'"  />
    </div>
</figure>
                        <div class="card-body">
                            <h2 class="card-title name">'.$pizzaName.'</h2>
                            <p>'.$pizzaDesc.'</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">'.$pizzaPrice.'€</p>
                                <button class="btn btn-primary buy '. $pizzaMultipleSize .'">Buy Now</button>
                            </div>
                        </div>
                    </div>';
                    }
                    $stmt->close();
                    ?>

                </div>
            </div>
            <div class="my-2" id="accompagnements_part">
                <h1 class="bold text-3xl">Accompagnements</h1>
                <div  class="flex flex-row flex-nowrap overflow-x-auto mt-2" style="scrollbar-width: none; -ms-overflow-style: none;">
                    <?php
                    $query = "WITH plats_nettoyes AS (
  SELECT
    PLA_NUM,
    TRIM(REGEXP_REPLACE(PLA_NOM, '(?i)sauce.*', '')) AS PLA_NOM_CLEAN,
    PLA_PRIX_VENTE_UNIT_HT,
    PLA_PROMOTION,
    PLA_DESC
  FROM RAP_LEGUME
  JOIN RAP_PLAT USING (PLA_NUM)
),
groupes AS (
  SELECT
    PLA_NOM_CLEAN,
    COUNT(*) AS count_plats
  FROM plats_nettoyes
  GROUP BY PLA_NOM_CLEAN
),
rangements AS (
  SELECT
    p.*,
    g.count_plats,
    ROW_NUMBER() OVER (PARTITION BY p.PLA_NOM_CLEAN ORDER BY PLA_NUM) AS rn
  FROM plats_nettoyes p
  JOIN groupes g ON p.PLA_NOM_CLEAN = g.PLA_NOM_CLEAN
)
SELECT
  PLA_NUM,
  PLA_NOM_CLEAN,
  PLA_PRIX_VENTE_UNIT_HT,
  PLA_PROMOTION,
  PLA_DESC,
  CASE WHEN count_plats > 1 THEN 1 ELSE 0 END AS PLA_MULT_SIZE
FROM rangements
WHERE rn = 1;";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $pizzaName = htmlspecialchars($row['PLA_NOM_CLEAN']);
                        $pizzaDesc = htmlspecialchars($row['PLA_DESC']);
                        $pizzaPrice = htmlspecialchars($row['PLA_PRIX_VENTE_UNIT_HT']);
                        $pizzaMultipleSize = $row['PLA_MULT_TAILLE'] == 1? 'multiple-size' : '';
                        echo '<div class="card bg-base-100 min-w-96 max-w-96 shadow-sm mx-4">
                        <figure>
    <div class="relative">
        <img
            src="/assets/img/food/accompagnements/'. str_replace(' ', '_', $pizzaName) . '.png"
            alt="'. $pizzaName .'"  />
    </div>
</figure>
                        <div class="card-body">
                            <h2 class="card-title name">'.$pizzaName.'</h2>
                            <p>'.$pizzaDesc.'</p>
                            <div class="card-actions items-center justify-between">
                                <p class="text-2xl price">'.$pizzaPrice.'€</p>
                                <button class="btn btn-primary buy '. $pizzaMultipleSize .'">Buy Now</button>
                            </div>
                        </div>
                    </div>';
                    }
                    $stmt->close();
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>


<script src="/assets/script/ui_commande.js"></script>
