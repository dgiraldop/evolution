  var task_app = angular.module('TaskApp', [ ]);
  task_app.controller('TasksCtrl', ['$scope', '$http', function ($scope, $http) {
    $scope.task = {};
    $scope.tasks = {};

    function create_task(task) {
      $http({method: 'post', url: $scope.create_url, data: {Task: task }}).
      success(function (data, status) {
        $scope.status = status;
        if(!task.id){
          $scope.tasks.push({Task: { name: task.name,
                                     priority: task.priority,
                                     id: task.id,
                                     due_date: task.due_date }
                            });
        }
        $scope.task = {};
      }).
      error(function (data, status) {
        $scope.data = data || "Request failed";
        $scope.status = status;
      });
    };

    $scope.edit_task = function (task){
      $scope.task = task.Task;
    }

    $scope.delete_task = function (task){
      task = task.Task;
      $http({method: 'post', url: $scope.delete_url + '/' + task.id}).
        success(function (data, status) {
          $scope.status = status;
          load_tasks();
        }).
        error(function (data, status) {
          $scope.data = data || "Request failed";
          $scope.status = status;
        });
    }

    $scope.process_task = function (task) {
      create_task(task);
    }


    function load_tasks () {
      $http({method: 'get', url: $scope.json_tasks }).
      success(function (data, status) {
        $scope.status = status;
        $scope.tasks = data;
      }).
      error(function (data, status) {
        $scope.data = data || "Request failed";
        $scope.status = status;
      });
    }

    $scope.$watch('json_tasks', function(){
      load_tasks();
    });

  }]);

  task_app.directive('ngConfirmClick', [
    function(){
      return {
        link: function (scope, element, attr) {
          var msg = attr.ngConfirmClick || "Are you sure?";
          var clickAction = attr.confirmedClick;
          element.bind('click',function (event) {
            if ( window.confirm(msg) ) {
                scope.$eval(clickAction)
            }
          });
        }
      };
    }])
