<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessExpertsAvailability;
use App\Models\ExpertAvailability;
use App\Services\Experts;
use Illuminate\Http\Request;

class ExpertsAvailabilityController extends Controller
{
    // space that we can use the repository from
    protected $expertService;


    function __construct(Experts $expert)
    {
        $this->expertService = $expert;
    }

    public function index(Request $request)
    {
        $number = rand(1, 1000);
        $data = ['test-number' => $number];
        ProcessExpertsAvailability::dispatch($data)->onConnection('rabbitmq');

        return json_encode("Task created. ({$number})");


    }


    public function update(Request $request, $id)
    {
        $expertAvailability = ExpertAvailability::findOrFail($id);
        $expertAvailability->update($request->all());
        ProcessExpertsAvailability::dispatch($expertAvailability)->onConnection('rabbitmq');

        return $expertAvailability;
    }


}