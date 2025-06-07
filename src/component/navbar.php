<div class="navbar bg-base-100 shadow-sm">
    <div class="flex-1">
        <a href="/" class="btn btn-ghost text-xl">RAPIDC3</a>
    </div>
    <div class="flex-none">
        <div class="dropdown dropdown-end">
            <a href="/commande/order" role="button" class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /> </svg>
                    <span id="cart_number_item" class="badge badge-sm indicator-item">${CART::VALUE}</span>
                </div>
            </a>
        </div>
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full flex items-center justify-center h-full">
                    <img
                        alt="Tailwind CSS Navbar component"
                        src="
                        <?php
                            if (isset($_SESSION['access_token']) && !empty($_SESSION['access_token']) && isValidToken($_SESSION['access_token'])) {
                                echo file_exists(__DIR__ ."/../assets/img/user/" . $_SESSION['client_num'] . ".png") ? "/assets/img/user/" . $_SESSION['client_num'] . ".png" : "/assets/img/user/default_black.png";
                            }    else {
                                echo "/assets/img/user/default_black.png";
                            }


                        ?>"
                        class=""/>
                </div>
            </div>
            <?php
                if (isset($_SESSION['access_token']) && !empty($_SESSION['access_token']) && isValidToken($_SESSION['access_token'])) {
                    $user = getUserInfo($_SESSION['access_token']);
                    echo '<ul
                tabindex="0"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                <li><a href="/profile">Profile</a></li>
                <li><a href="/settings">Settings</a></li>
                <li><a href="/logout">Deconnexion</a></li>
            </ul>';
                }
                else {
                    echo '<ul
                tabindex="0"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                <li><a href="/login">Connexion</a></li>
                <li><a href="/register">Inscriptions</a></li>
            </ul>';
                }

            ?>

        </div>
    </div>
</div>