<?php
   include("includes/db.php");
   $query = "DROP TABLE post, user, image, linkimagetopost, page";
   db_query($query);
   echo("Done!");