<?php

namespace App\Http\Controllers;

use App\Services\Experts;
use App\Transformers\ExpertTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\ArraySerializer;

class ExpertsController extends Controller
{
    /**
     * @var Manager
     */
    private $fractal;

    // space that we can use the repository from
    protected $expertService;

    /**
     * @var UserTransformer
     */
    private $expertTransformer;

    function __construct(
        Manager $fractal,
        ExpertTransformer $expertTransformer,
        ArraySerializer $serializer,
        Experts $expert
    ) {
        $this->fractal = $fractal;
        $this->expertTransformer = $expertTransformer;
        $this->fractal->setSerializer($serializer);
        $this->expertService = $expert;

    }

    public function index(Request $request)
    {
        //loads a chunk of users from Users table.
        $paginator = $this->expertService->getPaginatedBy(10);
        $collection = $paginator->getCollection();

        //format the User collection according to User Transformer definitions
        $users = new Collection($collection, $this->expertTransformer, 'data');

        //appends the paginator at the end of the current data page
        $users->setPaginator(new IlluminatePaginatorAdapter($paginator));

        //appends extra data from url include param, separated by comma.
        $this->fractal->parseIncludes($request->get('include', '')); // parse includes

        //converts the current data collection to Json
        return $this->fractal->createData($users)->toJson();

    }


    public function show($id, Request $request)
    {
        //retrieves the user data by id:
        $user = $this->expertService->getExpertByID($id);
        //format the User data according to User Transformer definitions
        $resource = new Item($user, $this->expertTransformer);

        //appends extra data from url include param, separated by comma.
        $this->fractal->parseIncludes($request->get('include', 'roles')); // roles are auto included to data

        //converts the current data collection to Json
        return $this->fractal->createData($resource)->toJson();
    }

    public function store(Request $request)
    {
        return $this->expertService->create($request->all());
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return $user;
    }

    public function delete(Request $request, $id)
    {
        $article = User::findOrFail($id);
        $article->delete();

        return 204;
    }

    public function checkin()
    {

    }
}