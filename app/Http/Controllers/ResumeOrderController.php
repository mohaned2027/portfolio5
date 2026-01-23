<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResumeOrderRequest;
use App\Http\Resources\ResumeOrder\ResumeOrderCollection;
use App\Http\Resources\ResumeOrder\ResumeOrderResource;
use App\Services\ResumeOrderService;

class ResumeOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(protected ResumeOrderService $resumeOrderService) {}

    public function index()
    {
        $data = $this->resumeOrderService->getResumeOrders();

        if ($data->isEmpty()) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', new ResumeOrderCollection($data));
    }

    public function store(ResumeOrderRequest $request)
    {
        $data = $request->validated();

        $resumeOrder = $this->resumeOrderService->store($data);

        if (!$resumeOrder) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success', ResumeOrderResource::make($resumeOrder));
    }

    public function update(ResumeOrderRequest $request, $id)
    {
        $data = $request->validated();

        if (!$this->resumeOrderService->update($data, $id)) {
            return apiResponce(400, 'Bad Request');
        }

        $resumeOrder = $this->resumeOrderService->getResumeOrder($id);

        if (!$resumeOrder) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', ResumeOrderResource::make($resumeOrder));
    }

    public function destroy($id)
    {
        if (!$this->resumeOrderService->delete($id)) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success');
    }
}
