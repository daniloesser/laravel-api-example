<?php
/**
 * Created by PhpStorm.
 * User: daniloesser
 * Date: 2019-12-18
 * Time: 17:44
 */

namespace App\Transformers;

use App\Models\Series;
use League\Fractal\TransformerAbstract;

class SeriesTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'business',
    ];

    public function transform(Series $series)
    {
        return [
            'seriesId' => $series->group_id,
        ];
    }

    public function includeBusiness(Series $series)
    {
        $business = $series->BusinessDetail;
        $business->unit = $series->unit;
        return $this->collection($business, new BusinessDetailTransformer(), 'business');
    }
}