<?php

require "autoload.php";

$argument = preg_split('/[\/].*[?]/', $_SERVER["REQUEST_URI"]);
if (sizeof($argument) === 2) {
    $argument = $argument[1];

    $dsn = "mysql:host=" . env("mysql_address") . ";dbname=" . env("mysql_databse") . ";port=".env("mysql_port").";charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
        $pdo = new PDO($dsn, env("mysql_username"), env("mysql_password"), $options);
        $pdo->exec("use hiberlink");
    } catch (PDOException $e) {
        die($e->getMessage()." ".(int)$e->getCode());
    }

    $req = $pdo->prepare("select * from LINKS where id = ?");
    $req->execute([$argument]);

    $row = $req->fetch();
    if (isset($row['original'])) {
        $original = $row['original'];
        $prettier = preg_replace("/^htt(ps|p):\/\//i", "", $original);
        $prettier = preg_replace("/(\/.*)+/i", "", $prettier);

        if (is_curl()) {
            die($row['original']);
        }
        #header("refresh:5;url=" . $original);
        add_header();
        ?>
        <div class="center">
            <h1>HiberLink</h1><br>
            <p>Vous allez être rediriger vers <code><?= $prettier ?></code> dans 5 secondes.</p>
            <br><br>
            <a href="<?= $original ?>" class="btn rounded-lg mt-2">Acceder directement au site</a>
            <br><br><br><br>
            <a class="btn rounded-lg mt-2" href="javascript:history.back()">Revenir en arrière</a>
            <br><br><br>
            <small class="blue outline"><a href="<?= env('ext_url') ?>/why-susp.php">Pourquoi je vois cette page ?</a></small>
        </div>
        <?php
    } else {
        add_header();
        ?>
        <div class="center"><h4>Ce lien n'existe pas.</h4></div>
        <a class="btn rounded-lg flex items-center mt-2" href="<?= env("ext_url") ?>">Revenir à l'accueil</a>
        <?php
    }
} else {
    add_header();
    ?>
                    <img src="<?= env('ext_url') ?>/src/img/add.png" width="48" alt="+">
                    <div class="center"><h4>Transformez votre lien dès maintenant.</h4></div>
                    <form method="post" action="<?= env('ext_url') ?>/link.php">
                        <center>
                            <input placeholder="Lien original" type="text" name="link" class="border rounded-lg w-full px-2 py-1 h-14 mb-3 text-lg text-grey-darker leading-loose" required>
                            <input id="buttonsend" type="submit" value="Transformation" name="submit" class="btn rounded-lg flex items-center mt-2">
                        </center>
                    </form>
    <?php
}

add_footer();
