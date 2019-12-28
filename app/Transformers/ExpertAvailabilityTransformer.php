<?php
/**
 * Created by PhpStorm.
 * User: daniloesser
 * Date: 2019-12-18
 * Time: 17:44
 */

namespace App\Transformers;

use App\Models\Expert;
use League\Fractal\TransformerAbstract;

class ExpertAvailabilityTransformer extends TransformerAbstract
{
    public function transform(Expert $expert)
    {
        return [
            $expert->availability
        ];
    }
}