<?php

namespace App\Http\Controllers;

use App\Referral;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Referral $referral)
    {
        $request->validate([
            'comment' => 'required|max:255',
        ]);

        $referral->comments()->create([
            'user_id' => 3,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Comment added successfully!');
    }
}
