<?php
/**
 * Created by PhpStorm.
 * User: daniloesser
 * Date: 2019-12-18
 * Time: 17:44
 */

namespace App\Transformers;

use App\Models\BusinessDetail;
use League\Fractal\TransformerAbstract;

class BusinessDetailTransformer extends TransformerAbstract
{

    public function transform(BusinessDetail $businessDetail)
    {
        return [
            'address' => (!empty($businessDetail->unit) ? ('#' . $businessDetail->unit) : null) . $businessDetail->street_number . ' ' . $businessDetail->street_name . ', ' . $businessDetail->city,
        ];
    }
}