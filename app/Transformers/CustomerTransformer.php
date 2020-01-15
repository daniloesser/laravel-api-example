<?php
/**
 * Created by PhpStorm.
 * User: daniloesser
 * Date: 2019-12-18
 * Time: 17:44
 */

namespace App\Transformers;

use App\Models\Customer;
use App\Models\User;
use League\Fractal\TransformerAbstract;

class CustomerTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'roles'
    ];

    public function transform(Customer $customer)
    {
        return [
            'id' => $customer->id,
            'name' => $customer->first_name . ' ' . $customer->last_name,
        ];
    }

    public function includeRoles(User $user)
    {
        return $this->collection($user->Groups, new GroupTransformer(), 'groups');
    }
}