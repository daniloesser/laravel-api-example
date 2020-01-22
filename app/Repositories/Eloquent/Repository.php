<?php

namespace App\Repositories\Eloquent;

use Illuminate\Pagination\LengthAwarePaginator;

class Repository
{
    public function arrayPaginator($data, $page = 1, $perPage = 10, $includes = '', $excludes = '')
    {
        $collect = collect($data);

        return new LengthAwarePaginator(
            $collect->forPage($page, $perPage),
            $collect->count(),
            $perPage,
            $page, [
                'path' => '',
                'query' => ['include' => $includes, 'exclude' => $excludes]
            ]
        );
    }
}