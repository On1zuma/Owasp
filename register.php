<?php
include('./components/navbar.php');

if (isset($_POST['send'])) {
    $objet = new RegisterController();
    $objet->register($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST["email"], $_POST["password"]);
}


?>
<div class="mx-auto" style="width: 70vw; margin-top: 2rem;">
    <h1>Register</h1><br>
    <form style="margin-bottom: 2rem;" method="post">
    <div class="form-group">
        <label for="firstname">First name</label>
        <input type="text" class="form-control" id="firstname" aria-describedby="loginHelp" placeholder="Enter first name" name="firstname">
    </div>
    <div class="form-group">
        <label for="lastname">Last name</label>
        <input type="text" class="form-control" id="lastname" aria-describedby="loginHelp" placeholder="Enter last name" name="lastname">
    </div>
    <div class="form-group">
        <label for="username">Login</label>
        <input type="text" class="form-control" id="username" aria-describedby="loginHelp" placeholder="Enter login" name="username">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" aria-describedby="loginHelp" placeholder="Enter email" name="email">
        <small id="loginHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
    </div>
        <button type="submit" class="btn btn-primary" name="send">Submit</button>
    </form>
</body>
</html>
