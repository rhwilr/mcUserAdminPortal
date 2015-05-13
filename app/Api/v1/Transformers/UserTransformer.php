<?php namespace rhwilr\mcUserAdminPortal\Api\v1\Transformers;

class UserTransformer extends Transformer {

    public function transform($user)
    {
       return [
           'id' => (integer) $user['id'],
           'name' => $user['name'],
           'email' => $user['email'],
           'patron_active' => (integer) $user['patron_active'],
           'patron_plan' => $user['patron_plan'],
           'plan_ends_at' => $user['plan_ends_at'],
           'minecraft_username' => $user['minecraft_username'],
       ];
    }
}