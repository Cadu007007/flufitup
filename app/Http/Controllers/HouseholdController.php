<?php

namespace App\Http\Controllers;

use App\Http\Requests\HouseholdRequest;
use App\Models\Household;
use App\Repositories\Household\HouseholdRepositoryInterface;
use Illuminate\Http\Request;

class HouseholdController extends Controller
{
    // class property to access repo interface
    private $repo;
    // use dry clean repo interface
    public function __construct(HouseholdRepositoryInterface $repo)
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
        return view('admin.packages.household_items.index', ['active' => 'household_items', 'household_items' => $this->repo->index()]);
        // return response()->json(['data' => $this->repo->index()]);
    }
    /**
     * calling repo interface on store method
     *
     * @param HouseholdRequest
     *
     * @return JSON
     *
     * @author Amr Degheidy
     *
     **/
    public function store(HouseholdRequest $request)
    {
        $household = $this->repo->store($request->validated());
        return response()->json(['success' => true, 'data' => $household, 'message' => 'House Hold Created Successfully']);
    }
    /**
     * calling repo update
     *
     * @param HouseholdRequest
     * @param Household
     *
     * @return JSON
     *
     * @author Amr Degheidy
     *
     **/
    public function update(HouseholdRequest $request, Household $household)
    {

        $this->repo->update($request->validated(), $household);
        // return $this->repo->update($request->validated(), $household);
        return response()->json(['success' => true, 'data' => $household, 'message' => 'House Hold Updated Successfully']);
    }
    /**
     * calling repo delete method
     *
     * @param Household
     *
     * @return JSON
     *
     * @author Amr Degheidy
     *
     **/
    public function delete(Household $household)
    {
        $this->repo->delete($household);
        return response()->json(['success' => true, 'message' => 'House Hold Deleted Successfully']);
    }
}
