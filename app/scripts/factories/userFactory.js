angular.module('UsersModule')
	.factory('UserFactory', ['$http', 'OAuthToken', '$cookies', 'config',
		function ($http, OAuthToken, $cookies, config) {
			return {
				getUser: function (id, callback) {
					$http({
						method: 'GET',
						url: config.apiUrl + "api/users/" + id
					}).then(function successCallback(response) {
						callback(response.data);
					}, function errorCallback(response) {
						console.log(response);
					});
				},
				getUsers: function (callback) {
					$http({
						method: 'GET',
						url: config.apiUrl + "api/users"
					}).then(function successCallback(response) {
						callback(response.data);
					}, function errorCallback(response) {
						console.log(response);
					});
				},
				getProfile: function (callback) {
					$http({
						method: 'GET',
						url: config.apiUrl + "api/users/profile"
					}).then(function successCallback(response) {
						callback(response.data);
					}, function errorCallback(response) {
						console.log(response);
					});
				},
				getUserAccessRules: function (callback) {
					$http({
						method: 'GET',
						url: config.apiUrl + "api/users/profile/access-rules"
					}).then(function successCallback(response) {
						callback(response.data);
					}, function errorCallback(response) {
						console.log(response);
					});
				}
			};
		}
	]);
