<?php

namespace App\Repositories\Eloquent;

use App\Http\Requests\ChecklistRequest;
use App\Models\Checklist;
use App\Models\Event;
use App\Repositories\Contracts\ChecklistRepositoryInterface;
use App\Transformers\EventTransformer;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ChecklistRepository extends Repository implements ChecklistRepositoryInterface
{
    protected $model;
    protected $modelEvents;
    protected $fractal;

    // Binds models to this repository
    public function __construct()
    {
        $this->model = New Checklist();
        $this->modelEvents = New Event();
        $this->fractal = new Manager();
    }

    public function getAllChecklistFromEvent(ChecklistRequest $requestObj)
    {
        //Retrieves data from Model
        $data = $this->modelEvents->with('series')->whereHas("series.checklist", function ($q) {
            $q->where('j2y6w_checklists.is_active', '=', true)
                ->where('j2y6w_events.service_id', '<>', 1)
                ->whereRaw("j2y6w_events.START > UTC_TIMESTAMP () - INTERVAL 1 WEEK");
        })->groupBy('j2y6w_events.id')
            ->orderBy('j2y6w_events.start', 'DESC')->get();

        //set up data for pagination, generating chunks
        if ($requestObj->getPaginated() === true) {
            $data = $this->arrayPaginator($data, $requestObj->getPage(), $requestObj->getPageSize(),
                $requestObj->getIncludes(), $requestObj->getExcludes());
        }

        //Transforms the data
        $formatted = new \League\Fractal\Resource\Collection($data, new EventTransformer(), 'data');

        //Appends the pagination meta to the response
        if ($requestObj->getPaginated() === true) {
            $formatted->setPaginator(new IlluminatePaginatorAdapter($data));
        }

        //Parse includes and excludes (appends and/or remove data from url include param, separated by comma and/or dot)
        if ($requestObj->getIncludes()) {
            $this->fractal->parseIncludes($requestObj->getIncludes());
        }
        if ($requestObj->getExcludes()) {
            $this->fractal->parseExcludes($requestObj->getExcludes());
        }

        //converts the current data Array to Collection and return it to the service
        return collect($this->fractal->createData($formatted)->toArray());

    }
}