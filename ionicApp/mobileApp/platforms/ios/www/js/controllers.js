angular.module('starter.controllers', [])

.controller('DashCtrl', function($scope, $state) {
	$scope.showBetaScreen = function () {
		$state.go('tab.beta');
	}
})

.controller('ProjectInfoViewCtrl', function($scope, $state) {
  $scope.goBack = function () {
		$state.go('tab.beta');
	}
})

.controller('TrackProjectViewCtrl', function($scope, $state) {
  $scope.goBack = function () {
		$state.go('tab.beta');
	}
})

.controller('SalesCtrl', function($scope, $state) {
  $scope.goBack = function () {
		$state.go('tab.beta');
	}
})

.controller('SupportCtrl', function($scope, $state) {
	$scope.goBack = function () {
			$state.go('tab.beta');
	}
})

.controller('ShareCtrl', function($scope, $state) {
	$scope.goBack = function () {
		$state.go('tab.beta');
	}
})

.controller('FeedbackCtrl', function($scope, $state) {
	$scope.goBack = function () {
		$state.go('tab.beta');
	}
	
	$scope.openPDF = function() {
	 alert("Hi");
     var ref = window.open('http://www.i-drain.net/userfiles/file/einbauanleitung_iboard.pdf', '_blank', 'location=yes');
     ref.addEventListener('loadstart', function(event) { alert('start: ' + event.url); });
     ref.addEventListener('loadstop', function(event) { alert('stop: ' + event.url); });
     ref.addEventListener('loaderror', function(event) { alert('error: ' + event.message); });
     ref.addEventListener('exit', function(event) { alert(event.type); });
}
})

.controller('BetaViewCtrl', function($scope, $state) {
	$scope.goBack = function () {
		$state.go('tab.beta');
	}

	$scope.goBack = function () {
		$state.go('tab.dash');
	}
});
