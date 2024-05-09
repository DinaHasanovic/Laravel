<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Posts;
use App\Models\NewsFeed;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class PostController extends Controller
{

    //Home Page
    public function home(){
        return view('home');
    }

    //Contact Page
    public function contact(){
        return view('contact');
    }


    //Get All Posts
   //Get All Posts
public function index(){
    $searchTerm = request('search');
    $posts = Posts::latest();

    if ($searchTerm) {
        $posts->where('title', 'like', '%'.$searchTerm.'%')
              ->orWhere('description', 'like', '%'.$searchTerm.'%');
    }

    return view('posts.index', [
        'posts' => $posts->paginate(3),
        'newsFeed' => NewsFeed::latest()->get()
    ]);
}



    //Show Form For Post Creation
    public function create(){
        return view('posts.create');
    }

    public function show($id)
{
    $post = Posts::findOrFail($id); // Pretpostavka da je model Post
    $responses = Response::where('post_id', $post->id)->get(); // Promenjeno na Response umesto Comment

    return view('posts.show', ['post' => $post, 'responses' => $responses]);
}

    //Create Post
    public function store(Request $request){

        $formFields = $request->validate([
            'title' => ['required', Rule::unique('posts', 'title')],
            'description' => 'required',
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Dodajte validaciju za sliku ako je potrebno
        ]);


         $formFields['user_id'] = auth()->id();
         $formFields['image'] = $request->file('image')->store('post_images','public');
         $postTitle = $formFields['title'];

        Posts::create($formFields);

        NewsFeed::create([
            'content' => auth()->user()->name . " created a new Post named $postTitle",
        ]);


        return redirect('/')-> with('message','Post Created Successfuly!');
    }


    //Show Edit Form
    public function edit(Posts $post){
        return view('posts.edit', ['post' => $post]);
    }


    //Update Post Data
    public function update(Request $request, Posts $post){

        //Make sure logged in user is owner
        if($post->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }

        $formFields = $request-> validate([
            'title' => ['required'],
            'description' => 'required',
            'duration' => ['required','min:1'],
            'tags' => ['required','min:1'],
            'price' => ['required','min:0']
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post_images', 'public');
            $formFields['image'] = $imagePath;
        }
        $post->update($formFields);


        $postTitle = $formFields['title'];
        NewsFeed::create([
            'content' => auth()->user()->name . " updated a Post named $postTitle",
        ]);


        return back()->with('message','Post Updated Successfuly!');
    }


    //Delete Post
    public function destroy(Posts $post){

        if($post->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }

        $postTitle = $post->title;
        NewsFeed::create([
            'content' => auth()->user()->name . " Removed a Post named $postTitle",
        ]);

        $post->delete();
        return redirect('/')->with('message', "Post Deleted Successfully!");
    }


    //Manage Posts
    public function manage(){

        return view('posts.manage',['posts' => auth()->user()->posts()->get()]);
    }


    public function showReplyForm($postId)
    {
        $post = Posts::findOrFail($postId);
        return view('reply.form', compact('post'));
    }

    public function storeresponses(Request $request)
{
    // Validacija podataka
    $request->validate([
        'content' => 'required|string',
    ]);

    // Kreiranje odgovora
    $response = new Response();
    $response->content = $request->input('content');
    $response->user_id = Auth::id(); // Postavljanje ID-a trenutno prijavljenog korisnika
    $response->post_id = $request->input('post_id'); // Postavljanje ID-a posta
    $response->save();

    // Redirekcija sa porukom ili bilo šta drugo što želite
    return redirect('/posts')->with('message','Dodat komentar');
}




}
