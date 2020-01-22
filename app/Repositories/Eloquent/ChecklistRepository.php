<?php

namespace App\Repositories\Eloquent;

use App\Dtos\ChecklistDTO;
use App\Dtos\PaginationDTO;
use App\Http\Requests\ChecklistRequest;
use App\Models\Checklist;
use App\Models\Event;
use App\Repositories\Contracts\ChecklistRepositoryInterface;
use App\Transformers\EventTransformer;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;

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

    public function getAllChecklistFromEvent(PaginationDTO $paginationDTO)
    {
        //Retrieves data from Model
        $data = $this->modelEvents->with('series')->whereHas("series.checklist", function ($q) {
            $q->where('j2y6w_checklists.is_active', '=', true)
                ->where('j2y6w_events.service_id', '<>', 1)
                ->whereRaw("j2y6w_events.START > UTC_TIMESTAMP () - INTERVAL 2 WEEK");
        })->groupBy('j2y6w_events.id')
            ->orderBy('j2y6w_events.start', 'DESC')->get();

        //set up data for pagination, generating chunks
        if ($paginationDTO->paginated === true) {
            $data = $this->arrayPaginator($data, $paginationDTO->page, $paginationDTO->pageSize,
                $paginationDTO->include, $paginationDTO->exclude);
        }

        //Transforms the data
        $formatted = new Collection($data, new EventTransformer(), 'data');

        //Appends the pagination meta to the response
        if ($paginationDTO->paginated === true) {
            $formatted->setPaginator(new IlluminatePaginatorAdapter($data));
        }

        //Parse includes and excludes (appends and/or remove data from url include param, separated by comma and/or dot)
        if ($paginationDTO->include) {
            $this->fractal->parseIncludes($paginationDTO->include);
        }
        if ($paginationDTO->exclude) {
            $this->fractal->parseExcludes($paginationDTO->exclude);
        }

        //converts the current data Array to Collection and return it to the service
        return collect($this->fractal->createData($formatted)->toArray());
    }

    public function create(ChecklistDTO $checklistDTO)
    {

        $newChecklist = New Checklist();

        $newChecklist->series_fk = $checklistDTO->series_fk;
        $newChecklist->is_active = $checklistDTO->is_active;
        $newChecklist->save();
        return $newChecklist;
    }
}