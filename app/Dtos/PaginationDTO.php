<?php

namespace App\Dtos;

use Illuminate\Http\Request;
use PHPExperts\SimpleDTO\SimpleDTO;

/**
 * @property-read string $include
 * @property-read string $exclude
 * @property-read bool $paginated
 * @property-read int $pageSize
 * @property-read int $page
 */
class PaginationDTO extends SimpleDTO
{
    public function __construct(Request $request, $paginated = true)
    {
        $input['paginated'] = $paginated;
        $input['include'] = $request->get('include', 'business,customer');
        $input['exclude'] = $request->get('exclude', 'checklist.item');
        $input['page'] = (int)$request->get('page', 1);
        $input['pageSize'] = 10;
        parent::__construct($input);
    }
}
