<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>
 
            <?php
            if (isset($_GET['source'])) {
                $source = escape($_GET['source']);
            } else {
                $source = '';
            }

            switch ($source) {
                case 'add_post';
                    include "includes/add_post.php";
                    break;
                case 'edit_post';
                    include "includes/edit_post.php";
                    break;
                default;
                    include "includes/view_all_posts.php";
                    break;
            }
            ?>

<?php include "includes/footer.php";
