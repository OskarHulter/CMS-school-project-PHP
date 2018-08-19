<?php
if (isset($_GET['p_id'])) {
    $the_post_id = escape($_GET['p_id']);
}
     
    $query = "SELECT * FROM post WHERE id = $the_post_id";
                        $select_posts_by_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $id = escape($row['id']);
    $title = escape($row['title']);
    $content = escape($row['text']);
    $created = escape($row['created']);
    $image = escape($row['image']);
}
if (isset($_POST['update_post'])) {
    $title = escape($_POST['title']);
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    $content = escape($_POST['content']);

    move_uploaded_file($image_temp, "../img/$image");

    if (empty($image)) {   //ser till att bilden är kvar om inget ny väljs
        $query = "SELECT * FROM post WHERE id = $the_post_id";
        $select_image = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($select_image)) {
            escape($image = $row['image']);
        }
    }

    $query = "UPDATE post SET title = '{$title}', text = '{$content}', image = '{$image}' WHERE id = {$the_post_id}";
    $update_post = mysqli_query($connection, $query);
                        
    confirmQuery($update_post);
    echo "<p>Post successfully updated!</p>";
}


?>
    <div class="content-container">
        <div class="content-box">
            <h1>
                Edit Post
            </h1>
        </div>
    </div>
    <div class="content-container">
        <form method="post" enctype="multipart/form-data">
            <div class="content-box">
                <label for="title">Title</label>
                <input value="<?php echo $title; ?>" type="text" class="form-control" name="title" id="title">
            </div>

            <div class="content-box">
                <img width="100" src="../img/<?php echo $image; ?>" alt="">
                <input type="file" name="image">
            </div>

            <div class="content-box">
                <textarea name="content" cols="30" rows="10"><?php echo $content; ?></textarea>
            </div>

            <div class="content-box">
                <input class="button" type="submit" name="update_post" value="POST">
            </div>
        </form>
    </div>