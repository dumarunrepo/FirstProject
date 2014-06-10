angular.module('starter.services', [])

.service('sharedProperties', function() {
    var projectId = '';
    var bid = '';
    var bannerTab = false;

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
        getBannerTab: function() {
            return bannerTab;
        },
        setBannerTab: function(val) {
            bannerTab = val;
        }
    }
});
