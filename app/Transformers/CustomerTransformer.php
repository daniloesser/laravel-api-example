<?php
/**
 * Created by PhpStorm.
 * User: daniloesser
 * Date: 2019-12-18
 * Time: 17:44
 */

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class CustomerTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'roles'
    ];

    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->first_name . ' ' . $user->last_name,
            'email' => $user->email,
        ];
    }

    public function includeRoles(User $user)
    {
        return $this->collection($user->Groups, new GroupTransformer(), 'groups');
    }
}