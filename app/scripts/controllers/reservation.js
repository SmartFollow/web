angular.module('app').controller('reservation', ['$scope', '$state', '$rootScope', '$http', '$filter', 'config', function ($scope, $state, $rootScope, $http, $filter, config) {
	$scope.button = "Créer";
	$(".edit").hide();
	if ($state.current.data != null)
    	$rootScope.pageTitle = $state.current.data.pageTitle;
    $scope.create = function () {
    	console.log($filter('date')($scope.data.date1, 'yyyy-MM-dd'));
    	console.log($filter('date')($scope.data.date1, 'HH:mm'));
    	console.log($filter('date')($scope.data.date2, 'yyyy-MM-dd'));
    	console.log($filter('date')($scope.data.date2, 'HH:mm'));
    	console.log($filter('date')(new Date(), 'EEEE').toUpperCase());
    	var room = $('#room_id').val();
    	var reservation = {
					room_id: room,
					time_start: $filter('date')($scope.data.date1, 'HH:mm'),
					time_end: $filter('date')($scope.data.date2, 'HH:mm'),
					date_start: $filter('date')($scope.data.date1, 'yyyy-MM-dd'),
					date_end: $filter('date')($scope.data.date2, 'yyyy-MM-dd'),
					day: $filter('date')(new Date(), 'EEEE').toUpperCase()
				};
   		$http({
			method: 'POST',
			url: config.apiUrl + "api/reservations",
			data: reservation
		}).then(function successCallback(response) {
			console.log(response);
		}, function errorCallback(response) {
			console.log(response);
		});
	};
}])
.controller('reservationsId', ['$scope', '$state', '$rootScope', '$http', '$filter', '$stateParams', 'config', function ($scope, $state, $rootScope, $http, $filter, $stateParams, config) {
	$scope.button = "Editer";
	if ($state.current.data != null)
    	$rootScope.pageTitle = $state.current.data.pageTitle;
    $http({
			method: 'GET',
			url: config.apiUrl + "api/reservations/" + $stateParams.id
		}).then(function successCallback(response) {
			$scope.reservation = response.data;
			$("#room_id").val(response.data.id);
			$("#date1").hide();
			$("#date2").hide();
			console.log(response);
		}, function errorCallback(response) {
			console.log(response);
	});

	$scope.editDate1 = function() {
		$("#edit1").hide();
		$("#date1").show();
	};

	$scope.editDate2 = function() {
		$("#edit2").hide();
		$("#date2").show();
	};

    $scope.create = function () {
    	console.log($filter('date')($scope.data.date1, 'yyyy-MM-dd'));
    	console.log($filter('date')($scope.data.date1, 'HH:mm'));
    	console.log($filter('date')($scope.data.date2, 'yyyy-MM-dd'));
    	console.log($filter('date')($scope.data.date2, 'HH:mm'));
    	console.log($filter('date')(new Date(), 'EEEE').toUpperCase());
    	var room = $('#room_id').val();
    	var reservation = {
					room_id: room,
					time_start: $filter('date')($scope.data.date1, 'HH:mm'),
					time_end: $filter('date')($scope.data.date2, 'HH:mm'),
					date_start: $filter('date')($scope.data.date1, 'yyyy-MM-dd'),
					date_end: $filter('date')($scope.data.date2, 'yyyy-MM-dd'),
					day: $filter('date')(new Date(), 'EEEE').toUpperCase()
				};
   		$http({
			method: 'POST',
			url: config.apiUrl + "api/reservations",
			data: reservation
		}).then(function successCallback(response) {
			console.log(response);
		}, function errorCallback(response) {
			console.log(response);
		});
	};
}]);
