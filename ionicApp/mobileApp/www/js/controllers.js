angular.module('starter.controllers', [])

.controller('DashCtrl', function($scope, $state, BNAppGenericFactory, sharedProperties) {
	$scope.projectList = [];
	$scope.projectSelected = "";
	$scope.bioNivid = {}
	$scope.bioNivid.projectSelected = "";

	$scope.fetchAllAllowedProjects = function () {
		var cellnumber = "9590946168";
		BNAppGenericFactory.fetchAllAllowedProjects(cellnumber).success (function (data) {
			data.Projects.forEach (function (dat) {
				$scope.projectList.push(dat.projects)
			});
		})
	}

	$scope.showBetaScreen = function () {
		sharedProperties.setProjectId($scope.bioNivid.projectSelected.project_id)
		$state.go('tab.beta');
	}

	$scope.fetchAllAllowedProjects();
})

.controller('ProjectInfoViewCtrl', function($scope, $state, BNAppGenericFactory, sharedProperties) {

  var selectedProjectId = sharedProperties.getProjectId();
  $scope.projectInfo = {};

  $scope.getProjectDetails = function (id) {
  	BNAppGenericFactory.fetchProjectDetails(id).success (function (data) {
			var tempProjectInfo = data.Project.Project;
			$scope.projectInfo["name"] = tempProjectInfo.project_name;
			$scope.projectInfo["description"] = tempProjectInfo.description;
			$scope.projectInfo["startDate"] = tempProjectInfo.start_date;
			$scope.projectInfo["endDate"] = (tempProjectInfo.end_date != null)? tempProjectInfo.end_date : "In-progress"
			$scope.projectInfo["status"] = (tempProjectInfo.is_completed)?"Done" : "In-progress";
		})
  }

  $scope.goBack = function () {
		$state.go('tab.beta');
  }

  if (selectedProjectId != "") {
  	$scope.getProjectDetails(selectedProjectId)
  };
})

.controller('TrackProjectViewCtrl', function($scope, $state, BNAppGenericFactory, sharedProperties) {
  alert(sharedProperties.getProjectId());
  $scope.getProjectTrackingInfo = function(id) {
  	$scope.projectTrackingInfo = []
  	BNAppGenericFactory.fetchProjectTrackingDetails(id).success (function (data) {
			var tempProjectInfo = data.Projects;
			tempProjectInfo.forEach(function(step) {
				$scope.projectTrackingInfo.push(step.project_stage)
			})
		})
  }
  $scope.goBack = function () {
		$state.go('tab.beta');
  }

  $scope.openTrackingPDF = function(url) {
     var ref = window.open('http://www.i-drain.net/userfiles/file/einbauanleitung_iboard.pdf', '_blank', 'location=yes');
  }
  $scope.getProjectTrackingInfo(sharedProperties.getProjectId());
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
