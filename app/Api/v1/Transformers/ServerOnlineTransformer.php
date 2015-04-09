<?php namespace rhwilr\mcUserAdminPortal\Api\v1\Transformers;

class ServerOnlineTransformer extends Transformer {

    public function transform($server)
    {
       return [
           'online' => (bool) $server['online'],
           'player_online' => (integer) $server['player_online'],
           'player_max' => (integer) $server['player_max'],
       ];
    }
}