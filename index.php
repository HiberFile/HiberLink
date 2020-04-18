<?php

require "autoload.php";

if (! is_curl()) {
    require "src/html/header.php";
}

$argument = preg_split('/[\/].*[?]/', $_SERVER["REQUEST_URI"]);
if (sizeof($argument) === 2 & strlen($argument[1]) === 8) {
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
        echo $row['original'];
        header("Status: 301 Moved Permanently", false, 301);
        header("Location: ".$row['original']);
    } else {
        ?>
        <div class="center"><h4>Ce lien n'existe pas.</h4></div>
        <a class="btn rounded-lg flex items-center mt-2" href="<?php echo env("ext_url"); ?>">Revenir à l'accueil</a>
        <?php
    }
} else {
    ?>
                    <img src="<?php echo env('ext_url'); ?>/src/img/add.png" alt="+">
                    <div class="center"><h4>Transformez votre lien dès maintenant.</h4></div>
                    <form method="post" action="<?php echo env('ext_url'); ?>/link.php">
                        <center>
                            <input placeholder="Lien original" type="text" name="link" class="border rounded-lg w-full px-2 py-1 h-14 mb-3 text-lg text-grey-darker leading-loose" required>
                            <input id="buttonsend" type="submit" value="Transformation" name="submit" class="btn rounded-lg flex items-center mt-2">
                        </center>
                    </form>
    <?php
}
if (! is_curl()) {
    require "src/html/footer.php";
}