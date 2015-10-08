<?php




# AUTH
Route::controllers([
    'auth' => 'Admin\Auth\AuthController',
    'password' => 'Admin\Auth\PasswordController'
]);





### GROUPE ADMIN ###

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' =>  ['auth', 'enable']], function() {

    Route::post('message', function () {
        // this fires the event
        event(new App\Events\TchatEvent(\Illuminate\Support\Facades\Input::get('message')));
        return array(true);
    });

    # Task
    Route::post('task', ['uses' => 'DashboardController@task', 'as' => 'task']);


    # Api
    Route::controllers([
        'api' => 'ApiController',
    ]);

    # HOME
    Route::get('/', ['uses' => 'DashboardController@dashboard', 'as' => 'dashboard']);

});
