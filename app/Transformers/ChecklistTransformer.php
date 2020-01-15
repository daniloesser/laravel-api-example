<?php
/**
 * Created by PhpStorm.
 * User: daniloesser
 * Date: 2019-12-18
 * Time: 17:44
 */

namespace App\Transformers;

use App\Models\Checklist;
use League\Fractal\TransformerAbstract;

class ChecklistTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'items',
    ];

    public function transform(Checklist $checklist)
    {
        return [
            'ChecklistId' => $checklist->id,
        ];
    }

    public function includeItems(Checklist $checklist)
    {
        $items = $checklist->checklistItem;
        return $this->collection($items, new ChecklistItemTransformer(), 'item');
    }

}