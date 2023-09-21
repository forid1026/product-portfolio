<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DistributorController extends Controller
{
    public function AllDistributor()
    {
        $allDistributor = Distributor::latest()->get();
        return view('admin.distributor.distributor_all', compact('allDistributor'));
    }

    public function DeleteDistributor($id)
    {
        Distributor::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Distributor Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.distributor')->with($notification);
    } //end method

    public function StoreDistributor(Request $request)
    {
        $contact = new Distributor();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->province = $request->province;
        $contact->city = $request->city;
        $contact->package = $request->distributor_package;
        $contact->created_at = Carbon::now();
        $contact->save();

        Alert::success('Success', 'Distributor Form Submitted Successfully');
        return redirect()->back();
    } //end method
}
