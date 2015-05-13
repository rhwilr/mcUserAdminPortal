app.factory('ServersApi', function($resource){
    return $resource('/api/v1/server/:id', {id:'@id'},
        {
            'update': { method:'PUT' },
            'destroy': {method: 'DELETE'},
            'online': {
                method:'GET',
                url: "/api/v1/server/:id/online"
            }
        });
    });