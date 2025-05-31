<?php
$conn = getConn();

function generateRandomCharString(int $int)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $int; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function generateAccessToken($id) {
    $time = Date('Y-m-d H:i:s');
    $randomchar = generateRandomCharString(8);
    return hash('sha256', $id . $time . $randomchar);



}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'] ?? '';
    $password = hash('sha256', $_POST['password'] ?? '');
    $query = "SELECT CLI_NUM FROM rap_client WHERE CLI_COURRIEL = ? AND CLI_PASSWORD = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->fetch_row()[0];
    if (isset($count) && !empty($count)) {
        $query = "INSERT INTO rap_oauth_clients(rap_oauth_clients.CLI_NUM, rap_oauth_clients.CLIENT_ID, rap_oauth_clients.ACCESS_TOKEN, rap_oauth_clients.REFRESH_TOKEN, rap_oauth_clients.DATE_CREATION) VALUES(?, ?,?,?,NOW()) ";
        $stmt = $conn->prepare($query);
        $generateAccessToken = generateAccessToken($count);
        $generateRandomCharString = generateRandomCharString(256);
        $generateAccessToken1 = generateAccessToken($count);
        $stmt->bind_param('isss', $count, $generateRandomCharString, $generateAccessToken, $generateAccessToken1);
        $stmt->execute();
        $result = $stmt->get_result();
        $_SESSION['access_token'] = $generateAccessToken;
        $_SESSION['refresh_token'] = $generateAccessToken1;
        $_SESSION['client_id'] = $generateRandomCharString;
        $_SESSION['client_num'] = $count;

        header('Location: /');


    }
    else {
        $ERROR = 'Invalid email or password';
    }
}

?>

<div class="flex items-center justify-center min-h-screen bg-base-100">

    <a href="/" class="absolute top-4 left-4 text-primary text-2xl font-bold">×</a>
    <div class="bg-base-200 p-8 rounded shadow-md w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-4 text-center text-primary">Login</h2>
        <form action="/login" method="POST">
            <div class="mb-4">
                <label class="floating-label">
                    <span>Your Email</span>
                    <input id="email" name="email" type="email" placeholder="mail@site.com" class="input input-md" required />
                </label>
            </div>
            <div class="mb-4">
                <label class="floating-label">
                    <span>Your Password</span>
                    <input id="password" name="password" type="password" placeholder="password" class="input input-md" required />
                </label>
            </div>
            <div class="mb-2 flex w-full justify-center ">
                <a href="/register" class="link link-primary no-underline ">S'inscrire</a>
            </div>


            <button type="submit" class="w-full py-2 px-4 rounded btn btn-primary">Login</button>
            <?php
            if (isset($ERROR)) {
                echo '<div class="alert alert-outline max-sm:alert-vertical alert-error text-xs font-bold mt-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"></path>
                </svg>
                '.$ERROR.'
            </div>';
            }

            ?>
        </form>
    </div>
</div>