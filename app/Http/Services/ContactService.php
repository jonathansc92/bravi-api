<?php

namespace App\Http\Services;

use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class ContactService
{
    public function get($filter)
    {
        $contacts = Contact::filter($filter)->paginate();

        return success_response(
            data: new ResourceCollection($contacts),
            message: __('messages.retrieved', ['model' => __('models/contact.plural')]),
        );
    }

    public static function create($request)
    {
        $contact = Contact::create($request->validated());

        return success_response(
            data: new ContactResource($contact),
            message: __('messages.saved', ['model' => __('models/contact.singular')]),
            httpStatus: Response::HTTP_CREATED,
        );
    }

    public function find($contact)
    {
        return success_response(
            data: new ContactResource($contact),
            message: __('messages.retrieved', ['model' => __('models/contact.singular')]),
        );
    }

    public static function update($request, $contact)
    {
        $contact->update($request->validated());

        return success_response(
            data: new ContactResource($contact),
            message: __('messages.updated', ['model' => __('models/contact.singular')]),
        );
    }

    public static function delete($contact)
    {
        Contact::destroy($contact->id);

        return success_response(
            message: __('messages.deleted', ['model' => __('models/contact.singular')]),
        );
    }
}
