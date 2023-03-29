<?php
include('./components/navbar.php');

if (isset($_POST['send'])) {
    $objet = new LoginController();
    $objet->login($_POST["login"], $_POST["password"]);
}


?>
<div class="mx-auto" style="width: 70vw; margin-top: 2rem;">
    <h1>Login</h1><br>
    <form style="margin-bottom: 2rem;" method="post">
    <div class="form-group">
        <label for="username">Login</label>
        <input type="text" class="form-control" placeholder="Enter login" name="login">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password">
    </div>
        <button type="submit" class="btn btn-primary" name="send">Submit</button>
    </form>
    login : test ;
    password : test
</body>
</html>
