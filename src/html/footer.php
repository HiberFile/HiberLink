<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    header("Status: 301 Moved Permanently", false, 301);
    header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
    // si le fichier est appelé via un navigateur, rick roll ! :)
    // sinon, donner les variables a PHP
} else {
    ?>
                </div>
            </div>
        <br>
        </section>
    </main>
    <footer class="flex flex-col md:flex-row items-start w-full flex-none self-start p-6 font-medium text-xs text-grey-dark md:items-center justify-between">
        <p><a href="<?php echo env('ext_url'); ?>/mentions.php"><u>Mentions légales</u></a> | <span class="copyleft">&copy;</span> 2020 <i>HiberFile Team</i> | <u><a href="https://github.com/HiberFile/HiberLink/commit/<?php echo get_current_git_commit()?>"><?php echo get_current_git_commit("master", true)?></a></u></p>
        <ul class="list-reset flex flex-col md:flex-row items-start md:items-center md:justify-end" >
            <br>
            <li><?php echo env('title'); ?> est un service de création de petits liens simple, gratuit et <u><a href="https://github.com/HiberFile/HiberLink" target="_blank">open source</a></u>.</li>
        </ul>
    </footer>
</body>
</html>
<?php
}
