<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {


        $data = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create($data);

        return back()->with('status', 'Subscription successful!');
    }
}
