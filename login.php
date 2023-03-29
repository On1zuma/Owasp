<?php
session_start();
// if ($_SESSION['id']) {
//     header('Location: list-table.php');
// }

$bdd = new PDO('mysql:host=localhost;dbname=owasp;charset=utf8;', 'root', '');
if (isset($_POST['send'])) {
    if (!empty($_POST['login']) and !empty($_POST['password'])) {
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        // $password = sha1($_POST['password']);

        $getUsers = $bdd->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
        $getUsers->execute(array($login, $password));

        if ($getUsers->rowCount() > 0) {
            $_SESSION['user_id'] = $getUsers->fetch()['id'];
            // $_SESSION['email'] = $getUsers->fetch()['email'];
            $_SESSION['pseudonyme'] = $login;
            // $_SESSION['password'] = $password;
            // header('Location: list-table.php');
            echo"you are now logged in";
        } else {
            echo "Please enter good username and password...";
        }
    } else {
        echo "Please enter good username and password...";
    }
}

include('./components/navbar.php');

?>
<div class="mx-auto" style="width: 70vw; margin-top: 2rem;">
    <h1>Login</h1><br>
    <form style="margin-bottom: 2rem;" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" aria-describedby="loginHelp" placeholder="Enter login" name="login">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
    </div>
        <button type="submit" class="btn btn-primary" name="send">Submit</button>
    </form>
</body>
</html>
