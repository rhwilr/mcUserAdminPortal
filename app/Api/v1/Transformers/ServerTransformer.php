<?php namespace rhwilr\mcUserAdminPortal\Api\v1\Transformers;

class ServerTransformer extends Transformer {

    public function transform($server)
    {
       return [
           'id' => (integer) $server['id'],
           'name' => $server['name'],
           'host' => $server['host'],
           'rcon_port' => (integer) $server['rcon_port'],
       ];
    }
}