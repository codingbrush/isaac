<?php

/**
 * The view that is shown to the user.
 * @param String $file
 * @param array $data
 */
function view(String $file, $data = [])
{
    $view = "app/views/$file.view.php";
    if(isset($data))
        extract($data);
    if(file_exists($view))
    {
        //echo "FILE EXISTS";
        require "app/views/". $file .".view.php";
    }
   
}

/**Redirects to a specified page
 * @param String $location
 * @param int $refresh
 */
function redirect(String $location, int $refresh=1){
    header("Location:".$location,"Refresh:".$refresh);
    exit;
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
function serverName() :String
{
    $serverName = $_SERVER['SERVER_NAME'];
    return $serverName;
}

/**
 * isLoggedIn.
 *
 * @author	eonflux
 * @since	v0.0.1
 * @version	v1.0.0	Wednesday, March 13th, 2019.
 * @global
 * @return	boolean
 */
function isLoggedIn(){
    if(isset($_COOKIE['loggedIn']) ){
        return true;
    }
    return false;
}