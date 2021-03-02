<?php

namespace App\Repositories\DryClean;

use App\Models\DryClean;
use App\Repositories\DryClean\DryCleanRepositoryInterface;

class DryCleanRepository implements DryCleanRepositoryInterface
{

    /**
     * return all dry clean itmes
     *
     * @param null
     *
     * @return DryClean collection
     *
     * @author Amr Degheidy
     *
     **/
    public function index()
    {
        return DryClean::all();
    }

    /**
     * update existing dey clean with new data
     *
     * @param array
     * @param DryClean
     *
     * @return DryClean
     *
     * @author Amr Degheidy
     *
     **/
    public function update(array $data, DryClean $dryClean)
    {
        $dryClean->update($data);
        return $dryClean;
    }
    /**
     * store new dry clean
     *
     * @param array
     *
     * @return DryClean
     *
     * @author Amr Degheidy
     *
     **/
    public function store(array $data)
    {
        $dryClean = DryClean::create($data);
        return $dryClean;
    }
    /**
     * delete dry clean record
     *
     * @param DryClean
     *
     * @return DryClean $dryClean
     *
     * @author Amr Degheidy
     *
     **/
    public function delete(DryClean $dryClean)
    {
        return $dryClean->delete();
    }
}
