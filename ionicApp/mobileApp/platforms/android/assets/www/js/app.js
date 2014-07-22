// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
// 'starter.services' is found in services.js
// 'starter.controllers' is found in controllers.js
angular.module('starter', ['ionic', 'starter.controllers', 'starter.services', 'starter.factories'])

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if(window.cordova && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
    }
    if(window.StatusBar) {
      // org.apache.cordova.statusbar required
      StatusBar.styleDefault();
    }
  });
})

.config(function($stateProvider, $urlRouterProvider) {

  // Ionic uses AngularUI Router which uses the concept of states
  // Learn more here: https://github.com/angular-ui/ui-router
  // Set up the various states which the app can be in.
  // Each state's controller can be found in controllers.js
  $stateProvider

    // setup an abstract state for the tabs directive
    .state('tab', {
      url: "/tab",
      abstract: true,
      templateUrl: "templates/tabs.html"
    })

    // Each tab has its own nav history stack:

    .state('tab.dash', {
      url: '/dash',
      views: {
        'tab-dash': {
          templateUrl: 'templates/tab-dash.html',
          controller: 'DashCtrl'
        }
      }
    })

    .state('tab.sales', {
      url: '/sales',
      views: {
        'tab-dash': {
          templateUrl: 'templates/tab-sales.html',
          controller: 'SalesCtrl'
        }
      }
    })

    .state('tab.notification', {
      url: '/notification',
      views: {
        'tab-dash': {
          templateUrl: 'templates/tab-notification.html',
          controller: 'NotificationCtrl'
        }
      }
    })

    .state('tab.statistics', {
      url: '/statistics',
      views: {
        'tab-dash': {
          templateUrl: 'templates/tab-statistics.html',
          controller: 'StatisticsCtrl'
        }
      }
    })

    .state('tab.products', {
      url: '/products',
      views: {
        'tab-dash': {
          templateUrl: 'templates/tab-products.html',
          controller: 'ProductsCtrl'
        }
      }
    })

    .state('tab.beta', {
      url: '/beta',
      views: {
        'tab-dash': {
          templateUrl: 'templates/tab-beta.html',
          controller: 'BetaViewCtrl'
        }
      }
    })

    .state('tab.support', {
      url: '/support',
      views: {
        'tab-dash': {
          templateUrl: 'templates/tab-support.html',
          controller: 'SupportCtrl'
        }
      }
    })

    .state('tab.share', {
      url: '/share',
      views: {
        'tab-dash': {
          templateUrl: 'templates/tab-share.html',
          controller: 'ShareCtrl'
        }
      }
    })

    .state('tab.feedback', {
      url: '/feedback',
      views: {
        'tab-dash': {
          templateUrl: 'templates/tab-feedback.html',
          controller: 'FeedbackCtrl'
        }
      }
    })

    .state('tab.projectInfoView', {
      url: '/projectInfoView',
      views: {
        'tab-dash': {
          templateUrl: 'templates/tab-project-info-view.html',
          controller: 'ProjectInfoViewCtrl'
        }
      }
    })

    .state('tab.trackProjectView', {
      url: '/trackProjectView',
      views: {
        'tab-dash': {
          templateUrl: 'templates/tab-track-project-view.html',
          controller: 'TrackProjectViewCtrl'
        }
      }
    })

  // if none of the above states are matched, use this as the fallback
  $urlRouterProvider.otherwise('/tab/dash');

});

