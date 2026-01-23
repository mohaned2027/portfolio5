<?php

namespace App\Http\Controllers;

use App\Services\ServicesService;
use App\Http\Requests\ServicesRequest;
use App\Http\Resources\Service\ServiceCollection;
use App\Http\Resources\Service\ServiceResource;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(protected ServicesService $servicesService) {}
    public function index()
    {
        $data = $this->servicesService->getServices();

        if ($data->isEmpty()) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', new ServiceCollection($data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicesRequest $request)
    {
        $data = $request->validated();

        $service = $this->servicesService->store($data);

        if (!$service) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success', ServiceResource::make($service));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicesRequest $request, $id)
    {
        $data = $request->validated();

        if (!$this->servicesService->update($data, $id)) {
            return apiResponce(400, 'Bad Request');
        }

        $service = $this->servicesService->getService($id);

        if (!$service) {
            return apiResponce(404, 'Not Found');
        }

        return apiResponce(200, 'Success', ServiceResource::make($service));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!$this->servicesService->delete($id)) {
            return apiResponce(400, 'Bad Request');
        }

        return apiResponce(200, 'Success');
    }
}
