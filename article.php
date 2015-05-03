<?php
    include_once('includes/connection.php');
    include_once('includes/article.php');
    
   if (isset($_GET['id'])){
       //display artilce
       $id = $_GET['id'];
       $article = new Article();
       $data = $article->fetch_article($id);
       
       displayArticle($data); 
   } else {
       header('Location: index.php');
       exit();
   }
   
   function displayArticle($data){
     include_once('./partials/header.php');
     echo "<h2>{$data['article_title']}</h2>";
     echo "<small>Posted on " . date('l jS', $data['article_timestamp']) . "</small>";
     echo "<p>{$data['article_content']}</p>";
     echo "<a href='index.php'>&larr; Back <a>";
     include_once('./partials/footer.html');
   }
?>
