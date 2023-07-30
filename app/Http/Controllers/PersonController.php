<?php

namespace App\Http\Controllers;

use App\Http\Filters\PersonFilter;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Http\Services\PersonService;
use App\Models\Person;
use Illuminate\Http\JsonResponse;

class PersonController extends Controller
{
    protected $service;

    public function __construct(PersonService $service)
    {
        $this->service = $service;
    }

    public function index(PersonFilter $filter): JsonResponse
    {
        return $this->service->get($filter);
    }

    public function show(Person $person): JsonResponse
    {
        return $this->service->find($person);
    }

    public function store(StorePersonRequest $request): JsonResponse
    {
        return $this->service->create($request);
    }

    public function update(UpdatePersonRequest $request, Person $person): JsonResponse
    {
        return $this->service->update($request, $person);
    }

    public function destroy(Person $person): JsonResponse
    {
        return $this->service->delete($person);
    }
}
