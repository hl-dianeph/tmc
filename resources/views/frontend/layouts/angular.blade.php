<!-- index.html -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('multiform.css') }}">

</head>

<!-- apply our angular app -->
<body ng-app="formApp">

    <div class="container">

        <!-- views will be injected here -->
        <div ui-view></div>

    </div>


    <!-- JS -->
    <!-- load angular, nganimate, and ui-router -->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.10/angular-ui-router.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-animate.min.js"></script>
    <script>
        // app.js
        // create our angular app and inject ngAnimate and ui-router 
        // =============================================================================
        angular.module('formApp', ['ngAnimate', 'ui.router'])

        // configuring our routes 
        // =============================================================================
        .config(function($stateProvider, $urlRouterProvider) {

            $stateProvider

                // route to show our basic form (/form)
                .state('form', {
                    url: '/form',
                    templateUrl: 'form.html',
                    controller: 'formController'
                })

                // nested states 
                // each of these sections will have their own view
                // url will be nested (/form/profile)
                .state('form.profile', {
                    url: '/profile',
                    templateUrl: 'form-profile.html'
                })

                // url will be /form/interests
                .state('form.interests', {
                    url: '/interests',
                    templateUrl: 'form-interests.html'
                })

                // url will be /form/payment
                .state('form.payment', {
                    url: '/payment',
                    templateUrl: 'form-payment.html'
                });

            // catch all route
            // send users to the form page 
            $urlRouterProvider.otherwise('/form/profile');
        })

        // our controller for the form
        // =============================================================================
        .controller('formController', function($scope) {

            // we will store all of our form data in this object
            $scope.formData = {};

            // function to process the form
            $scope.processForm = function() {
                alert('awesome!');
            };

        });
    </script>

</body>
</html>