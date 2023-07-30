<?php

namespace App\Http\Controllers;

use App\Http\Filters\ContactFilter;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Services\ContactService;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    protected $service;

    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }

    public function index(ContactFilter $filter): JsonResponse
    {
        return $this->service->get($filter);
    }

    public function show(Contact $contact): JsonResponse
    {
        return $this->service->find($contact);
    }

    public function store(StoreContactRequest $request): JsonResponse
    {
        return $this->service->create($request);
    }

    public function update(UpdateContactRequest $request, Contact $contact): JsonResponse
    {
        return $this->service->update($request, $contact);
    }

    public function destroy(Contact $contact): JsonResponse
    {
        return $this->service->delete($contact);
    }
}
