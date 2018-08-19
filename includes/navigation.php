<nav class="nav-container">
    <div class="nav-box">
        <a href="index.php">
            <h1 class="Title">CMS</h1>
        </a>
    </div>

    <div class="nav-box">
        <?php if(isset($_SESSION['username'])): ?>
        <a href="admin" class="button">Admin Tools</a>
        <?php else: ?>
        <h3>Welcome</h3>
        <?php endif; ?>
    </div>

    <?php if(isset($_SESSION['username'])): ?>
    <h3>Hi
        <?php echo $_SESSION['username'] ?>!</h3>
    <a href="includes/logout.php" class="button">Logout</a>
    <?php else: ?>
    <div class="nav-box">
        <form action="includes/login.php" method="post">
            <div class="content-container">
                <input name="username" type="text" class="form-control" placeholder="Enter Username">
                <input name="password" type="password" class="form-control" placeholder="Enter Password">
                <button name="login" class="button" type="submit">LOGIN</button>
                <a href="registration.php" class="button">REGISTER</a>
            </div>
        </form>
    </div>
    <?php endif; ?>
</nav>