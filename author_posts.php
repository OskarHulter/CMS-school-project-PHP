<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>    
<?php include "includes/navigation.php"; ?>
            <div class="content-container">
                <div class="content-box">
                <?php
                if (isset($_GET['p_id'])) {
                    $the_post_id = escape($_GET['p_id']);
                    $the_post_author = escape($_GET['author']);
                }

                $query = "SELECT * FROM post WHERE author = '{$the_post_author}'";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $id = escape($row['id']);
                    $title = escape($row['title']);
                    $text = escape($row['text']);
                    $created = escape($row['created']);
                    $author = escape($row['author']);
                    $image = escape($row['image']);
                    ?>

                <!-- Datan genereras dynamiskt -->
                <h1>
                    <a href="#"><?php echo $title ?></a>
                </h1>
                <p>
                    All posts by <a href="index.php"><?php echo $author ?></a>
                </p>
                <p><?php echo $created ?> </p>
                <img src="img/<?php echo $image; ?>" alt="Post image">
                <p><?php echo $text ?></p>

                    
                <?php } ?>
                
            </div>
            </div>
        <hr>

<?php include "includes/footer.php"; ?>
