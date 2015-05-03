<?php

include_once('../includes/connection.php');
include_once('../partials/header.php');
if (!isset($_SESSION['logged_in'])) {
     header('Location: index.php');
} else {
    //isset return true even when empty string, return false when NULL and not set
    if (isset($_POST['title'], $_POST['content'])){
        $title = htmlentities($_POST['title']);
        $content = nl2br(htmlentities($_POST['content']));
        
        if (empty($title) || empty($content)) {
            $error = 'All fields are required';
        } else {
            //insert article into database
            $query = $pdo->prepare("INSERT INTO articles (article_title, article_content, article_timestamp) VALUES"
                    . "(?, ?, ?)");
            $query->bindValue(1, $title);
            $query->bindValue(2, $content);
            $query->bindValue(3, time());
            $query->execute();
            //check how many row affected by this query
            $num = ($query->rowCount());
            if ($num > 0) {
                echo '<p>Successfully added an article</p>';
            }
        }
    } else {    
        if (isset($error)){
            echo"<small style=\"color:red\">$error</small>";
        }
        ?>

        <form method="post" role="form"
              autocomplete="off">
                <div class="form-group">
                  <input name="title" type="text" placeholder="Title" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="content" rows="10" cols="50" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Add Article</button>
              </form>
    <?php }  
 }

include_once('../partials/footer.html');
