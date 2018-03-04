<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>
    <a href="info.php">PHP info</a>
</p>
<?php
// show errors
echo 'Showing errors...';
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<br>
<?php
$link = mysqli_init();

// Azure connection
mysqli_ssl_set($link,NULL,NULL, "/var/www/html/BaltimoreCyberTrustRoot.crt.pem", NULL, NULL) ; 
mysqli_real_connect($link, 'jjmysql.mysql.database.azure.com', 'jj@jjmysql', 'azure-12345', 'jj', 3306, MYSQLI_CLIENT_SSL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);
if (mysqli_connect_errno($link)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}

//echo 'Connected successfully';

$query = 'SELECT * FROM jjtable';
$result = mysqli_query($link, $query) or die('Query failed: ' . mysqli_error());

//echo 'Query completed successfully';

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
    }
} else {
    echo "0 results";
}

// Closing connection
mysqli_close($link);

?>
</body>
</html>
