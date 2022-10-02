<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home() {
        return view('home');
    }
    public function about() {
        return view('about');
    }
    public function review() {
        $reviews = new ContactModel();
//        dd($reviews->all());
        return view('review', ['reviews' => $reviews->all()]);
    }

    public function review_check(Request $request) {
//        dd($request);
        $valid = $request->validate([
            'email' => 'required|min:4|max:100',
            'subject' => 'required|min:4|max:100',
            'message' => 'required|min:15|max:500',
        ]);

        $review = new ContactModel();
        $review->email = @$request->input('email');
        $review->subject = @$request->input('subject');
        $review->message = @$request->input('message');
        $review->save();

        return redirect()->route('review');
    }
}
