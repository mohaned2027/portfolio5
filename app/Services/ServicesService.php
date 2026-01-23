<?php

namespace App\Services;

use App\Repository\ServicesRepository;

class ServicesService
{
    public function __construct(protected ServicesRepository $servicesRepository) {}

    public function getServices()
    {
        return $this->servicesRepository->getServices();
    }

    public function getService($id)
    {
        return $this->servicesRepository->getService($id) ?? false;
    }

    public function store($data)
    {
        return $this->servicesRepository->store($data);
    }

    public function update($data, $id)
    {
        $service = $this->servicesRepository->getService($id);
        if (!$service) return false;
        return $this->servicesRepository->update($service, $data);
    }

    public function delete($id)
    {
        $service = $this->servicesRepository->getService($id);
        if (!$service) return false;
        return $this->servicesRepository->delete($service);
    }
}
