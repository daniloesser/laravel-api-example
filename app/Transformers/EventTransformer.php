<?php
/**
 * Created by PhpStorm.
 * User: daniloesser
 * Date: 2019-12-18
 * Time: 17:44
 */

namespace App\Transformers;

use App\Models\Checklist;
use App\Models\Event;
use App\Models\Series;
use App\Models\User;
use DateTime;
use League\Fractal\TransformerAbstract;

class EventTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'customer',
        'expert',
        'checklists',
        'business'
    ];

    public function transform(Event $event)
    {
        $dt = new DateTime($event->start);
        return [
            'eventId' => $event->id,
            'date' => $dt->format('Y-m-d\TH:i:s.\0\0\0\Z'),
        ];
    }

    public function includeCustomer(Event $event)
    {
        $customer = $event->customer;
        return $this->item($customer, new CustomerTransformer(), 'customer');
    }

    public function includeExpert(Event $event)
    {
        $expert = $event->expert;
        return $this->item($expert, new ExpertTransformer(), 'expert');
    }

    public function includeChecklists(Event $event)
    {
        $checklist = $event->series->checklist;
        return $this->collection($checklist, new ChecklistTransformer(), 'checklist');
    }

    public function includeBusiness(Event $event)
    {
        $series = $event->series->businessdetail;
        return $this->item($series, new BusinessDetailTransformer(), 'business');
    }
}