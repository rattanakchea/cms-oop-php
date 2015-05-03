<?php

include_once('../includes/connection.php');
include_once('../partials/header.php');
if (isset($_SESSION['logged_in'])) { ?>
    <ol>
        <li><a href="/admin/add.php">Add Article</a></li>
        <li><a href="/admin/delete.php">Delete Article</li>
    </ol>
<?php } else {
    //isset return true even when empty string, return false when NULL and not set
    if (isset($_POST['username'], $_POST['password'])){
        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);
        
        if (empty($username) || empty($password)) {
            $error = 'All fields are required';
        } else {
            //check credentials with database
            $query = $pdo->prepare("SELECT count(*) FROM users WHERE user_name = ? AND user_password = ?");
            $query->bindValue(1, $username);
            $query->bindValue(2, md5($password));
            $query->execute();
            //$query->fetch();
            $data = ($query->fetch());
            $num = $data[0];
            echo $num;
            if ($num == 1) {
                //correct credentails
                $_SESSION['logged_in'] = true;
                header('Location: index.php');
                exit();
            } else {
                $error = 'Incorrect username and password';
            }
        }
    } else {    
        if (isset($error)){
            echo"<small style=\"color:red\">$error</small>";
        }
        ?>

        <form method="post" class="navbar-form" role="form"
              autocomplete="off">
                <div class="form-group">
                  <input name="username" type="text" placeholder="Username" class="form-control">
                </div>
                <div class="form-group">
                  <input name="password" type="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Log in</button>
              </form>
    <?php }  
 }

include_once('../partials/footer.html');
