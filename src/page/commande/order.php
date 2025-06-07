<?php
$conn = getConn();
?>

<div class="mx-40 my-10">
    <div class="flex flex-col flex-nowrap">

        <h1 class="text-2xl">Your order (<span id="itemCart">${CART::VALUE}</span> items)</h1>
        <div class="flex flex-row">
            <div class="card border-black rounded-xl border-1 mt-4 px-4 py-4 min-w-225">
                <div class="flex flex-nowrap flex-row">
                    <img src="/assets/img/food/accompagnements/Grande_Frite.png" class="rounded-xl w-36 h-36" alt="">
                    <div class="flex flex-nowrap flex-col">
                        <h1>Grande Frite</h1>
                        <p>Frite de patate douce caramelisée</p>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>
<script src="/assets/script/order.js"></script>
