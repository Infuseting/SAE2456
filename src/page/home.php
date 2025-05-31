<?php
$conn = getConn();
?>
<div
    class="hero min-h-screen"
    style="background-image: url(/assets/img/hero.png);"
>
    <div class="hero-overlay"></div>
    <div class="hero-content text-neutral-content text-center">
        <div class="max-w-md">
            <h1 class="mb-5 text-5xl font-bold">Hello there</h1>
            <p class="mb-5">
                Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                quasi. In deleniti eaque aut repudiandae et a id nisi.
            </p>
            <button class="btn btn-primary">Get Started</button>
        </div>
    </div>
</div>
<div class="min-h-screen flex items-center justify-center fade-right">
<div class="stats shadow">
    <div class="stat">
        <div class="stat-figure text-secondary">
            <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    class="inline-block h-8 w-8 stroke-current"
            >
                <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                ></path>
            </svg>
        </div>
        <div class="stat-title">Visite du site</div>
        <div class="stat-value">30K</div>
        <div class="stat-desc">Jan 1st - Feb 1st</div>
    </div>

    <div class="stat">
        <div class="stat-figure text-secondary">
            <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    class="inline-block h-8 w-8 stroke-current"
            >
                <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                ></path>
            </svg>
        </div>
        <div class="stat-title">Nombres d'Utilisateurs</div>
        <div class="stat-value"><?php echo $conn->query("SELECT COUNT(*) - 1 FROM rap_client ")->fetch_row()[0]?></div>
        <div class="stat-desc">All of time</div>
    </div>

    <div class="stat">
        <div class="stat-figure text-secondary">
            <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    class="inline-block h-8 w-8 stroke-current"
            >
                <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
                ></path>
            </svg>
        </div>
        <div class="stat-title">Nombre de commande</div>
        <div class="stat-value"><?php echo $conn->query("SELECT COUNT(*) FROM RAP_COMMANDE")->fetch_row()[0] ?></div>
        <div class="stat-desc"><?php
            $QUERY = "SELECT 
	NBR_COMMANDE_ALL_TIME.NBR_COMMANDE_ALL_TIME - NBR_COMMANDE_MOIS_DERNIER.NBR_COMMANDE_MOIS_DERNIER as difference,
    ROUND((NBR_COMMANDE_ALL_TIME.NBR_COMMANDE_ALL_TIME - NBR_COMMANDE_MOIS_DERNIER.NBR_COMMANDE_MOIS_DERNIER) / NBR_COMMANDE_ALL_TIME.NBR_COMMANDE_ALL_TIME*100, 2) as pourcentage
    
FROM 

(SELECT (SELECT COUNT(*) as count FROM RAP_COMMANDE WHERE COM_DATE + INTERVAL '1' MONTH <= NOW()) AS NBR_COMMANDE_MOIS_DERNIER FROM dual) as NBR_COMMANDE_MOIS_DERNIER,
(SELECT (SELECT COUNT(*) as count FROM RAP_COMMANDE) AS NBR_COMMANDE_ALL_TIME) as NBR_COMMANDE_ALL_TIME;
";
            $stmt = $conn->prepare($QUERY);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $difference = $row['difference'];
            $pourcentage = $row['pourcentage'];

            echo ($difference > 0 ? '↗︎' : '↘︎') . abs($difference) . ' (' . ($difference > 0 ? '+' : '-') . $pourcentage . '%)';



            ?></div>
    </div>

</div>
</div>