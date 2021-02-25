<?php
namespace App\Repositories\DryClean;

use App\Models\DryClean;

interface DryCleanRepositoryInterface
{
    public function index();
    public function store(array $data);
    public function update(array $data, DryClean $object);
    public function delete(DryClean $object);

}
