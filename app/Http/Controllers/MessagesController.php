<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Message;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    
    public function sendMessage(Request $request)
    {
        // Do the validation...

        // Send the message from the current user to the user with ID of 1,
        // You probably always want the current logged-in user as the sender.
        // We talk about the recipient later...
        //
         $request->validate([
            'content' => 'required',
            'name_student' => 'required',

        ]);
        Message::create([
            'content'       => $request->content,
            'sent_to_id'    => $request->sent_to_id,
            'sender_id'		=> Auth::id(),
            'name_student'  => Auth::user()->username,
        ]);  
         return redirect()->route('users.show',$request['sent_to_id']); 

        // Set flash message, render view, etc...
    }

    public function destroy(Message $message)
    {
        //
        $message->delete();

        return redirect()->back();
    }

    public function show() {
        $messages = DB::table('messages')
            ->join('users', function ($join) {
                $join->on('messages.sender_id','=','users.id')
                 ->where('sent_to_id', '=', Auth::id());
            })
            ->get();

        return view('messages', compact('messages'));
    }
   
}
