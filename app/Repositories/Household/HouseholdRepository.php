<?php

namespace App\Repositories\Household;

use App\Models\Household;
use App\Repositories\Household\HouseholdRepositoryInterface;

class HouseholdRepository implements HouseholdRepositoryInterface
{

    /**
     * return all household items
     *
     * @param null
     *
     * @return Household collection
     *
     * @author Amr Degheidy
     *
     **/
    public function index()
    {
        return Household::all();
    }

    /**
     * update existing household with new data
     *
     * @param array
     * @param Household
     *
     * @return Household
     *
     * @author Amr Degheidy
     *
     **/
    public function update(array $data, Household $household)
    {

        return $household->update($data);
    }
    /**
     * store new dry clean
     *
     * @param array
     *
     * @return Household
     *
     * @author Amr Degheidy
     *
     **/
    public function store(array $data)
    {
        return Household::insert($data);
    }
    /**
     * delete dry clean record
     *
     * @param Household
     *
     * @return Household $household
     *
     * @author Amr Degheidy
     *
     **/
    public function delete(Household $household)
    {
        return $household->delete();
    }
}
