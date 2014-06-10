angular.module('starter.controllers', [])

.controller('DashCtrl', function($scope, $state, BNAppGenericFactory, sharedProperties) {
	$scope.projectList = [];
	$scope.projectSelected = "";
	$scope.fetchAllAllowedProjects = function () {
		var cellnumber = "9590946168";
		BNAppGenericFactory.fetchAllAllowedProjects(cellnumber).success (function (data) {
			data.Projects.forEach (function (dat) {
				$scope.projectList.push(dat.projects)
			});
		})
	};

	$scope.showBetaScreen = function () {
		alert(JSON.stringify($scope.projectSelected));
		//sharedProperties.setProjectId($scope.projectSelected.project_id)
		$state.go('tab.beta');
	};
	$scope.fetchAllAllowedProjects();
})

.controller('ProjectInfoViewCtrl', function($scope, $state) {
  $scope.goBack = function () {
		$state.go('tab.beta');
	}
})

.controller('TrackProjectViewCtrl', function($scope, $state, sharedProperties) {
  //alert(sharedProperties.getProjectId());
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

.controller('FeedbackCtrl', function($scope, $state, BNAppGenericFactory) {
	$scope.goBack = function () {
		$state.go('tab.beta');
	}
	
	$scope.openPDF = function() {

		alert("Making request");
		BNAppGenericFactory.getAllCategories ().success (function (data) {
			alert(JSON.stringify(data))
		})
	 /*alert("Hi");
     var ref = window.open('http://www.i-drain.net/userfiles/file/einbauanleitung_iboard.pdf', '_blank', 'location=yes');
     ref.addEventListener('loadstart', function(event) { alert('start: ' + event.url); });
     ref.addEventListener('loadstop', function(event) { alert('stop: ' + event.url); });
     ref.addEventListener('loaderror', function(event) { alert('error: ' + event.message); });
     ref.addEventListener('exit', function(event) { alert(event.type); });*/
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
