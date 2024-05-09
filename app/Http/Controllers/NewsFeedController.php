<?php

namespace App\Http\Controllers;

use App\Models\NewsFeed;
use Illuminate\Http\Request;

class NewsFeedController extends Controller
{

    //Create NewsFeed
    public function create(Request $request){


        $formFields = $request->validate([
            'content' => 'required',
        ]);

        NewsFeed::create($formFields);


        return back()->with('message', 'News Feed added successfully');
    }


    //Delete NewsFeed
    public function destroy(NewsFeed $feed){

        if(!$feed){
            return back()->with('message', 'News Feed not found');
        }

        $feed->delete();

        return back()->with('message', 'News Feed deleted successfuly');
    }


    //Send message to apply for the moderator
    public function applyForModerator()
    {
        if (auth()->user()->role === 'student') {
            $content = auth()->user()->name . '  applied for the moderator role.';
            NewsFeed::create([
                'content' => $content,
            ]);

            return back()->with('message', 'Your application has been submitted.');
        }

        return back()->with('message', 'You are not eligible to apply for the moderator role.');
    }


    //Send message from contact us page
    public function sendMessage(Request $request)
{
    // Create a new notification in the news feed
    $content = "New message from: " . $request->input('name') . " (" . $request->input('email') . ")\n";
    $content .= "Message: " . $request->input('message');

    NewsFeed::create([
        'content' => $content,
    ]);

    return back()->with('message', 'Message sent successfully!');
}
}
