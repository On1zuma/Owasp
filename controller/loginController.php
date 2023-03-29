<?php

class LoginController
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=owasp;charset=utf8;', 'root', '');
    }

    public function decrypte($password)
    {
        $cipher = "aes-256-ctr";
        $options = 0;
        $ec_iv = '1234567891011121'; // to prevent for same messages
        $encryption_key = "98263795632975618726418765128756217856128753";
        $i = 1;

        $passwordDec=openssl_decrypt(
            $password,
            $cipher,
            $encryption_key,
            $options,
            $ec_iv
        );

        return $passwordDec;
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

    public function login($login, $password)
    {
        if (!empty($login) and !empty($password)) {
            $login = htmlspecialchars($login);
            $password = htmlspecialchars($password);

            $password = $this->crypte($password);

            $getUsers = $this->bdd->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
            $getUsers->execute(array($login, $password));

            if ($getUsers->rowCount() > 0) {
                $_SESSION['user_id'] = $getUsers->fetch()['id'];
                $_SESSION['pseudonyme'] = $login;

                echo"you are now logged in";
                header('Location: dashboard.php');
            } else {
                echo "Please enter good username and password...";
            }
        } else {
            echo "Please enter good username and password...";
        }
    }
}
