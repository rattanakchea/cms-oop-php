<?php
include_once('../includes/connection.php');
include_once('../partials/header.php');

if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit();
} else {

    //isset return true even when empty string, return false when NULL and not set
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = $pdo->prepare("DELETE FROM articles WHERE article_id = ?");
        $query->bindValue(1, $id);
        $query->execute();
         $num = ($query->rowCount());
         if ($num == 1) {
             echo '<p class="success">Successfully delete the article</p>';
         } else {
             echo '<p class="danger">Something wrong</p>';
         }
        
    } ?>
        <table class="table">
            <?php
            include_once('../includes/article.php');
            $article = new Article();
            $articles = $article->fetch_all();
            foreach ($articles as $a) { ?>
            <tr>
                <td><a href="/article.php?id=<?= $a['article_id'] ?>"><?= $a['article_title'] ?></a>
                    - <small>Posted on <?= date('l jS', $a['article_timestamp']) ?></small>
                    
                </td>
                <td>
                    <a href="delete.php?id=<?= $a['article_id'] ?>">Delete</a>
                </td>
            </tr>
            <?php } ?>

        </table>
    <?php
    }

include_once('../partials/footer.html');
