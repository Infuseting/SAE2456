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
            <a href="/commande/index" class="btn btn-primary">Get Started</a>
        </div>
    </div>
</div>
<div class="flex flex-col my-96 mx-10 justify-center flex-nowrap">
    <h1 class="text-3xl font-bold text-center my-10">On nous fait <strong class="text-secondary">confiance</strong> !</h1>

    <div class="flex items-center justify-center fade-right">

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
                <div class="stat-value"><?php echo $conn->query("SELECT COUNT(*) - 1 FROM RAP_CLIENT ")->fetch_row()[0]?></div>
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
</div>
<div class="flex flex-col my-96 mx-10 justify-center flex-nowrap">
    <h1 class="text-3xl font-bold text-center my-10">Comment ça <strong class="text-secondary">marche </strong> ?</h1>
    <div class="flex flex-row justify-center flex-nowrap">
        <div class="card bg-base-100 w-96 mx-4 shadow-sm">
            <div class="card-body items-center text-center">
                <svg class="w-6 h-6 text-secondary" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.99984 19.9999V14.6493C4.99992 14.6597 5.00492 14.6517 4.98324 14.6219C4.95865 14.5883 4.91084 14.5445 4.84164 14.5106L4.64535 14.411C3.67439 13.8933 2.89898 13.0684 2.4432 12.0624C1.95716 10.9895 1.86553 9.77927 2.18441 8.64539C2.5033 7.5115 3.21233 6.52643 4.18636 5.86414C4.96354 5.33574 5.86996 5.03969 6.79964 5.00281C7.26533 4.19373 7.91501 3.50115 8.70003 2.98425C9.67956 2.33933 10.8271 1.996 11.9998 1.99597L12.2196 1.99988C13.3155 2.04 14.3813 2.37964 15.2996 2.98425C16.0847 3.50113 16.7343 4.19373 17.2 5.00281C18.1301 5.03916 19.0366 5.33483 19.8143 5.86316C20.7891 6.52548 21.4992 7.51083 21.8182 8.64539C22.1372 9.7799 22.0452 10.991 21.5584 12.0643C21.0718 13.1371 20.2211 14.0022 19.158 14.5096L19.159 14.5106C19.0892 14.5441 19.0411 14.5883 19.0164 14.6219C18.9951 14.6513 18.9998 14.6597 18.9998 14.6503V19.9999C18.9998 20.5303 18.789 21.0389 18.4139 21.4139C18.0388 21.789 17.5303 21.9999 16.9998 21.9999H6.99984C6.46946 21.9998 5.96082 21.789 5.58578 21.4139C5.2108 21.0389 4.99984 20.5302 4.99984 19.9999ZM6.99984 19.9999H16.9998V14.6503C16.9998 13.7059 17.64 13.0208 18.2948 12.7069H18.2967L18.5291 12.5819C19.0584 12.2696 19.4816 11.8016 19.7371 11.2382C20.0292 10.5942 20.0838 9.86713 19.8924 9.1864C19.701 8.50582 19.2751 7.91478 18.6903 7.51746C18.1055 7.12021 17.3993 6.9418 16.6961 7.01453C16.2612 7.05954 15.8475 6.81661 15.6746 6.41492C15.3657 5.69686 14.8529 5.08508 14.2 4.65515C13.6285 4.27886 12.9711 4.0564 12.2918 4.00671L11.9998 3.99597C11.2181 3.996 10.4536 4.22529 9.80062 4.65515C9.1477 5.08504 8.63502 5.69686 8.32601 6.41492C8.17493 6.7661 7.83925 6.9963 7.46664 7.01843L7.30453 7.01453C6.60153 6.9423 5.89578 7.1211 5.31136 7.51843C4.72703 7.91571 4.3016 8.50624 4.11019 9.1864C3.91885 9.86678 3.97379 10.5934 4.26546 11.2372C4.52074 11.8005 4.94268 12.2694 5.47152 12.5819L5.70394 12.7059L5.70687 12.7069L5.82894 12.7704C6.43691 13.1079 6.99984 13.7643 6.99984 14.6493V19.9999Z" fill="currentColor" style="fill-opacity:1;"/>
                    <path d="M18 16C18.5523 16 19 16.4477 19 17C19 17.5523 18.5523 18 18 18H6C5.44772 18 5 17.5523 5 17C5 16.4477 5.44772 16 6 16H18Z" fill="currentColor" style="fill-opacity:1;"/>
                </svg>
                <h2 class="card-title">Browse Delicious Menu</h2>
                <p>Explore our wide selection of freshly prepared dishes, crafted for every taste and occasion.</p>
            </div>
        </div>
        <div class="card bg-base-100 w-96 mx-4 shadow-sm">
            <div class="card-body items-center text-center">
                <svg class="w-6 h-6 text-secondary" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 21C6 19.8954 6.89543 19 8 19C9.10457 19 10 19.8954 10 21C10 22.1046 9.10457 23 8 23C6.89543 23 6 22.1046 6 21Z" fill="currentColor" style="fill-opacity:1;"/><path d="M17 21C17 19.8954 17.8954 19 19 19C20.1046 19 21 19.8954 21 21C21 22.1046 20.1046 23 19 23C17.8954 23 17 22.1046 17 21Z" fill="currentColor" style="fill-opacity:1;"/><path d="M4.05 1.04999L4.13789 1.05389C4.57147 1.09189 4.93498 1.4088 5.02754 1.841L5.92891 6.04999H22.09C22.3933 6.05 22.6805 6.18745 22.8703 6.42401C23.0601 6.66056 23.1323 6.97074 23.0666 7.26678L21.4162 14.6965L21.4152 14.6955C21.2683 15.362 20.8999 15.9589 20.3684 16.3869C19.903 16.7616 19.3377 16.9869 18.7463 17.0383L18.4914 17.05H8.71016V17.049C8.02024 17.0593 7.34765 16.8325 6.80586 16.4045C6.32671 16.0259 5.97624 15.5116 5.79805 14.9318L5.73262 14.6799L4.14864 7.28729C4.14354 7.26636 4.13872 7.24525 4.13496 7.22382L3.24141 3.04999H2.05C1.49772 3.04999 1.05 2.60227 1.05 2.04999C1.05 1.4977 1.49772 1.04999 2.05 1.04999H4.05ZM7.6877 14.2599L7.70918 14.3439C7.76854 14.5374 7.88626 14.7089 8.0461 14.8351C8.22855 14.9792 8.45529 15.0551 8.6877 15.05H18.4885C18.7158 15.0496 18.9363 14.9718 19.1135 14.8293C19.2908 14.6866 19.4142 14.4871 19.4631 14.2648L19.4641 14.2629L20.843 8.04999H6.35762L7.6877 14.2599Z" fill="currentColor" style="fill-opacity:1;"/></svg>
                <h2 class="card-title">Place Your Order</h2>
                <p>Select your favorite items, customize them to your liking, and add to your cart with ease.</p>
            </div>
        </div>
        <div class="card bg-base-100 w-96 mx-4 shadow-sm">
            <div class="card-body items-center text-center">
                <svg class="w-6 h-6 text-secondary" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M13 18V6C13 5.73478 12.8946 5.48051 12.707 5.29297C12.5429 5.12883 12.3276 5.02757 12.0986 5.00488L12 5H4C3.73478 5 3.48051 5.10543 3.29297 5.29297C3.10543 5.48051 3 5.73478 3 6V17H5C5.55228 17 6 17.4477 6 18C6 18.5523 5.55228 19 5 19H3C2.46957 19 1.96101 18.7891 1.58594 18.4141C1.25765 18.0858 1.05515 17.6553 1.00977 17.1973L1 17V6C1 5.20435 1.3163 4.44152 1.87891 3.87891C2.44152 3.3163 3.20435 3 4 3H12L12.2969 3.01465C12.9835 3.08291 13.6289 3.38671 14.1211 3.87891C14.6837 4.44152 15 5.20435 15 6V18C15 18.5523 14.5523 19 14 19C13.4477 19 13 18.5523 13 18Z" fill="currentColor" style="fill-opacity:1;"/><path d="M15 17C15.5523 17 16 17.4477 16 18C16 18.5523 15.5523 19 15 19H9C8.44772 19 8 18.5523 8 18C8 17.4477 8.44772 17 9 17H15Z" fill="currentColor" style="fill-opacity:1;"/><path d="M21 17V13.3516L20.999 13.3506L17.5195 9.00098L17.5186 9H14C13.4477 9 13 8.55228 13 8C13 7.44772 13.4477 7 14 7H17.5215L17.7451 7.0127C17.9673 7.03803 18.1843 7.1007 18.3867 7.19824C18.6565 7.32828 18.8931 7.51803 19.0801 7.75195L19.0811 7.75098L22.5596 12.1006L22.6602 12.2373C22.8801 12.5649 22.9993 12.9516 23 13.3486V17C23 17.5304 22.7891 18.039 22.4141 18.4141C22.039 18.7891 21.5304 19 21 19H19C18.4477 19 18 18.5523 18 18C18 17.4477 18.4477 17 19 17H21Z" fill="currentColor" style="fill-opacity:1;"/><path d="M18 18C18 17.4477 17.5523 17 17 17C16.4477 17 16 17.4477 16 18C16 18.5523 16.4477 19 17 19C17.5523 19 18 18.5523 18 18ZM20 18C20 19.6569 18.6569 21 17 21C15.3431 21 14 19.6569 14 18C14 16.3431 15.3431 15 17 15C18.6569 15 20 16.3431 20 18Z" fill="currentColor" style="fill-opacity:1;"/><path d="M8 18C8 17.4477 7.55228 17 7 17C6.44772 17 6 17.4477 6 18C6 18.5523 6.44772 19 7 19C7.55228 19 8 18.5523 8 18ZM10 18C10 19.6569 8.65685 21 7 21C5.34315 21 4 19.6569 4 18C4 16.3431 5.34315 15 7 15C8.65685 15 10 16.3431 10 18Z" fill="currentColor" style="fill-opacity:1;"/></svg>
                <h2 class="card-title">Fast Delivery</h2>
                <p>Sit back and relax as we swiftly deliver your hot, fresh meal right to your doorstep.</p>
            </div>
        </div>
    </div>
</div>

<div class="flex flex-col my-96 mx-10 justify-center flex-nowrap">
    <h1 class="text-3xl font-bold text-center my-10">Les <strong class="text-secondary">avis </strong> de nos <strong class="text-secondary">clients </strong></h1>
    <div class="flex flex-row justify-center flex-nowrap">
        <div class="card bg-base-100 w-96 mx-4 shadow-sm">
            <div class="card-body items-start">
                <div class="rating rating-lg rating-half">
                    <input type="radio" name="rating-11" class="rating-hidden" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-1 bg-secondary" aria-label="0.5 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-2 bg-secondary" aria-label="1 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-1 bg-secondary" aria-label="1.5 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-2 bg-secondary" aria-label="2 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-1 bg-secondary" aria-label="2.5 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-2 bg-secondary" aria-label="3 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-1 bg-secondary" aria-label="3.5 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-2 bg-secondary" aria-label="4 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-1 bg-secondary" aria-label="4.5 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-2 bg-secondary" aria-label="5 star" aria-current="true"/>
                </div>
                <p class="text-justify"><i>"The Creamy Alfredo Pasta is out of this world! It's my go-to comfort food now. The app is super easy to use, and delivery is always on time."</i></p>
                <div class="flex flex-row items-center mt-4">
                    <img src="/assets/img/avis/client1.jpg" alt="Client 1" class="w-12 h-12 rounded-full mr-3">
                    <div>
                        <h2 class="font-bold"Frederic Lutensky</h2>
                        <p class="text-sm text-gray-500">Caen Mayor</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-base-100 w-96 mx-4 shadow-sm">
            <div class="card-body items-start">
                <div class="rating rating-lg rating-half">
                    <input type="radio" name="rating-11" class="rating-hidden" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-1 bg-secondary" aria-label="0.5 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-2 bg-secondary" aria-label="1 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-1 bg-secondary" aria-label="1.5 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-2 bg-secondary" aria-label="2 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-1 bg-secondary" aria-label="2.5 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-2 bg-secondary" aria-label="3 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-1 bg-secondary" aria-label="3.5 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-2 bg-secondary" aria-label="4 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-1 bg-secondary" aria-label="4.5 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-2 bg-secondary" aria-label="5 star" aria-current="true"/>
                </div>
                <p class="text-justify"><i>"Finally, a takeout app that understands quality and convenience. The Spicy Beef Tacos are amazing, and I love the quick order process."</i></p>
                <div class="flex flex-row items-center mt-4">
                    <img src="/assets/img/avis/client2.jpg" alt="Client 2" class="w-12 h-12 rounded-full mr-3">
                    <div>
                        <h2 class="font-bold">Pierre de la house</h2>
                        <p class="text-sm text-gray-500">Farmer</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-base-100 w-96 mx-4 shadow-sm">
            <div class="card-body items-start">
                <div class="rating rating-lg rating-half">
                    <input type="radio" name="rating-11" class="rating-hidden" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-1 bg-secondary" aria-label="0.5 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-2 bg-secondary" aria-label="1 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-1 bg-secondary" aria-label="1.5 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-2 bg-secondary" aria-label="2 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-1 bg-secondary" aria-label="2.5 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-2 bg-secondary" aria-label="3 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-1 bg-secondary" aria-label="3.5 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-2 bg-secondary" aria-label="4 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-1 bg-secondary" aria-label="4.5 star" />
                    <input type="radio" name="rating-11" class="mask mask-star-2 mask-half-2 bg-secondary" aria-label="5 star" aria-current="true"/>
                </div>
                <p class="text-justify"><i>"Takeout Express has revolutionized our family dinners! The food is always fresh, delicious, and arrives so quickly. Highly recommend their Crispy Fried Chicken!"</i></p>
                <div class="flex flex-row items-center mt-4">
                    <img src="/assets/img/avis/client3.jpg" alt="Client 3" class="w-12 h-12 rounded-full mr-3">
                    <div>
                        <h2 class="font-bold">Alice Johnson</h2>
                        <p class="text-sm text-gray-500">Food Blogger</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>