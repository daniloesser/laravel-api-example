<?php

namespace App\Dtos;

use Illuminate\Http\Request;

class PaginationDTO extends GenericDTO
{
    private bool $paginated = true;
    private int $page;
    private int $pageSize = 10;
    private ?string $include;
    private ?string $exclude;


    public function __construct(Request $request)
    {
        $this->include = $request->get('include', 'business,customer');
        $this->exclude = $request->get('exclude', 'checklist.item');
        $this->page = (int)$request->get('page', 1);
    }
}
