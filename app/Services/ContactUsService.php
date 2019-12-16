<?php

namespace App\Services;

use App\Models\ContactUs;

class ContactUsService
{
    public static function store($request)
    {
        $user = \Auth::user();
        $comment = new ContactUs();
        $comment->user_id = $user->id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->message = $request->message;
        $comment->save();
    }
}