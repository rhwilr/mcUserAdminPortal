app.factory('RulesApi', function($resource){
    return $resource('/api/v1/rules/:id', {id:'@id'},
        {
            'agree': {
                method:'POST',
                url: "/api/v1/rules/agree"
            },
            'disagree': {
                method: 'POST',
                url: "/api/v1/rules/disagree"
            }
        });
    });