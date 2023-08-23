<?php

namespace App\Http\Controllers;

use App\Models\NewsFeed;
use Illuminate\Http\Request;

class NewsFeedController extends Controller
{
    public function create(Request $request){
        

        $formFields = $request->validate([
            'content' => 'required',
        ]);

        NewsFeed::create($formFields);


        return back()->with('message', 'News Feed added successfully');
    }


    public function destroy(NewsFeed $feed){
        
        if(!$feed){
            return back()->with('message', 'News Feed not found');
        }

        $feed->delete();

        return back()->with('message', 'News Feed deleted successfuly');
    }
}
