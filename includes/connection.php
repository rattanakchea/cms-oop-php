<?php

session_start();
//configuration files
//- configure for local and production environment

$host = substr($_SERVER['HTTP_HOST'], 0, 5);
$pdo;

if (in_array($host, array('local', '127.0', '192.1'))) {
    $local = TRUE;
    $production = FALSE;
} else {
    $local = FALSE;
    $production = TRUE;
}

function setUpPath($local) {
    //always use sqlite
    if ($local) {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/';
        //$path = C:\Users\rattanak\MyWorkspace\cms-phpacademy
        $path2 = dirname(__FILE__);
        //$path2 = C:\Users\rattanak\MyWorkspace\cms-phpacademy
        $pathToDB = "sqlite:" . $path . "data/data.sqlite3";
        connectSQLi($pathToDB);
    } else {
        //production
        //PATH
        //('mysql:host=localhost;dbname=testdb;charset=utf8', 'username', 'password');

//        $host = 'fdb12.awardspace.net';
//        $dbname = '1863003_rattanak';
//        $dbuser = '1863003_rattanak';
        $host = 'localhost';
        $dbname = 'rattanak_cmsphp';
        $dbuser = 'rattanak_cmsphp';
        $password = 'r8attanokia5';
        
        //$dsn = 'mysql:host=' . $host . ';' . 'dbname=' . $dbname;
         $dsn = "mysql:host=$host;dbname=$dbname";

        
        connectMySQL($dsn, $dbuser, $password);
    }
}

setUpPath($local);

function connectSQLi($pathToDB) {
    try {
        global $pdo;
        $pdo = new PDO($pathToDB);
    } catch (PDOException $e) {
        echo ($e->errorInfo);
    }
}

function connectMySQL($dsn, $dbuser, $password){
    try {
        global $pdo;
        $pdo = new PDO($dsn, $dbuser, $password);
    } catch (PDOException $e) {
        echo ($e->errorInfo);
    }
}

//debug
// Assume debugging is on. 
if (!isset($debug)) {
    $debug = TRUE;
}

# ***** SETTINGS ***** #
# ******************** #
# **************************** #
# ***** ERROR MANAGEMENT ***** #
// Create the error handler:
function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) {

    global $debug, $contact_email;

    // Build the error message:
    $message = "An error occurred in script '$e_file' on line $e_line: $e_message";

    // Append $e_vars to the $message:
    $message .= print_r($e_vars, 1);

    if ($debug) { // Show the error.
        echo '<div class="error">' . $message . '</div>';
        debug_print_backtrace();
    } else {

        // Log the error:
        //error_log ($message, 1, $contact_email); // Send email.
        // Only print an error message if the error isn't a notice or strict.
        if (($e_number != E_NOTICE) && ($e_number < 2048)) {
            echo '<div class="error">A system error occurred. We apologize for the inconvenience.</div>';
        }
    } // End of $debug IF.
}

// End of my_error_handler() definition.
// Use my error handler:
set_error_handler('my_error_handler');

# ***** ERROR MANAGEMENT ***** #
# **************************** #