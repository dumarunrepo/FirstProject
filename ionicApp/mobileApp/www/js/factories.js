angular.module('starter.factories', [])

/**
 * A simple example service that returns some data.
 */

.factory('BNAppGenericFactory', ['$http', 'sharedProperties', function ($http, sharedProperties) {
    //(TODO - Aadithya) - In future we should remove all these methods and expose only GET/PUT/POST/DELETE and make it CRUD app
    var BNAppGenericFactory = {};
    var baseAPIURL =sharedProperties.getBaseAPIURL();
    //HTTP Get method

    //Retrieve all valid categories
    BNAppGenericFactory.getAllCategories = function () {
        return $http.get('http://ec2-54-201-175-230.us-west-2.compute.amazonaws.com/RestProjects/indexByUser/9590946168.json');
    }

    BNAppGenericFactory.fetchAllAllowedProjects = function (no) {
        return $http.get(baseAPIURL + 'RestProjects/indexByUser/' + no + '.json');
    }

    BNAppGenericFactory.fetchProjectDetails = function (no) {
        return $http.get(baseAPIURL + 'RestProjects/view/' + no + '.json');
    }

    BNAppGenericFactory.fetchProjectTrackingDetails = function (no) {
        return $http.get(baseAPIURL + 'RestProjects/trackingInfoByProject/' + no + '.json');
    }

    BNAppGenericFactory.submitFeedBack = function (postData) {
        var url = baseAPIURL + 'RestFeedbacks/add.json';
        return $http({
            url: url,
            method: "POST",
            data: postData
        });
    } 

    BNAppGenericFactory.addPermissionForNewUser = function (postData) {
        var url = baseAPIURL + 'RestPermissions/add.json';
        return $http({
            url: url,
            method: "POST",
            data: postData
        });
    } 

    BNAppGenericFactory.fetchSupportDetails = function () {
        return $http.get(baseAPIURL + 'RestSupports/index.json');
    }
    
    BNAppGenericFactory.fetchSalesDetails = function () {
        return $http.get(baseAPIURL + 'RestSales/index.json');
    }

    BNAppGenericFactory.fetchNotifications = function () {
        return $http.get(baseAPIURL + 'RestNotifications/index.json');
    }

    BNAppGenericFactory.fetchStatistics = function () {
        return $http.get(baseAPIURL + 'RestStatistics/index.json');
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