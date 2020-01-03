<?php

$link = mysqli_connect("db", $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD'], null);

if (!$link) {
    echo "Error: ";
    echo mysqli_connect_errno();
    echo mysqli_connect_error();
}

echo "<b>Success</b><br>";
echo "<b>Host</b>: " . mysqli_get_host_info($link);
mysqli_close($link);