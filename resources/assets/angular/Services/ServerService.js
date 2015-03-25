app.factory('ServersApi', function($resource){
    return $resource('/api/v1/server/:id', null,
        {
            'update': { method:'PUT' }
        });
    });