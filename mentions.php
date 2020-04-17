<?php

require "autoload.php";
require "src/html/header.php";
?>
            <main class="main">
                <div class="flex flex-col items-center bg-white m-4 px-6 py-8 border border-grey-light md:border-none md:px-12 md:py-16 shadow w-full md:h-full">
                <h1 class="center">Mentions légales - <?php echo env("title"); ?></h1>
                    <p class="mt-2">Version 1.0 du 17 Avril 2020</p>
                    <div class="overflow-scroll py-8 px-12">
                            <span>Voici absolument tout ce que vous devez savoir sur le service de réduction de liens <?php echo env("title"); ?>.</span></p>
                        <ul class="mt-6 leading-normal">
                            <li class="mb-4"><b><u>Open Source</u></b>: <?php echo env("title"); ?> est Open Source et vous pouvez retrouver le code source à <a href="https://github.com/hiberfile/hiberlink">cette adresse</a>.</li>
                            <li class="mb-4"><b><u>Stockage</u></b>: <?php echo env("title"); ?> reçoit votre lien et le transmet à une base de donnée MySQL, qui s'en charge de le stocker.</li>
                            <li class="mb-4"><b><u>Données Personnelle</u></b>: Voici les données récoltées pour garantir le fonctionnement de HiberLink:<ul class="mt-6 leading-normal">
                            <li class="mb-4"><b><u>Adresse IP</u></b>: Votre adresse IP est récupérée dès que vous accéder au service. Celle-ci sert à compléter les logs sur nos serveurs.</li>
                                    <?php
                                    if (env("matomo") == true) {
                                        ?>
                                        <li class="mb-4"><b><u>Données</u></b>: Nous récoltons uniquement le nom et la version de votre navigateur internet, qui nous sert à des fins de statisques sur Matomo (cf <i>Service Tiers</i>).</li>
                                        <?php
                                    } else {
                                        ?>
                                        <li class="mb-4"><b><u>Données</u></b>: Nous ne récoltions aucune donnée sur les utilisateurs de ce service.</li>
                                        <?php
                                    }
                                    ?>
                            <li class="mb-4"><b><u>Design</u></b>: L'intégralité du design du site de HiberFile est basé sur le design du site de partage de fichiers <a href="https://send.firefox.com"><u>Firefox Send</u></a>, conformément à leurs <a href="https://github.com/mozilla/send/blob/master/LICENSE"><u>mentions légales</u></a>.</li>
                            <li class="mb-4"><b><u>Tarif</u></b>: L’utilisation de ce site web est totalement gratuite. Aucun service payant ne vous sera proposé.</li>
                            <li class="mb-4"><b><u>Service Externe</u></b> :

                                <?php
                                if (env("matomo") == true) {
                                    ?>
                                Nous utilisons <a href="https://fr.matomo.org/"><u>Matomo</u></a> (hébergé à l'adresse <u><a href="<?php echo env('matomo_url'); ?>"><?php echo env('matomo_url'); ?></a></u>).</li>
                                    <?php
                                } else {
                                    ?>
                                        Nous n'utilisons aucun service externe.</li>
                                    <?php
                                    }
                                ?>
                        </ul>
                    </div>
                </div>
            </main>
<?php

require "src/html/footer.php";
