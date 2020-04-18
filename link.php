<?php

require "autoload.php";

if (! is_curl()) {
    require "src/html/header.php";
}

// https://stackoverflow.com/a/31107425/10503297
function random_str(int $length = 8, string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

if (isset($_POST["link"])) {
    $link = $_POST["link"];

    if (filter_var($link, FILTER_VALIDATE_URL)) {
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

        while (true) {
            $id = random_str();
            $req = $pdo->prepare("select * from LINKS where id = ?");
            $req->execute([$id]);

            $row = $req->fetch();
            if (! isset($row['original'])) {
                break;
            }
        }

        # tiny hack to do a unique ID
        $req = $pdo->prepare("insert into LINKS (id, original, time) values (?, ?, ?)");
        $req->execute([$id, $link, time()]);

        $req = $pdo->prepare("select * from LINKS where id = ?");
        $req->execute([$id]);

        $row = $req->fetch();
        if (! isset($row['original']) && ! is_curl()) {
            ?>
            <div class="center"><h4>Une erreur inconnue est survenue.</h4></div>
            <a class="btn rounded-lg flex items-center mt-2" href="<?php echo env("ext_url"); ?>">Revenir à l'accueil</a>
            <?php
        } elseif (! isset($row['original']) && is_curl()) {
            echo "erreur";
        } elseif (isset($row['original']) && ! is_curl()) {
            ?>
            <img src="<?php echo env("ext_url"); ?>/src/img/ok.png" alt="ok">
            <p class="center"><h4>Votre lien est prêt. Partagez le dès maintenant.</h4></p>
            <center>
                <input type="text" id="lien" class=" border rounded-lg w-full px-2 py-1 h-14 mb-3 text-lg text-grey-darker leading-loose" value="<?php echo env("ext_url")."/?".$id; ?>">
            </center>
            <button class="btn rounded-lg flex items-center mt-2" onclick="copytoclipboard();" >Copier dans le presse-papier</button>
            <a class="btn rounded-lg flex items-center mt-2" href="<?php echo env("ext_url"); ?>">Revenir à l'accueil</a>
            <?php
        } elseif (isset($row['original']) && is_curl()) {
            echo env("ext_url")."/?".$id;
        }

    } elseif (! isset($_POST["link"]) && ! is_curl()) {
        ?>
        <div class="center"><h4>Lien invalide.</h4></div>
        <a class="btn rounded-lg flex items-center mt-2" href="<?php echo env("ext_url"); ?>">Revenir à l'accueil</a>
        <?php
    } elseif (! isset($_POST["link"]) && is_curl()) {
        echo "erreur:";
    }

} else {
    header("Status: 301 Moved Permanently", false, 301);
    header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
}
if (! is_curl()) {
    require "src/html/footer.php";
}