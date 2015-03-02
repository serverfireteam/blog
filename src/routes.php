<?php

/*
|--------------------------------------------------------------------------
| Blog Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// config panel to load from our namespace for panel 
if (\Request::is('panel/Blog/*'))
{
    \Config::set('panel.controllers', 'Serverfireteam\blog\panel');
}

Route::controller('/blog', '\Serverfireteam\blog\BlogController');
