<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Auth;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        $auth_id = Auth::user()->id;
        $is_current_user = ($id == $auth_id);
        $contacts = Contact::where('user_id',$id)->paginate(20)->toArray();
        return view('contact-show', compact('contacts', 'is_current_user', 'id'));
    }

    /**
     * Show the application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('contact-create');
    }

    /**
     * Store the application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(\App\Http\Requests\ContactStore $request)
    {
        $auth_id = Auth::user()->id;
        $requestData = $request->validated();
        $requestData['user_id'] = $auth_id;
        $contact = Contact::create($requestData);
        $contact->save();
        return redirect()->route('contacts.show', $auth_id);
    }

    /**
     * Show the application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contact-create', compact('contact', 'id'));
    }

    /**
     * Show the application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update($id,\App\Http\Requests\ContactStore $request)
    {
        $contact = Contact::find($id);
        $contact->update($request->validated());
        return redirect()->route('contacts.show', Auth::user()->id);
    }

    /**
     * Delete the application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete($id)
    {
        $auth_id = Auth::user()->id;
        $contact = Contact::find($id);
        $contact->delete();
        return response()->json([]);
    }

    public function fetchContacts($user_id)
    {
        $contacts = Contact::where('user_id',$user_id)->paginate(20);
        return response()->json($contacts);
    }
}
