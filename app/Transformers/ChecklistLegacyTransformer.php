<?php
/**
 * Created by PhpStorm.
 * User: daniloesser
 * Date: 2019-12-18
 * Time: 17:44
 */

namespace App\Transformers;

use App\Models\Checklist;
use DateTime;
use League\Fractal\TransformerAbstract;

class ChecklistLegacyTransformer extends TransformerAbstract
{
    public function transform(Checklist $checklist)
    {
        $dt = new DateTime($checklist->date);
        return [
            'eventId' => $checklist->eventId,
            'seriesId' => $checklist->seriesId,
            'customerId' => $checklist->customerId,
            'cleanerId' => $checklist->cleanerId,
            'date' => $dt->format('Y-m-d\TH:i:s.\0\0\0\Z'),
            'address' => (!empty($checklist->unit) ? ('#' . $checklist->unit) : null) . $checklist->streetNumber . ' ' . $checklist->streetName . ',' . $checklist->city,
            'cleanerName' => $checklist->cleanerFirstName . ' ' . $checklist->cleanerLastName,
            'customerName' => $checklist->customerFirstName . ' ' . $checklist->customerLastName,
            'changeable' => (bool)(!empty($checklist->responseId) && !empty($checklist->responseActive))
        ];
    }
}