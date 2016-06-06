var gdtoolsApp = angular.module('gdtoolsApp', []).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('[&').endSymbol('&]');
});

gdtoolsApp.controller('ProjectListController', function($scope){
    $scope.projects = [
        {
            name: 'Zankar',
            description: 'Guardões de Zankar'
        },
        {
            name: 'Guildas',
            description: 'Fantasy Guilds'
        },
        {
            name: 'Dragonautas',
            description: 'Pilotos de dragões'
        }
    ];
});