<div class="content-container">
    <div class="content-box">
        <h1>
            All Posts
        </h1>
    </div>
    <div class="content-box">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Created</th>
                    <th>Image</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php
                        $userNameQuery = $_SESSION['username'];
                        $query = "SELECT * FROM post WHERE author = '$userNameQuery'";
                        $select_posts = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_posts)) {
                            $id = escape($row['id']);
                            $author = escape($row['author']);
                            $title = escape($row['title']);
                            $content = escape($row['text']);
                            $created = escape($row['created']);
                            $image = escape($row['image']);

                            echo "<tr>";
                            echo "<td>$id</td>";
                            echo "<td>$author</td>";
                            echo "<td>$title</td>";
                            echo "<td>$created</td>";
                            echo "<td><img width='100' src='../img/$image' alt='post image'></td>";
                            echo "<td><a href='posts.php?source=edit_post&p_id={$id}'>Edit</a></td>";
                            echo "<td><a href='posts.php?delete={$id}'>Delete</a></td>";
                            echo "</tr>";
                        }
                    ?>
            </tbody>
        </table>
    </div>
</div>
<?php
    if(isset($_GET['delete'])) {
        $the_id = escape($_GET['delete']);
        
        $query = "DELETE FROM post WHERE id = {$the_id}";
        $delete_query = mysqli_query($connection, $query);
    }
?>