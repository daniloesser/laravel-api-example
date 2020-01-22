<?php

namespace App\Http\Controllers;

use App\Dtos\ChecklistDTO;
use App\Dtos\PaginationDTO;
use App\Http\Requests\ChecklistRequest;
use App\Services\Checklists;
use http\Exception;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use PHPExperts\DataTypeValidator\InvalidDataTypeException;

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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function index(Request $request)
    {
        try {
            $paginationDTO = new PaginationDTO($request, true);

            $data = $this->service->getAll($paginationDTO);
            return response()->json($data, 200);

        } catch (InvalidDataTypeException $e) {
            throw new \Exception(implode(", ", $e->getReasons()), 400);
        } catch
        (Exception $ex) { // Anything that went wrong
            throw new \Exception('There was an error. Please try again.', 400);
        }
    }


    /**
     * Store a newly created resource in storage.
     * @param ChecklistRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(ChecklistRequest $request)
    {
        try {
            //['series_fk'=>3, 'is_active'=>0,'non_sense'=>'true']
            $checklistDTO = new ChecklistDTO($request->validated());

            $created = $this->service->create($checklistDTO);
            info("New checklist created: ", ['data' => $checklistDTO->jsonSerialize()]);

            return response()->json($created, 201);

        } catch (InvalidDataTypeException $e) {
            //throw new \Exception('There was an error. Please try again.', 400);
            throw new \Exception(implode(", ", $e->getReasons()), 400);
        } catch (Exception $ex) {
            throw new \Exception('There was an error. Please try again.', 400);
        }
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
    public function update(ChecklistDTO $checklistDTO, $id)
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