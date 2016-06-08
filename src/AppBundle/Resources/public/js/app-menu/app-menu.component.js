angular.module('appMenu').component('appMenu', {
    template: '<ul class="nav nav-sidebar">' +
                  '<li ng-repeat="item in $ctrl.items">' +
                      '<a href ng-click="$ctrl.changeView($index)">[& item[1] &]</a>' +
                  '</li>' +
              '</ul>',
    controller: function MenuController($location){
        var self = this;

        self.items = [
            ['/', 'Overview'],
            ['/projects', 'Projetos']
        ];

        self.changeView = function(viewId) {
            $location.path(self.items[viewId][0]);
        };
    }
});