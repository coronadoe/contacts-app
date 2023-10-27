<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Jobs\AddContact;
use App\Models\Contact;

use Illuminate\Http\Request;

class Contacts extends Controller
{
    public function index() {

        $contacts = Contact::all();

        return response()->json(['contacts' => $contacts]);
    }

    public function store(ContactRequest $contactRequest) {

        $result = [
            'success' => false,
            'message' => 'Unable to add contact in the system'
        ];

        if ($contactRequest->validated()) {
            dispatch(new AddContact($contactRequest->all()));
            $result['success'] = true;
            $result['message'] = 'Contact added in the system';
        }

        return response()->json($result);

    }

}