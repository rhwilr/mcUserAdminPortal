app.factory('RulesApi', function($resource){
    return $resource('/api/v1/rules',
        {
            'agree': { method:'POST' },
            'disagree': {method: 'POST'}
        });
    });