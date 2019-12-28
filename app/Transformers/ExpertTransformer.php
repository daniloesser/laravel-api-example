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

class ExpertTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'roles',
        'availability'
    ];

    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->first_name . ' ' . $user->last_name,
            'email' => $user->email,
            'business_name' => empty($user->expert->business_name) ? 'Not Informed' : $user->expert->business_name,
            'mobile_number' => $user->expert->mobile_number,
            'cleaner_id' => $user->expert->id,
            'experience' => ucfirst(strtolower($user->expert->your_experience))
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