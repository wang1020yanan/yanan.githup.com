var bookStoreCtrls = angular.module('bookStoreCtrls', []);

bookStoreCtrls.controller('HelloCtrl', ['$scope',
    function($scope) {
        $scope.height = Math.max(document.documentElement.clientHeight, document.body.offsetHeight);
        $scope.width = Math.max(document.documentElement.clientWidth, document.body.offsetWidth);
        $scope.greeting = {
            text: 'Hello'
        };
        $scope.pageClass="list";
    }
]);
bookStoreCtrls.controller('SearchCtrl', ['$scope',
    function($scope) {
        $scope.height = Math.max(document.documentElement.clientHeight, document.body.offsetHeight);
        $scope.width = Math.max(document.documentElement.clientWidth, document.body.offsetWidth);
        $scope.greeting = {
            text: 'Hello'
        };
        //$scope.pageClass="list";
    }
]);


bookStoreCtrls.controller('InformalEssayCtrl', ['$scope','$http',
    function($scope,$http){
        $scope.height = Math.max(document.documentElement.clientHeight, document.body.offsetHeight) - 150;
        //$scope.pageClass="list";
        $scope.loading="加载更多";
        $http.get("./data/informalEssay.json").success(function(data){
            var num=10;
            var add=num;
            $scope.allInfo=data.pro;
            $scope.infos=[];
            for(var i=0;i<num;i++){
                $scope.infos.push($scope.allInfo[i])
            }
            $scope.add=function(){
                if($scope.allInfo.length-add>=0){
                    $scope.loading="加载中...";
                    for(var j=0;j<num;j++){
                        if($scope.allInfo[add+j]!==undefined){
                            $scope.infos.push($scope.allInfo[add+j]);
                            $scope.loading="加载更多";
                        }else{
                            $scope.loading="已加载全部";
                        }
                    }
                }else{
                    $scope.loading="已加载全部";
                }
                add+=num;
            };
            //$scope.infos=data.pro;

        });
        $http.get("./data/down.json").success(function(data){
            $scope.allTool=data.pro;
            //$scope.infos=data.pro;
        });
        $http.get("./data/link.json").success(function(data){
            $scope.allLink=data.pro;
        })

    }
]);
bookStoreCtrls.controller('DetailCtrl', ['$scope','$http','$stateParams','$sce',
    function($scope,$http,$stateParams,$sce){
        $http.get("./data/informalEssay.json").success(function(data){
            $scope.allInfo=data.pro;
            $scope.newList=$scope.allInfo[$stateParams.id];
            $scope.detailHtml=$sce.trustAsHtml($scope.newList.content);
        });
    }
]);

/**
 * 这里接着往下写，如果控制器的数量非常多，需要分给多个开发者，可以借助于grunt来合并代码
 */
