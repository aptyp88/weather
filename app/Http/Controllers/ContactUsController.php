<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use App\Services\ContactUsService;

class ContactUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('contact-us');
    }

    public function store(ContactUsRequest $request)
    {
        ContactUsService::store($request);
    }
}
