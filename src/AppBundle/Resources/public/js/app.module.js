var gdtoolsApp = angular.module('gdtoolsApp', [
    'ngRoute',
    'projectList',
    'home',
    'appMenu'
]).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('[&').endSymbol('&]');
});
