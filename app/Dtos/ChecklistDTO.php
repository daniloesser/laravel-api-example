<?php

namespace App\Dtos;

use Carbon\Carbon;
use PHPExperts\SimpleDTO\SimpleDTO;

/**
 * @property-read ?int $id
 * @property-read int $series_fk
 * @property-read int $is_active
 * @property-read ?Carbon $created_at
 * @property-read ?Carbon $updated_at
 */
class ChecklistDTO extends SimpleDTO
{
    public function __construct(array $input)
    {
        parent::__construct($input);
    }
}
