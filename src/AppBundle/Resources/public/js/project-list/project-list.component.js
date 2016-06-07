angular.module('projectList').component('projectList', {
    templateUrl: 'js/project-list/project-list.template.html',
    controller: function ProjectListController($http){
        var self = this;
        self.orderProp = "creation";

        $http.get('api/projects.json').then(function(response){
            self.projects = response.data;
        });
    }
});
