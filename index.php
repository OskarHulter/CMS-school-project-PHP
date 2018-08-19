<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>    
<?php include "includes/navigation.php"; ?>

<div class="content-container">
    
            <!-- Genererar ett nyhetsflöde av blogposts från DB -->
                <?php

                $query = "SELECT * FROM post ORDER BY created DESC";
                $select_all_posts_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $id = escape($row['id']);
                    $title = escape($row['title']);
                    $text = substr($row['text'], 0, 300);
                    $created = escape($row['created']);
                    $author = escape($row['author']);
                    $image = escape($row['image']);
                    ?>
                
                <!-- Blog Posts genereras av while loop -->
                <div class="content-box">
                <h1>
                    <a href="post.php?p_id=<?php echo $id; ?>"><?php echo $title ?></a>
                </h1>
                <p> by </p>  <h4><a href="author_posts.php?author=<?php echo $author ?>&p_id=<?php echo $id; ?> "><?php echo $author ?></a></h4>
                <p><?php echo $created ?> </p>
                <a href="post.php?p_id=<?php echo $id; ?>">
                    <img src="img/<?php echo $image; ?>" alt="post image">
                </a>
                
                <p><?php echo $text ?></p>
                <br>
                <br>
                </div>
                
                    
                <?php } ?>
              <hr> 
</div>
<hr>
<?php include "includes/footer.php"; ?>
