<?php

class RegisterController
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=owasp;charset=utf8;', 'root', '');
    }

    public function crypte($password)
    {
        $cipher = "aes-256-ctr";
        $options = 0;
        $ec_iv = '1234567891011121'; // to prevent for same messages
        $encryption_key = "98263795632975618726418765128756217856128753";
        $i = 1;

        $passwordEnc = openssl_encrypt(
            $password,
            $cipher,
            $encryption_key,
            $options,
            $ec_iv
        );

        return $passwordEnc;
    }

    public function register($firstnameD, $lastnameD, $usernameD, $emailD, $passwordD)
    {
        if (!empty($firstnameD) && !empty($lastnameD) && !empty($usernameD) && !empty($emailD) && !empty($passwordD)) {
            $firstname = htmlspecialchars($firstnameD);
            $lastname = htmlspecialchars($lastnameD);
            $username = htmlspecialchars($usernameD);
            $email = htmlspecialchars($emailD);
            $password = htmlspecialchars($passwordD);

            $password = $this->crypte($password);

            $checkUsers = $this->bdd->prepare('SELECT * FROM users WHERE username = ? OR email = ?');
            $checkUsers->execute(array($username, $email));

            if ($checkUsers->rowCount() == 0) {
                $insertUser = $this->bdd->prepare('INSERT INTO users (firstname, lastname, username, email, password) VALUES (?, ?, ?, ?, ?)');
                $insertUser->execute(array($firstname, $lastname, $username, $email, $password));
                $_SESSION['user_id'] = $this->bdd->lastInsertId();
                $_SESSION['pseudonyme'] = $username;
                header('Location: dashboard.php');
            } else {
                echo "This username or email already exists...";
            }
        } else {
            echo "Please fill in all the fields...";
        }
    }
}
