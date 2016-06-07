angular.module('projectList').component('projectList', {
    templateUrl: 'js/project-list/project-list.template.html',
    controller: function ProjectListController(){
        this.projects = [
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
    }
});
