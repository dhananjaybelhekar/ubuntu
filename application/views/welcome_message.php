
<!doctype html>
<html>
  <head>
       <base href="/anjay/">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/1.0.3/angular-ui-router.min.js"></script>
    
     <!-- <script src="/anjay/app/all.js"></script> -->
    <script>
    angular.module('todoApp', ['todoApp.main','todoApp.main2']);

    angular.module('todoApp.main', ['ui.router'])
  .controller('TodoListController', function() {
    var todoList = this;
    todoList.todos = [
      {text:'learn AngularJS', done:true},
      {text:'build an AngularJS app', done:false}];
 
    todoList.addTodo = function() {
      todoList.todos.push({text:todoList.todoText, done:false});
      todoList.todoText = '';
    };
 
    todoList.remaining = function() {
      var count = 0;
      angular.forEach(todoList.todos, function(todo) {
        count += todo.done ? 0 : 1;
      });
      return count;
    };
 
    todoList.archive = function() {
      var oldTodos = todoList.todos;
      todoList.todos = [];
      angular.forEach(oldTodos, function(todo) {
        if (!todo.done) todoList.todos.push(todo);
      });
    };
  }).config(function($stateProvider, $urlRouterProvider,$locationProvider) {
        $locationProvider.html5Mode(true);
        $urlRouterProvider.otherwise("/index");  

        $stateProvider.state('index', {
          url: "/index",
          templateUrl: "templates/main.html",
          controller:'TodoListController as todoList'
          }).state('index.show', {
          url: "/show",
          templateUrl: "templates/main.html",
          controller:'TodoListController as todoList'
          });
      });

      angular.module('todoApp.main2', ['ui.router'])
  .controller('todoApp.main2.controller', function() {
    var todoList = this;
    todoList.data = "hiii index2";

  }).config(function($stateProvider, $urlRouterProvider,$locationProvider) {
     //   $locationProvider.html5Mode(true);
    //    $urlRouterProvider.otherwise("index2");  
        $stateProvider.state('index2', {
          url: "/index2",
          templateUrl: "templates/main2.html",
          controller:'todoApp.main2.controller as todoList'
          });
      });
    </script>
  </head>
  <body ng-app="todoApp">
        <ui-view></ui-view>
  </body>
</html>