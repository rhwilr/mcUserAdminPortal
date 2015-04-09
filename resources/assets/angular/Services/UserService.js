app.factory('UserApi', function($resource){
    return $resource('/api/v1/user/:id', {id:'@id'},
        {
            'updateProfile': { method:'PUT' },
            'updatePassword': { method:'PUT' },
            'updateMinecraft': { method:'PUT' },
            'me': {
                method:'GET',
                url: "/api/v1/user/me"
            },
            'meUpdateProfile': {
                method:'PUT',
                url: "/api/v1/user/me/profile"
            },
            'meUpdatePassword': {
                method:'PUT',
                url: "/api/v1/user/me/password"
            },
            'meUpdateMinecraft': {
                method:'PUT',
                url: "/api/v1/user/me/minecraft"
            }
        });
    });