<?php

namespace App\Dtos;

class ChecklistDTORaw extends GenericDTO
{
    private ?int $id;
    private int $series_fk;
    private int $is_active;
    private ?string $created_at;
    private ?string $updated_at;

    public function __construct($input)
    {
        $this->id = $input['id'] ?? null;
        $this->series_fk = $input['series_fk'];
        $this->is_active = $input['is_active'];
        $this->created_at = $input['created_at'] ?? null;
        $this->updated_at = $input['updated_at'] ?? null;
    }


}
