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
Router::get('/announcements','AnnouncementController@index');
Router::get('/announcements/create','AnnouncementController@create');
Router::get('/announcements/{id}','AnnouncementController@edit');

/* profile */
Router::get('/profile','ProfileController@index');
/* end of the profile */
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

Router::post('/announcements','AnnouncementController@store');
Router::post('/announcements/update/{id}','AnnouncementController@update');
Router::post('/announcements/{id}','AnnouncementController@destroy');
Router::post('/reports/{id}','ReportsController@destroy');
Router::post('/reports/update/{id}','ReportsController@update');