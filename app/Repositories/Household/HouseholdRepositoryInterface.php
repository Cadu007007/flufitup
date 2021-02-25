<?php

namespace App\Repositories\Household;

use App\Models\Household;

interface HouseholdRepositoryInterface
{
    public function index();
    public function store(array $data);
    public function update(array $data, Household $object);
    public function delete(Household $object);

}
