<?php

use Isaac\Core\Http\Router;

/* Get Routes */
Router::get('/','SiteController@index');
Router::get('/about','SiteController@about');
Router::get('/contact','SiteController@contact');
Router::get('/login','SiteController@login');
Router::get('/dashboard','DashboardController@dashboard');
Router::get('/users','UsersController@index');
Router::get('/users/{id}','UsersController@show');
Router::get('/reports','ReportsController@index');
Router::get('/reports/create','ReportsController@create');
Router::get('/reports/{id}','ReportsController@edit');

/* dashboards  */
Router::get('/officer/dashboard','OfficerController@index');
Router::get('/farmer/dashboard','FarmerController@index');
/* end of dashboard routes */

/* Error Pages */
Router::get('/404','ErrorStatusController@notFound');
/* End of error pages */



/* Post Routes */
Router::post('/contact','ContactController@send');
Router::post('/login','AuthController@login');
Router::post('/logout','AuthController@logout');
Router::post('/reports','ReportsController@save');

Router::post('/create','UsersController@create');
Router::post('/update/{id}','UsersController@update');