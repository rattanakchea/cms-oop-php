<?php
    include_once('includes/connection.php');
    include_once('includes/article.php');
    
    $article = new Article();
    $articles = $article->fetch_all();
?>

<?php
     include_once('./partials/header.php');
?>
          <ol>
              <?php foreach($articles as $a){?>
                   <li><a href="article.php?id=<?= $a['article_id'] ?>"><?= $a['article_title'] ?></a>
                       - <small>Posted on <?= date('l jS', $a['article_timestamp']) ?> by Admin</small>
                  Category
                  
              </li>
              <?php } ?>
                     
          </ol>
<?php
     include_once('./partials/footer.html');