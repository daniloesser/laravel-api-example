<?php
/**
 * Created by PhpStorm.
 * User: daniloesser
 * Date: 2019-12-18
 * Time: 17:44
 */

namespace App\Transformers;

use App\Models\Expert;
use App\Models\User;
use League\Fractal\TransformerAbstract;

class ExpertTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'roles',
        'availability'
    ];

    public function transform(Expert $expert)
    {
        return [
            'id' => $expert->id,
            'name' => $expert->first_name . ' ' . $expert->last_name,
        ];
    }

    public function includeRoles(User $user)
    {
        return $this->collection($user->groups, new GroupTransformer(), 'groups');
    }

    public function includeAvailability(User $user)
    {
        $expert = $user->expert;
        return $this->item($expert, new ExpertAvailabilityTransformer(), 'availability');
    }
}