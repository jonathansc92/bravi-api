<?php

namespace App\Http\Services;

use App\Http\Resources\PersonResource;
use App\Models\Person;
use App\Http\Resources\ResourceCollection;
use Illuminate\Http\Response;

class PersonService
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function get($filter)
    {
        $person = Person::filter($filter)->with('contacts')->paginate();

        return success_response(
            data: new ResourceCollection($person),
            message: __('messages.retrieved', ['model' => __('models/person.plural')]),
        );
    }
    public static function create($request)
    {
        $person = Person::create($request->validated());

        return success_response(
            data: new PersonResource($person),
            message: __('messages.saved', ['model' => __('models/person.singular')]),
            httpStatus: Response::HTTP_CREATED,
        );
    }

    public function find($person)
    {
        return success_response(
            data: new PersonResource($person),
            message: __('messages.retrieved', ['model' => __('models/person.singular')]),
        );
    }

    public static function update($request, $person)
    {
        $person->update($request->validated());

        return success_response(
            data: new PersonResource($person),
            message: __('messages.updated', ['model' => __('models/person.singular')]),
        );
    }

    public static function delete($person)
    {
        $person->contacts()->delete();

        Person::destroy($person);

        return success_response(
            message: __('messages.deleted', ['model' => __('models/person.singular')]),
        );
    }
}
