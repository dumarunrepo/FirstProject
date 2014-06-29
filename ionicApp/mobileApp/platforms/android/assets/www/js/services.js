angular.module('starter.services', [])

.service('sharedProperties', function() {
    var projectId = '';
    var bid = '';
    var phoneNumber = "";
    var restBaseAPIURL = 'http://ec2-54-201-175-230.us-west-2.compute.amazonaws.com/cloud/';

    return {
        getProjectId: function() {
            return projectId;
        },
        setProjectId: function(val) {
            projectId = val;
        },
        getBId: function() {
            return bid;
        },
        setBId: function(val) {
            bid = val;
        },
        getBaseAPIURL: function() {
            return restBaseAPIURL;
        },
        setBaseAPIURL: function(val) {
            restBaseAPIURL = val;
        },
        getPhoneNumber: function() {
            return phoneNumber;
        },
        setPhoneNumber: function(val) {
            phoneNumber = val;
        }
    }
});
