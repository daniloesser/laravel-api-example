<?php
/**
 * Created by PhpStorm.
 * User: daniloesser
 * Date: 2019-12-18
 * Time: 17:44
 */

namespace App\Transformers;

use App\Models\Group;
use League\Fractal\TransformerAbstract;

class GroupTransformer extends TransformerAbstract
{
    public function transform(Group $group)
    {
        return [
            'group_id' => $group->id,
            'name' => $group->name,
            'description' => $group->description,
        ];
    }
}