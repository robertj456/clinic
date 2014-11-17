<?php

$hashpass = password_hash("John", PASSWORD_BCRYPT);

$mysqli = new mysqli("localhost:3306", "root", "");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

/* check if server is alive */
if ($mysqli->ping()) {
    printf ("Our connection is ok!\n");
} else {
    printf ("Error: %s\n", $mysqli->error);
}

$insertUser = "
USE CQS;
INSERT INTO USER(USER_NAME, HASHED_PASSWORD, RECEPTION) VALUES ('John', '$hashpass', 1);
";

$insertUser = $mysqli->multi_query($insertUser);
echo $mysqli->error;

$mysqli->close();
?>
