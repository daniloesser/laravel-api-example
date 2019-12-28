<?php

namespace App\Http\Controllers;

use App\Services\Customers;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\ArraySerializer;

class CustomersController extends Controller
{
    /**
     * @var Manager
     */
    private $fractal;

    // space that we can use the repository from
    protected $customerService;

    /**
     * @var UserTransformer
     */
    private $userTransformer;

    function __construct(
        Manager $fractal,
        UserTransformer $userTransformer,
        ArraySerializer $serializer,
        Customers $customer
    ) {
        $this->fractal = $fractal;
        $this->userTransformer = $userTransformer;
        $this->fractal->setSerializer($serializer);
        $this->customerService = $customer;

    }

    public function index(Request $request)
    {
        //loads a chunk of users from Users table.
        $paginator = $this->customerService->getPaginatedBy(10);
        $collection = $paginator->getCollection();

        //format the User collection according to User Transformer definitions
        $users = new Collection($collection, $this->userTransformer, 'data');

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
        $user = $this->customerService->getExpertByID($id);
        //format the User data according to User Transformer definitions
        $resource = new Collection($user, $this->userTransformer);

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
}