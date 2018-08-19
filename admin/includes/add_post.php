<?php
if (isset($_POST['create_post'])) {
    $title = escape($_POST['title']);
    $author = escape($_SESSION['username']);
    $image = escape($_FILES['image']['name']);
    $image_temp = escape($_FILES['image']['tmp_name']);
    $content = escape($_POST['content']);
    
    //funktion som laddar upp bilden
    move_uploaded_file($image_temp, "../img/$image");

    $query = "INSERT INTO post(title,text,author,image) VALUES('{$title}','{$content}','{$author}','{$image}')";

    $create_post_query = mysqli_query($connection, $query);

    confirmQuery($create_post_query);
    echo "<p>Post successfully created!</p>";
}
?>

    <div class="content-container">
        <div class="content-box">
            <h1>Add Post</h1>
        </div>
        <form method="post" enctype="multipart/form-data">

            <div class="content-box">
                <label for="title">Title</label>
                <input type="text" name="title" id="title">
            </div>

            <div class="content-box">
                <input type="file" name="image">
            </div>
            <div class="content-box">
                <textarea name="content" cols="30" rows="10">
        </textarea>
            </div>

            <div class="content-box">
                <input class="button" type="submit" name="create_post" value="POST">
            </div>
        </form>
    </div>