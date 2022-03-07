<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContactMail;
use Illuminate\Support\Facades\Validator;


class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        Mail::to('customerservice@boolpress.it')->send(new NewContactMail($new_lead));
    }
}
