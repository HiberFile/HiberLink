<?php

if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    header("Status: 301 Moved Permanently", false, 301);
    header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
    // si le fichier est appelé via un navigateur, rick roll ! :)
    // sinon, donner les variables a PHP
} else {
    ?>
<!DOCTYPE html>
<html lang="<?php echo env('lang'); ?>" prefix="og: http://ogp.me/ns#">
<head>
    <!-- javascript -->
    <script src="<?php echo env('ext_url'); ?>/src/js/clipboard.js"></script>
    <script src="<?php echo env('ext_url'); ?>/src/js/main.js"></script>
    <script src="<?php echo env('ext_url'); ?>/src/js/sweetalert.js"></script>

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="<?php echo env('ext_url'); ?>/src/css/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo env('ext_url'); ?>/src/css/main.css" />

    <!-- icons -->
    <link rel="apple-touch-icon" href="<?php echo env('ext_url'); ?>/src/img/logo.png"/>
    <link rel="icon" href="<?php echo env('ext_url'); ?>/src/img/favicon.ico"/>

    <!-- meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1">
    <meta name="application-name" content="<?php echo env('title'); ?>">
    <meta name="msapplication-tooltip" content="<?php echo env('title'); ?>"/>
    <meta name="description" content="<?php echo env('title'); ?> - Service de réduction de liens.">

    <meta property="og:url" content="<?php echo env('ext_url'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo env('title'); ?>">
    <meta property="og:image" content="<?php echo env('ext_url'); ?>/src/img/logo.png">
    <meta property="og:image:alt" content="<?php echo env('title'); ?> - Service de réduction de liens.">
    <meta property="og:description" content="<?php echo env('title'); ?> - Service de réduction de liens.">
    <meta property="og:site_name" content="<?php echo env('title'); ?>">
    <meta property="og:locale" content="fr_FR">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@hiberfile">
    <meta name="twitter:creator" content="@brunopaiva_15">
    <meta name="twitter:url" content="<?php echo env('ext_url'); ?>">
    <meta name="twitter:title" content="<?php echo env('title'); ?>">
    <meta name="twitter:description" content="<?php echo env('title'); ?> - Service de réduction de liens.">
    <meta name="twitter:image" content="<?php echo env('ext_url'); ?>/src/img/logo.png">
    <meta name="twitter:image:alt" content="<?php echo env('title'); ?> - Service de réduction de liens.">
    <meta name="twitter:dnt" content="on">

    <title><?php echo env('title'); ?></title>

    <?php
    if (env("matomo") == true) {
        ?>
        <!-- Matomo -->
        <script type="text/javascript">
            var _paq = window._paq || [];
            /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
            _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
            _paq.push(['trackPageView']);
            _paq.push(['enableLinkTracking']);
            (function() {
                var u="<?php echo env('matomo_url'); ?>";
                _paq.push(['setTrackerUrl', u+'matomo.php']);
                _paq.push(['setSiteId', '<?php echo env('matomo_siteid'); ?>']);
                var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
                g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
            })();
        </script>
        <noscript><p><img src="<?php echo env('matomo_url'); ?>matomo.php?idsite=<?php echo env('matomo_siteid'); ?>&amp;rec=1" style="border:0;" alt="" /></p></noscript>
        <!-- End Matomo Code -->
        <?php
    }
    ?>
</head>
<body class="flex flex-col items-center font-sans md:h-screen md:bg-grey-lightest">
    <header class="relative flex-none flex flex-row items-center justify-between w-full px-6 h-16 md:h-24 z-20 bg-transparent">
        <a href="<?php echo env('ext_url'); ?>"><img class="imglogo" src="<?php echo env('ext_url'); ?>/src/img/logo.png" width="158" alt="Logo de <?php echo env('title'); ?>"/></a>
    </header>
    <main class="main">
        <section class="h-full w-full p-6 md:flex md:flex-row md:rounded-lg md:shadow-big">
            <div class="px-2 w-full md:px-0">
                <div class="flex flex-col items-center justify-center border-2 border-dashed border-grey beaurounded px-6 py-16 h-full w-full">
    <?php
}
