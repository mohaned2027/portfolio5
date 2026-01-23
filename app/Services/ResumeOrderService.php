<?php

namespace App\Services;

use App\Repository\ResumeOrderRepository;

class ResumeOrderService
{
    public function __construct(protected ResumeOrderRepository $resumeOrderRepository) {}

    public function getResumeOrders()
    {
        return $this->resumeOrderRepository->getResumeOrders();
    }

    public function getResumeOrder($id)
    {
        return $this->resumeOrderRepository->getResumeOrder($id) ?? false;
    }

    public function store($data)
    {
        return $this->resumeOrderRepository->store($data);
    }

    public function update($data, $id)
    {
        $resumeOrder = $this->resumeOrderRepository->getResumeOrder($id);
        if (!$resumeOrder) return false;
        return $this->resumeOrderRepository->update($resumeOrder, $data);
    }

    public function delete($id)
    {
        $resumeOrder = $this->resumeOrderRepository->getResumeOrder($id);
        if (!$resumeOrder) return false;
        return $this->resumeOrderRepository->delete($resumeOrder);
    }
}
