<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
     public function addEnquiry(Request $request){

        $request->validate([
                    'enquiry' => 'required',
                    'product_id' => 'required',
                    'user_email' =>'required'
                ]);
        $data = $request->all();

        $enquiry = new Enquiry();
        $enquiry->product_id = $data['product_id'];
        $enquiry->enquiry = $data['enquiry'];
        $enquiry->user_email = $data['user_email'];
        $enquiry->save();
        return redirect('/products');
    }
}
