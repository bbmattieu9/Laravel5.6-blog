<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Mail;
use Session;

/**
 *
 */
class PagesController extends Controller
{
    public function getIndex()
    {
      $posts = Post::orderBy('created_at', 'desc')->limit(3)->get();
      return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout()
    {
      $data = [];
      $data['name'] = 'Babatoonday Mattieu';
      $data['occp'] = 'Web Developer';


       return view('pages.about')->withData($data);
    }

    public function getContact()
    {
      return view('pages.contact');
    }

    public function postContact(Request $request)
    {
      $this->validate($request, array(
        'email' => 'required|email',
        'subject' => 'min:3',
        'message'=> 'required|min:10'
      ));

      $data = array(
        'email'=> $request->email,
        'subject' => $request->subject,
        'bodyMessage' => $request->message
      );
      Mail::send('emails.contact', $data, function($message) use($data)
      {
          $message->from($data['email']);
          $message->to('bbmattieu9@gmail.com');
          $message->subject($data['subject']);
      });

      Session::flash('success', 'Your Email was sent');

      return redirect()->route('home');
    }
}
