<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\ContactUpdateRequest;

use App\Jobs\Contact\AddContact;
use App\Jobs\Contact\UpdateContact;
use App\Jobs\Contact\DeleteContact;
use App\Models\Contact;

use Illuminate\Http\Request;

class Contacts extends Controller
{
    public function index(): string {

        $contacts = Contact::all();

        return response()->json(['contacts' => $contacts]);
    }

    public function store(ContactRequest $contactRequest): string {
        $result = [
            'success' => false,
            'message' => 'Unable to add contact in the system.'
        ];

        if ($contactRequest->validated()) {
            dispatch(new AddContact($contactRequest->all()));
            $result['success'] = true;
            $result['message'] = 'Contact added in the system.';
        }

        return response()->json($result);
    }

    public function show(int $contactId): string {

        $contact = Contact::find($contactId);

        return response()->json($contact);
    }

    public function update(ContactUpdateRequest $contactUpdateRequest) {

        $result = [
            'success' => false,
            'message' => 'The email already exist.'
        ];

        if ($contactUpdateRequest->validated()) {
            dispatch( new UpdateContact($contactUpdateRequest->all()) );
            $result['success'] = true;
            $result['message'] = 'The contact has been updated.';
        }

        return response()->json($result);

    }

    public function destroy(int $id) {
        $contact = Contact::find($id);

        $result = [
            'success' => false,
            'message' => 'Unable to remove the contact from the system'
        ];

        if (null != $contact) {
            dispatch(new DeleteContact($contact));

            $result['success'] = true;
            $result['message'] = 'The contact has been removed from the system.';
        }

        return response()->json($result);
    }

}