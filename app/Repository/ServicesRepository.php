<?php

namespace App\Repository;

use App\Models\Service;

class ServicesRepository
{
    public function getServices()
    {
        return Service::get();
    }

    public function getService($id)
    {
        return Service::find($id);
    }

    public function store($data)
    {
        return Service::create($data);
    }

    public function update($service, $data)
    {
        return $service->update($data);
    }

    public function delete($service)
    {
        return $service->delete();
    }
}
