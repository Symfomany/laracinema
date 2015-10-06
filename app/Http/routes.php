<?php




# AUTH
Route::controllers([
    'auth' => 'Admin\Auth\AuthController',
    'password' => 'Admin\Auth\PasswordController'
]);

### GROUPE ADMIN ###

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' =>  ['auth', 'enable']], function() {

    # HOME
    Route::get('/', ['uses' => 'DashboardController@dashboard', 'as' => 'dashboard']);

});
