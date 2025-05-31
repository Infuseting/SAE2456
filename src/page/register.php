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
    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['second_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['first_name']) && !empty($_POST['second_name'])) {
        $email = $_POST['email'] ?? '';
        $password = hash('sha256', $_POST['password'] ?? '');
        $query = "SELECT COUNT(CLI_NUM) FROM rap_client WHERE CLI_COURRIEL = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->fetch_row()[0];
        if ($count == 0) {
            $query = "INSERT INTO RAP_CLIENT(CLI_NUM, CLI_NOM, CLI_PRENOM, CLI_COURRIEL, CLI_PASSWORD, CLI_STATUT) 
          VALUES((SELECT MAX(temp.CLI_NUM) + 1 FROM (SELECT CLI_NUM FROM RAP_CLIENT) AS temp), ?, ?, ?, ?, 'CLIENT')";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ssss', $_POST['first_name'], $_POST['second_name'], $email, $password);
            $stmt->execute();
            $query = "INSERT INTO rap_oauth_clients(rap_oauth_clients.CLI_NUM, rap_oauth_clients.CLIENT_ID, rap_oauth_clients.ACCESS_TOKEN, rap_oauth_clients.REFRESH_TOKEN, rap_oauth_clients.DATE_CREATION) VALUES((SELECT CLI_NUM FROM RAP_CLIENT WHERE CLI_COURRIEL = ? AND CLI_PASSWORD = ?), ?,?,?,NOW()) ";
            $stmt = $conn->prepare($query);
            $generateAccessToken = generateAccessToken($count);
            $generateRandomCharString = generateRandomCharString(256);
            $generateAccessToken1 = generateAccessToken($count);
            $stmt->bind_param('sssss', $email, $password, $generateRandomCharString, $generateAccessToken, $generateAccessToken1);
            $stmt->execute();
            $result = $stmt->get_result();
            $_SESSION['access_token'] = $generateAccessToken;
            $_SESSION['refresh_token'] = $generateAccessToken1;
            $_SESSION['client_id'] = $generateRandomCharString;
            $_SESSION['client_num'] = getUserInfo($_SESSION['access_token'])['cli_num'];

            header('Location: /');
        } else {
            $ERROR = 'Email already used !';
        }
    } else {
        $ERROR = 'Please fill all the fields !';
    }
}

?>

<div class="flex items-center justify-center min-h-screen bg-base-100">

    <a href="/" class="absolute top-4 left-4 text-primary text-2xl font-bold">×</a>
    <div class="bg-base-200 p-8 rounded shadow-md w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-4 text-center text-primary">Register</h2>
        <form action="/register" method="POST">
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
            <div class="mb-4">
                <label class="floating-label">
                    <span>Your first name</span>
                    <input id="first_name" name="first_name" type="text" placeholder="Your first name" class="input input-md" required />
                </label>
            </div>
            <div class="mb-4">
                <label class="floating-label">
                    <span>Your last name</span>
                    <input id="second_name" name="second_name" type="text" placeholder="Your last name" class="input input-md" required />
                </label>
            </div>
            <div class="mb-2 flex w-full justify-center ">
                <a href="/login" class="link link-primary no-underline ">Se connecter</a>
            </div>


            <button type="submit" class="w-full py-2 px-4 rounded btn btn-primary">Register</button>

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