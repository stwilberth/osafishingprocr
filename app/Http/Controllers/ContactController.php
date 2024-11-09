<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    //contact page
    public function index()
    {
        $status = request('status');
        //filter contacts by status
        if (request('status')) {
            $contacts = Contact::where('status', request('status'))->latest()->get();
        } else {
            $contacts = Contact::latest()->get();
        }

        return view('contacts.index', compact('contacts', 'status'));
    }
    
    //create contact form
    public function create()
    {
        return view('contacts.create');
    }
    
    //contact store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
    
        //save to database
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->status = 0;
        $contact->created_at = now();
        $contact->updated_at = now();
        $contact->save();
    
        //redirect to contacts page
        return redirect()->route('pages.index')->with('success', 'Contact created successfully.');
    }

    //show contact
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    //edit only status
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    //update status
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'status' => 'required|in:0,1,2,3',
        ]);
    
        $contact->status = $request->status;
        $contact->updated_at = now();
        $contact->save();
    
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    //delete contact
    public function destroy(Contact $contact)
    {
        $contact->delete();
    
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }

}
