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

            $checkUsers = $this->bdd->prepare('SELECT * FROM identifier WHERE username = ?');
            $checkUsers->execute(array($username));

            if ($checkUsers->rowCount() == 0) {
                $insertId = $this->bdd->prepare('INSERT INTO identifier (password, username) VALUES (?, ?)');
                $insertId->execute(array($password, $username));

                $id = $this->bdd->lastInsertId();
                var_dump($id);
                $insertUser = $this->bdd->prepare('INSERT INTO users (firstname, lastname, email, user_id) VALUES (?, ?, ?, ?)');
                $insertUser->execute(array($firstname, $lastname, $email, $id));

                $_SESSION['user_id'] = $id;
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
