var gdtoolsApp = angular.module('gdtoolsApp', [
    'ngRoute',
    'projectList',
    'home'
]).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('[&').endSymbol('&]');
});
