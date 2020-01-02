<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProfileJsonHttpResponse
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (!$response->exception) {

            if (
                $response instanceof Response &&
                app()->bound('debugbar') &&
                app('debugbar')->isEnabled()
            ) {
                $queries_data = $this->sqlFilter(app('debugbar')->getData());
                if ($queries_data) {
                    $response->setContent(json_decode($response->getContent(), true) + [
                            '_debugbar' => [
                                'total_queries' => count($queries_data),
                                'queries' => $queries_data,
                            ]
                        ]);
                }
            }
        }
        return $response;

    }

    /**
     * Get only sql and each duration
     *
     * @param $debugbar_data
     * @return array
     */
    protected function sqlFilter($debugbar_data)
    {
        $result = Arr::get($debugbar_data, 'queries.statements');

        return array_map(function ($item) {
            return [
                'sql' => Arr::get($item, 'sql'),
                'duration' => Arr::get($item, 'duration_str'),
            ];
        }, $result);
    }
}
