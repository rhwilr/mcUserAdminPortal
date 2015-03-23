app.factory('ServersApi', function($resource){
    return $resource("/api/v1/server", {}, {
        query: { method: "GET", isArray: false }
    });
    });