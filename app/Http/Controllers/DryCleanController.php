<?php

namespace App\Http\Controllers;

use App\Http\Requests\DryCleanRequest;
use App\Models\DryClean;
use App\Repositories\DryClean\DryCleanRepositoryInterface;

class DryCleanController extends Controller
{
    // class property to access repo interface
    private $repo;
    // use dry clean repo interface
    public function __construct(DryCleanRepositoryInterface $repo)
    {

        // assign repo interface to this class repo
        $this->repo = $repo;

    }
    /**
     * calling repo interface on index method
     *
     * @param null
     *
     * @return JSON
     *
     * @author Amr Degheidy
     *
     **/
    public function index()
    {
        return response()->json(['data' => $this->repo->index()]);
    }
    /**
     * calling repo interface on store method
     *
     * @param DryCleanRequest
     *
     * @return JSON
     *
     * @author Amr Degheidy
     *
     **/
    public function store(DryCleanRequest $request)
    {
        $this->repo->store($request->validated());
        return response()->json(['success' => true, 'data' => $this->repo->index()]);
    }
    /**
     * calling repo update
     *
     * @param DryCleanRequest
     * @param DryClean
     *
     * @return JSON
     *
     * @author Amr Degheidy
     *
     **/
    public function update(DryCleanRequest $request, DryClean $dryClean)
    {
        $this->repo->update($request->validated(), $dryClean);
        return response()->json(['success' => true, 'data' => $this->repo->index()]);
    }
    /**
     * calling repo delete method
     *
     * @param DryClean
     *
     * @return JSON
     *
     * @author Amr Degheidy
     *
     **/
    public function delete(DryClean $dryClean)
    {
        $this->repo->delete($dryClean);
        return response()->json(['success' => true, 'data' => $this->repo->index()]);
    }
}
