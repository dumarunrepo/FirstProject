angular.module('starter.controllers', [])

.controller('DashCtrl', function($scope, $state) {
	$scope.showBetaScreen = function () {
		$state.go('tab.beta');
	}
})

.controller('SalesCtrl', function($scope) {
  
})

.controller('SupportCtrl', function($scope) {
})

.controller('ShareCtrl', function($scope) {
})

.controller('FeedbackCtrl', function($scope) {
	$scope.openPDF = function() {
	 alert("Hi");
     var ref = window.open('http://www.i-drain.net/userfiles/file/einbauanleitung_iboard.pdf', '_blank', 'location=yes');
     ref.addEventListener('loadstart', function(event) { alert('start: ' + event.url); });
     ref.addEventListener('loadstop', function(event) { alert('stop: ' + event.url); });
     ref.addEventListener('loaderror', function(event) { alert('error: ' + event.message); });
     ref.addEventListener('exit', function(event) { alert(event.type); });
}
})

.controller('BetaViewCtrl', function($scope) {
});
