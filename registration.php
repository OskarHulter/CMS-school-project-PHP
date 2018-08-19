<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php  include "includes/navigation.php"; ?>
<?php
if (isset($_POST['submit'])) {
    $username = escape($_POST['username']);
    $password = escape($_POST['password']);

    if (username_exists($username)) {
        die("Username taken, please choose another one!");
    }

    if (!empty($username) && !empty($password)) {
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "INSERT INTO user(username, password) VALUES('{$username}','{$password}')";
        $register_user_query = mysqli_query($connection, $query);
        if (!$register_user_query) {
            die("Query failed: " . mysqli_error($connection) . ' ' . mysqli_errno($connection));
        }
        $reg_status_message = "User Sucessfully created, please login above!";
    } else {
        $reg_status_message = "Fields should not be empty";
    }
} else {
    $reg_status_message = "";
}
?>

    <div class="content-container">

        <div class="content-box">
            <h1>Register</h1>
            <form action="registration.php" method="post" class="content-container" autocomplete="off">
                <h2>
                    <?php echo $reg_status_message; ?>
                </h2>
                <label for="username">username</label>
                <input type="text" name="username" id="username" placeholder="Enter your Username">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">

                <input type="submit" name="submit" class="button" id="reg-button" value="Register">
            </form>
        </div>
    </div>
<?php  include "includes/footer.php"; ?>