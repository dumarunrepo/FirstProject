angular.module('starter.factories', [])

/**
 * A simple example service that returns some data.
 */

.factory('BNAppGenericFactory', ['$http', function ($http) {
    //(TODO - Aadithya) - In future we should remove all these methods and expose only GET/PUT/POST/DELETE and make it CRUD app
    var BNAppGenericFactory = {};
    //HTTP Get method

    //Retrieve all valid categories
    BNAppGenericFactory.getAllCategories = function () {
        return $http.get('http://ec2-54-201-175-230.us-west-2.compute.amazonaws.com/RestProjects/indexByUser/9590946168.json');
    }

    BNAppGenericFactory.fetchAllAllowedProjects = function (no) {
        alert("so far good serice")
        return $http.get('http://ec2-54-201-175-230.us-west-2.compute.amazonaws.com/RestProjects/indexByUser/' + no + '.json');
    }

    BNAppGenericFactory.fetchProjectDetails = function (no) {
        return $http.get('http://ec2-54-201-175-230.us-west-2.compute.amazonaws.com/RestProjects/view/' + no + '.json');
    }

    BNAppGenericFactory.fetchProjectTrackingDetails = function (no) {
        return $http.get('http://ec2-54-201-175-230.us-west-2.compute.amazonaws.com/RestProjects/trackingInfoByProject/' + no + '.json');
    }

    

    //HTTP Post method:Save the configuration
    BNAppGenericFactory.saveConfig = function (postData) {
        var url = 'updateKeywordRedirect';
        return $http({
            url: url,
            method: "POST",
            data: postData
        });
    }

    return BNAppGenericFactory;
}]);