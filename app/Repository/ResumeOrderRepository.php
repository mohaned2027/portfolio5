<?php

namespace App\Repository;

use App\Models\ResumeOrder;

class ResumeOrderRepository
{
    public function getResumeOrders()
    {
        return ResumeOrder::get();
    }

    public function getResumeOrder($id)
    {
        return ResumeOrder::find($id);
    }

    public function store($data)
    {
        return ResumeOrder::create($data);
    }

    public function update($resumeOrder, $data)
    {
        return $resumeOrder->update($data);
    }

    public function delete($resumeOrder)
    {
        return $resumeOrder->delete();
    }
}
