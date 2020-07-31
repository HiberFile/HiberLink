<?php

require "autoload.php";

add_header();

?>
    <h2>Qu'est-ce que <?= env('title') ?> ?</h2>
    <p><?= env('title') ?> est un service de création de petits liens (tel que bit.ly par exemple) gratuits, <a class="blue" href="https://github.com/hiberfile/hiberlink">open source</a> et indépendant créé par l'équipe du projet de <a class="blue" href="https://hiberfile.com">HiberFile</a>.</p>
    <p>Si vous êtes tombé sur <?= env('title') ?> sans connaitre le site c'est que quelqu'un a voulu partager un lien avec vous en utilisant <?= env('title') ?> pour fournir un lien plus petit que l'original</p>
    <hr>
    <h2>Pourquoi dois-je passer par ces 5 secondes avant d'acceder aux liens ?</h2>
    <p><b>hiber.link</b>, le nom de domaine de l'instance principale du projet <i>HiberLink</i> (qui alimente cette page) à récemment été suspendu car il était trop facile d'envoyer les utilisateurs vers des liens d'arnaques ou des téléchargement de virus sans que l'utilisateur puisse arreter les redirections, nous avons donc ajouté cette page de confirmation pour limiter les problemes dans le futur.</p>
<?php

add_footer();