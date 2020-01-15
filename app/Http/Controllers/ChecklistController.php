<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChecklistRequest;
use App\Services\Checklists;
use App\Services\Log;
use http\Exception;
use Illuminate\Http\Request;
use League\Fractal\Manager;

class ChecklistController extends Controller
{
    /**
     * @var Manager
     */
    protected $service;


    function __construct()
    {
        $this->service = new Checklists();
    }

    /**
     * Display a listing of the resource.
     *
     * @throws \Exception
     */
    public function index(Request $request)
    {
        try {
            $checklistRequestObj = new ChecklistRequest();
            $checklistRequestObj->setIncludes($request->get('include', 'business,customer'));
            $checklistRequestObj->setExcludes($request->get('exclude', 'checklist.item'));
            $checklistRequestObj->setPaginated(true);
            $checklistRequestObj->setPage($request->get('page', '1'));
            $checklistRequestObj->setPageSize(10);

            $data = $this->service->getAll($checklistRequestObj);
            return response()->json($data, 200);
        } catch (Exception $ex) { // Anything that went wrong
            throw new \Exception('There was an error. Please try again.', 400);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(ChecklistRequest $request)
    {
        $validated = $request->validated();
        info("Creating a new checklist for series {$validated['series_fk']}", ['data' => $validated]);

        dd($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     */
    public function update(ChecklistRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        //
    }
}