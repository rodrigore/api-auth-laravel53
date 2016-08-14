<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway';
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <example></example>

        <script type="text/javascript" src="/js/app.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.8/angular.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/satellizer/0.14.1/satellizer.min.js"></script>
        <script>
			function formaFea() {
				var $promise = $.get('/api/user', {api_token: '2ZafHY0G0E0kvFg5nDkRSBXw83LvZrNYRH3yOtDeSe9FXapndMBfkWkRUOBC'})

				$promise.done(function(data) {
					console.log('data', data);
				});

				$promise.fail(function(data) {
					console.log('fail', data);
				});
			}

			function formaUnPocoMenosFea() {
                $.ajaxSetup({data: { api_token: '2ZafHY0G0E0kvFg5nDkRSBXw83LvZrNYRH3yOtDeSe9FXapndMBfkWkRUOBC'} });

				var $promise = $.get('/api/user')

				$promise.done(function(data) {
					console.log('data', data);
				});

				$promise.fail(function(data) {
					console.log('fail', data);
				});
			}

			function formaBacan() {
				var token = '2ZafHY0G0E0kvFg5nDkRSBXw83LvZrNYRH3yOtDeSe9FXapndMBfkWkRUOBC';

                $.ajaxSetup({headers: { 'Authorization': 'Bearer ' + token} });

				var $promise = $.get('/api/user')

				$promise.done(function(data) {
					console.log('data', data);
				});

				$promise.fail(function(data) {
					console.log('fail', data);
				});
			}

			function login() {
				var $promise = $.post('/loginApi', {
					email: 'admin@admin.cl',
					password: '123',
					'_token': '{{csrf_token()}}'
				})

				$promise.done(function(data) {
					console.log('data', token);
				});

				$promise.fail(function(data) {
					console.log('fail', data);
				});
			}

			angular.module('apiApp', ['satellizer'])
				.config(function($authProvider) {
					$authProvider.loginUrl = '/loginApi';
				})
				.controller('LoginController', function ($auth, $http) {

					var user = {
						email: 'admin@admin.cl',
						password: '123',
					};

					if (! $auth.isAuthenticated()) {
						console.log('voy a logearme....');
					$auth.login(user)
						.then(function(response) {
							console.log('bacan', response);
						})
						.catch(function(response) {
							console.log('error', response);
						});
					} else {
						$http.get('/api/user').then(function(data) {
							console.log('usuario:', data);
						});
					}
				});


        </script>
    </body>
</html>
