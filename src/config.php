<?php
$env = parse_ini_file('.env');

#$servername = $env['OCI_SERVER'];
#$username = $env['OCI_USER'];
#$password = $env['OCI_PASSWORD'];




#$conn = oci_connect($username, $password, $servername);
$conn = mysqli_connect($env['DB_SERVER'], $env['DB_USER'], $env['DB_PASSWORD'], $env['DB_NAME']);
// Check connection
if (!$conn) {
    #$e = oci_error();
    $e = mysqli_connect_error();
    die("Connection failed: " . $e['message']);
}
function getConn()
{
    global $conn;
    return $conn;
}

function isValidToken($token) {
    $conn = getConn(); // Get the database connection

    $query = "SELECT COUNT(*) FROM rap_oauth_clients WHERE ACCESS_TOKEN = ?"; // Replace 'users' with your table name
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->fetch_row()[0];
    $stmt->close();

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }



    return $count == 1;
}

function getUserInfo($token) {
    $conn = getConn(); // Get the database connection

    $query = "SELECT * FROM rap_client WHERE cli_num = (SELECT CLI_NUM FROM rap_oauth_clients WHERE ACCESS_TOKEN = ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();
    $userInfo = $result->fetch_assoc();
    $stmt->close();


    if (!$userInfo) {
        die("Query failed: " . mysqli_error($conn));
    }

    return $userInfo;
}
?>