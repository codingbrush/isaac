<?php

/**
 * The view that is shown to the user.
 * @param String $file
 * @param array $data
 */
function view(String $file, $data = [])
{
    $view = "app/views/$file.view.php";
    if (isset($data)) {
        extract($data);
    }

    if (file_exists($view)) {
        //echo "FILE EXISTS";
        require "app/views/" . $file . ".view.php";
    }

}

/**Redirects to a specified page
 * @param String $location
 * @param int $refresh
 */
function redirect(String $location, int $refresh = 1)
{
    header("Location:" . $location, "Refresh:" . $refresh);
    exit;
}

function clean(String $data)
{
    return htmlentities(trim($data));
}

/**
 * serverName.
 *
 * @return String
 * @since    v0.0.1
 * @version    v1.0.0    Sunday, February 24th, 2019.
 * @author    eonflux
 * @global
 */
function serverName(): String
{
    $serverName = $_SERVER['SERVER_NAME'];
    return $serverName;
}

/**
 * @description Set the session variables needed for session flashing
 * @param string $status
 * @param string $message
 */
function session_create(string $status, string $message)
{
    $_SESSION['status']  = $status;
    $_SESSION['message'] = $message;
}

/**
 * @description Show the session message and status and unset them
 */
function session_show()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['status']);
        unset($_SESSION['message']);
    }
}

/**
 * isLoggedIn.
 *
 * @author    eonflux
 * @since    v0.0.1
 * @version    v1.0.0    Wednesday, March 13th, 2019.
 * @global
 * @return    boolean
 */
function isLoggedIn()
{
    if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 'true') {
        return true;
    }
}

function isAdmin()
{
    if ($_COOKIE['isAdmin'] == 'true') {
        return true;
    }

}

function is(string $uri)
{
    if(is_string($uri)){
        return ($_SERVER['REQUEST_URI'] == $uri) ? true : false;
    }
        
}

function dd($data)
{
    return die(var_dump($data));
}
