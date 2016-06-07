var gdtoolsApp = angular.module('gdtoolsApp', [
    'projectList'
]).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('[&').endSymbol('&]');
});
