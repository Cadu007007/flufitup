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

        return view('admin.packages.dry_clean.index', ['active' => 'dry_clean', 'dry_clean_items' => $this->repo->index()]);
        // return response()->json(['data' => $this->repo->index()]);
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
        $dryClean = $this->repo->store($request->validated());
        return response()->json(['success' => true, 'data' => $dryClean]);
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
        return response()->json(['success' => true, 'data' => $dryClean]);
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
        return response()->json(['success' => true]);
    }
}
