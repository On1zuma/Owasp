<?php
include('./components/navbar.php');


?>

<div class="mx-auto" style="width: 70vw; margin-top: 2rem;">
    <form style="margin-bottom: 2rem;" method="post">
        <div class="form-group">
            <label for="firstname">First name</label>
            <input type="text" class="form-control" id="firstname" placeholder="Enter first name" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Last name</label>
            <input type="text" class="form-control" id="lastname" placeholder="Enter last name" name="lastname">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="Enter address" name="address">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
            <small id="loginHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="pid">PID</label>
            <input type="file" class="form-control" id="pid" placeholder="Enter pid" accept="image/png, image/jpeg" name="pid">
        </div>
        <button type="submit" class="btn btn-primary" name="send">Submit</button>
    </form>
</div>