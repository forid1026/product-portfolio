<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function AllContact()
    {
        $allContact = Contact::latest()->get();
        return view('admin.contact.contact_all', compact('allContact'));
    }

    public function DeleteContact($id)
    {
        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Contact Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.contact')->with($notification);
    } //end method

    public function Storecontact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->created_at = Carbon::now();
        $contact->save();

        Alert::success('Success', 'Contact Form Submitted Successfully');
        return redirect()->back();
    } //end method
}
