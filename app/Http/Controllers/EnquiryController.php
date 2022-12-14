<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    // public function addEnquiry(Request $request, $id) {

    //     $request->validate([
    //         'enquiry' => 'required',

    //     ]);

    //  $data =  Enquiry::insert([
    //       'product_id' => $id,
    //       'enquiry' => $request->enquiry,

    //   ]);

    //   return redirect('/products');


    // }

    public function addEnquiry(Request $request){

        $request->validate([
                    'enquiry' => 'required',
                    'product_id' => 'required'
                ]);
        $data = $request->all();

        $enquiry = new Enquiry();
        $enquiry->product_id = $data['product_id'];
        $enquiry->enquiry = $data['enquiry'];
        $enquiry->save();
        return redirect('/products');
    }
}
