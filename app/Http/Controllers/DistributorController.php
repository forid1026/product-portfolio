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
        $distributor = new Distributor();
        $distributor->name = $request->name;
        $distributor->facebook_url = $request->facebook_url;
        $distributor->phone = $request->phone;
        $distributor->province = $request->province;
        $distributor->city = $request->city;
        $distributor->package = $request->distributor_package;
        $distributor->created_at = Carbon::now();
        $distributor->save();

        Alert::success('Success', 'Distributor Form Submitted Successfully');
        return redirect()->back();
    } //end method


    public function StatusChangeDistributor($id)
    {
        $distributor = Distributor::findOrFail($id);

        $distributor->update([
            'status' => '1',
        ]);

        $notification = array(
            'message' => 'Distributor Status Change Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.distributor')->with($notification);
    }
}
