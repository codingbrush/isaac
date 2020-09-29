<?php

use Isaac\Core\Http\Router;

/* Get Routes */
Router::get('/','SiteController@index');
Router::get('/about','SiteController@about');
Router::get('/contact','SiteController@contact');
Router::get('/login','SiteController@login');

/* Post Routes */
Router::post('/contact','ContactController@send');
Router::post('/login','AuthController@login');