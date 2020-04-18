<?php
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    header("Status: 301 Moved Permanently", false, 301);
    header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
    // si le fichier est appelé via un navigateur, rick roll ! :)
    // sinon, donner les variables a PHP
} else {
    // https://medium.com/@hfally/how-to-create-an-environment-variable-file-like-laravel-symphonys-env-37c20fc23e72
    $success = include "env.php";

    if (!$success) {
        echo "Missing env.php, copy env.example.php to env.php\n";
        die();
    }

    if (!function_exists("env")) {
        function env($key, $default = null)
        {
            $value = getenv($key);
            if ($value === false) {
                return $default;
            }
            return $value;
        }
    }

    if (!function_exists("is_curl")) {
        function is_curl() {
            # is the page being curl'd, wget'd or shown thru a browser ?
            if (stristr($_SERVER["HTTP_USER_AGENT"], 'curl')) {
                # page is cURL'd
                return True;

            } else {
                # page is being accessed from a web browser
                return False;
            }
        }
    }

    if (!function_exists("get_current_git_commit")) {
        # https://gist.github.com/stevegrunwell/3363975
        function get_current_git_commit($branch = 'master') {
            if ($hash = file_get_contents(sprintf('.git/refs/heads/%s', $branch))) {
                return $hash;
            } else {
                return false;
            }
        }
    }
}