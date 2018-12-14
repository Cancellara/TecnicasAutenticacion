<?php

Route::get('/', 'AdminController@index')->name('admin_dashboard');
Route::get('/event', 'AdminController@event')->name('admin_event');