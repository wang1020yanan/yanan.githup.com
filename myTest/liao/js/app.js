var bookStoreApp = angular.module('bookStoreApp', [
    'ui.router', 'ngAnimate', 'bookStoreCtrls', 'bookStoreFilters',
    'bookStoreServices', 'bookStoreDirectives'
]);
bookStoreApp.config(function($stateProvider, $urlRouterProvider,$httpProvider) {
    $urlRouterProvider.when("", "hello");
    $stateProvider
        .state("hello", {
            url: "/hello",
            templateUrl: 'tpls/hello.html',
            controller: 'HelloCtrl'
        }).state('search', {
            url: "/search",
            templateUrl: 'tpls/search.html',
            controller: 'HelloCtrl'
        })


        .state('informalEssay', {
            url: "/informalEssay",
            templateUrl: 'tpls/informalEssay.html',
            controller: 'InformalEssayCtrl'
        }).state('informalEssay.infos', {
            url: "/infos",
            templateUrl: 'tpls/tpls2/infos.html',
            controller: 'InformalEssayCtrl'
        }).state('informalEssay.tools', {
            url: "/tools",
            templateUrl: 'tpls/tpls2/tools.html',
            controller: 'InformalEssayCtrl'
        }).state('informalEssay.loves', {
            url: "/loves",
            templateUrl: 'tpls/tpls2/loves.html',
            controller: 'InformalEssayCtrl'
        }).state('informalEssay.detail', {
            url: "/detail/:id",
            templateUrl: 'tpls/tpls2/detail.html',
            controller: 'DetailCtrl'
        })



        .state('/list', {
            templateUrl: 'tpls/bookList.html',
            controller: 'BookListCtrl'
        }).state('/weixin', {
            templateUrl: 'tpls/weixin.html',
            controller: 'BookListCtrl'
        });
    $httpProvider.interceptors.push('timestampMarker');
});
//loading
bookStoreApp.factory('timestampMarker', ["$rootScope", function ($rootScope) {
    var timestampMarker = {
        request: function (config) {
            $rootScope.loading = true;
            config.requestTimestamp = new Date().getTime();
            return config;
        },
        response: function (response) {
             $rootScope.loading = false;
             response.config.responseTimestamp = new Date().getTime();
             return response;
        }
    };
    return timestampMarker;
}]);