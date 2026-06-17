<?php
session_start();

/* kosongkan session */
$_SESSION = [];

/* hapus cookie session */
if (ini_get("session.use_cookies")) {

    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

/* hancurkan session */
session_destroy();

/* redirect ke login */
header("Location: login.php");
exit();
?>