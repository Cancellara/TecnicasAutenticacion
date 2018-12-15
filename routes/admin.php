<?php

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
Route::catch(function () {
    throw new NotFoundHttpException;
});

Route::get('/', 'AdminController@index')->name('admin_dashboard');
Route::get('/event', 'AdminController@event')->name('admin_event');

