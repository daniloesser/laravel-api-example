<?php
/**
 * Created by PhpStorm.
 * User: daniloesser
 * Date: 2019-12-18
 * Time: 17:44
 */

namespace App\Transformers;

use App\Models\Checklist;
use App\Models\ChecklistItem;
use League\Fractal\TransformerAbstract;

class ChecklistItemTransformer extends TransformerAbstract
{
    public function transform(ChecklistItem $checklistItem)
    {
        return [
            'ChecklistItemId' => $checklistItem->id,
            'ChecklistItemResponse' => $checklistItem->ChecklistItemResponse,
        ];
    }

}