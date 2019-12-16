<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        return view('comments');
    }

    public function show()
    {
        $comments = ContactUs::orderBy('created_at', 'desc')->paginate(3);
        $view = view('layouts.comment', compact('comments'))->render();
        return response()->json(['html' => $view, 'currentPage' => $comments->currentPage(), 'lastPage' => $comments->lastPage()]);
    }

    public function showMore(Request $request)
    {
        $page = $request->currentPage + 1;
        $comments = ContactUs::orderBy('created_at', 'desc')->paginate(3, ['*'], 'page', $page);
        $view = view('layouts.comment', compact('comments'))->render();
        return response()->json(['html' => $view, 'currentPage' => $page, 'lastPage' => $comments->lastPage()]);
    }
}
