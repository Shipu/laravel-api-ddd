<?php

use Dingo\Api\Routing\Router;

$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'auth', 'namespace' => 'Api\\V1\\Account\\Application\\Http\\Controllers\\'], function(Router $api) {
        $api->post('signup', 'SignUpController@signUp');
        $api->post('login', 'LoginController@login');
//        $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
//        $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');
//        $api->post('refresh', 'App\\Api\\V1\\Controllers\\RefreshController@refresh');
//        $api->get('me', 'App\\Api\\V1\\Controllers\\UserController@me');
    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {

        $api->group(['namespace' => 'Api\\V1\\Account\\Application\\Http\\Controllers\\'], function(Router $api) {
            $api->post('me', 'ProfileController@index');
            $api->post('auth/logout', 'LoginController@logout');
            $api->get('users', 'UserController@index');
            $api->get('users/{id}', 'UserController@show');
        });

        $api->get('protected', function() {
            return response()->json([
                'message' => 'Access to protected resources granted! You are seeing this text as you provided the token correctly.'
            ]);
        });
        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function() {
                return response()->json([
                    'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                ]);
            }
        ]);
    });


    $api->get('hello', function() {
        return response()->json([
            'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
        ]);
    });
});