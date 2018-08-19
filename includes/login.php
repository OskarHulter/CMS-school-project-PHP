<?php include "db.php" ?>
<?php session_start(); ?>

<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM user WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);

    if (!$select_user_query) {
        die("QUERY FAILED". mysqli_error($connection));
    }
    while ($row = mysqli_fetch_array($select_user_query)) {
        $db_username = $row['username'];
        $db_password = $row['password'];
    }

    if ($username === $db_username && $password === $db_password) {
        $_SESSION['username'] = $db_username;
        header("Location: ../admin");
    } else {
        header("Location: ../index.php");
    }
}

