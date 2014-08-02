angular.module('starter.controllers', [])

.controller('DashCtrl', function($scope, $state, BNAppGenericFactory, sharedProperties) {
	$scope.projectList = [];
	$scope.projectSelected = "";
	$scope.bioNivid = {}
	$scope.bioNivid.projectSelected = "";
	$scope.bioNivid.phoneNumber = "";
	$scope.bioNivid.isMobileNumberEntered = false;
  $scope.bioNivid.client = "";

	$scope.toggleFirstScreen = function () {
		$scope.bioNivid.isMobileNumberEntered = false;
		$scope.projectList = [];
	}

  $scope.projectChanged = function (data) {
    $scope.bioNivid.client = data.client;
  }

	$scope.newNumberEntered = function () {
		if($scope.bioNivid.phoneNumber != "") {
			if(typeof(Storage) !== "undefined") {    	
				localStorage.setItem("userPhoneNumber",$scope.bioNivid.phoneNumber);
    			$scope.bioNivid.isMobileNumberEntered = true;
    			$scope.fetchAllAllowedProjects();
			}
		} else {
			alert("Enter mobile number please!")
		}
	}

	$scope.isMobileNumberAlreadyEntered = function () {
		if(typeof(Storage) !== "undefined" && localStorage.userPhoneNumber) {  
    		$scope.bioNivid.isMobileNumberEntered = true;
    		$scope.fetchAllAllowedProjects();
		} else {
    		$scope.bioNivid.isMobileNumberEntered = false;
		}
	}

	$scope.fetchAllAllowedProjects = function () {
		var cellnumber = localStorage.userPhoneNumber;
		sharedProperties.setPhoneNumber (cellnumber);
		BNAppGenericFactory.fetchAllAllowedProjects(cellnumber).success (function (data) {
			data.Projects.forEach (function (dat) {
				$scope.projectList.push(dat.projects)
			});
      $scope.bioNivid.client = $scope.projectList[0].client;
		})
	}

	$scope.showBetaScreen = function () {
		if ($scope.bioNivid.projectSelected.project_id != null) {
			sharedProperties.setProjectId($scope.bioNivid.projectSelected.project_id)
			$state.go('tab.beta');
		} else {
			alert("Please select a project")
		}
		
	}

	$scope.isMobileNumberAlreadyEntered();
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

  $scope.showTrackScreen = function () {
  	$state.go('tab.trackProjectView');
  }

  if (selectedProjectId != "") {
  	$scope.getProjectDetails(selectedProjectId)
  };
})

.controller('TrackProjectViewCtrl', function($scope, $state, BNAppGenericFactory, sharedProperties) {
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
     var ref = window.open(url, '_blank', 'location=yes');
  }
  $scope.getProjectTrackingInfo(sharedProperties.getProjectId());
})

.controller('SalesCtrl', function($scope, $state, BNAppGenericFactory, sharedProperties) {

  $scope.bioNivid = {}
  $scope.bioNivid.salesEmail = "";
  $scope.bioNivid.salesContactNumber = "";
  $scope.getSalesDetails = function () {
  	BNAppGenericFactory.fetchSalesDetails().success (function (data) {
  		var temp = data.Sales[0].Sale;
		$scope.bioNivid.salesEmail = temp.email;
  		$scope.bioNivid.salesContactNumber = temp.contactNo;	
	})
  }

  $scope.goBack = function () {
		$state.go('tab.beta');
  }
  $scope.getSalesDetails();
})

.controller('SupportCtrl', function($scope, $state, BNAppGenericFactory, sharedProperties) {
	$scope.bioNivid = {}
  	$scope.bioNivid.supportEmail = "";
  	$scope.bioNivid.supportContactNumber = "";
	$scope.getSupportDetails = function () {
  	BNAppGenericFactory.fetchSupportDetails().success (function (data) {
  		var temp = data.Supports[0].Support;
		$scope.bioNivid.supportEmail = temp.email;
  		$scope.bioNivid.supportContactNumber = temp.contactNo;	
	})
  }

	$scope.goBack = function () {
			$state.go('tab.beta');
	}
	$scope.getSupportDetails();
})

.controller('ShareCtrl', function($scope, $state, BNAppGenericFactory, sharedProperties) {
	$scope.bioNivid = {}
	$scope.bioNivid.newUserNumber = "";

	$scope.goBack = function () {
		$state.go('tab.beta');
	}

	$scope.addPermissionForNewUser = function () {
		var newUserObj = {};
		newUserObj["project_id"] = sharedProperties.getProjectId();
    	newUserObj["user_id"] = $scope.bioNivid.newUserNumber;
    	newUserObj["permission_type"] = "1";

    	var finalObj = {"Permission" : newUserObj};
    	if (newUserObj["user_id"] == "") {
    		alert("Enter the new mobile number")
    		return false;
    	}
    	BNAppGenericFactory.addPermissionForNewUser(finalObj).success(function (data) {
    		$state.go('tab.beta');
    	})
    	.error (function (data) {
    		alert("Fuckin error " + JSON.stringify(data))
    	})

	}
})

.controller('FeedbackCtrl', function($scope, $state, BNAppGenericFactory, sharedProperties) {
	$scope.bioNivid = {};
	$scope.bioNivid["feedBackName"] = "";
	$scope.bioNivid["feedBackEmail"] = "";
	$scope.bioNivid["feedBackMessage"] = "";

	$scope.submitFeedBack = function () {
		var feedBackObj = {};
		feedBackObj["user_id"] = sharedProperties.getPhoneNumber();
    	feedBackObj["user_fullname"] = $scope.bioNivid["feedBackName"];
    	feedBackObj["user_email"] = $scope.bioNivid["feedBackEmail"];
    	feedBackObj["user_feedback"] = $scope.bioNivid["feedBackMessage"];

    	var finalObj = {"Feedback" : feedBackObj}
    	BNAppGenericFactory.submitFeedBack (finalObj).success (function (data) {
    		$state.go('tab.beta');
    	})
    	.error (function (data) {

    	})

	}

	$scope.goBack = function () {
		$state.go('tab.beta');
	}
})

.controller('BetaViewCtrl', function($scope, $state) {

	$scope.goBack = function () {
		$state.go('tab.dash');
	}
})

.controller('NotificationCtrl', function($scope, $state, BNAppGenericFactory, sharedProperties) {

  $scope.bioNivid = {}
  $scope.bioNivid.bnNotifications = [];
  $scope.getNotifications = function () {
  	BNAppGenericFactory.fetchNotifications().success(function (data) {
  		data.Notifications.forEach(function(entry) {
  			var temp = {};
  			temp["title"] = entry.Notification.title;
  			temp["message"] = entry.Notification.message;
  			$scope.bioNivid.bnNotifications.push(temp);
  		});
	})
  }

  $scope.getNotifications();

  $scope.goBack = function () {
		$state.go('tab.beta');
  }
})

.controller('StatisticsCtrl', function($scope, $state, BNAppGenericFactory, sharedProperties) {

  $scope.bioNivid = {}
  $scope.bioNivid.projects = 0;
  $scope.bioNivid.clients = 0;
  $scope.bioNivid.feedbacks = 0;

  $scope.getStatistics = function () {
  	BNAppGenericFactory.fetchStatistics().success(function (data) {
  		var temp = data.Statistics[0][0];
		$scope.bioNivid.projects = temp.projects;
  		$scope.bioNivid.clients = temp.clients;
  		$scope.bioNivid.feedbacks = temp.feedbacks;	
	})
  }

  $scope.getStatistics();

  $scope.goBack = function () {
		$state.go('tab.beta');
  }
})

.controller('ProductsCtrl', function($scope, $state, BNAppGenericFactory, sharedProperties) {

  $scope.bioNivid = {}
  $scope.bioNivid.bnpNotifications = [];
  $scope.getProductNotifications = function () {
    BNAppGenericFactory.fetchProductNotifications().success(function (data) {
      data.Products.forEach(function(entry) {
        var temp = {};
        temp["title"] = entry.Product.title;
        temp["message"] = entry.Product.message;
        $scope.bioNivid.bnpNotifications.push(temp);
      });
  })
  }

  $scope.getProductNotifications();

  $scope.goBack = function () {
		$state.go('tab.beta');
  }
})
