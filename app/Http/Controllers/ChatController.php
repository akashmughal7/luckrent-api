<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ChatController extends Controller
{
    //
    public function Chat(Request $request){

        $chat_id = DB::table('chats')->insertGetId([
          'user_id' => auth()->user()->id,
         'message'=>  $request->message,
      ]);

      $images=$request->file('file');
      $imageName='';
      if($images){
      foreach($images as $image){
          $new_name=rand().'.'.$image->getClientOriginalExtension();
          $path=$image->move(public_path('/uploads/chatdata'),$new_name);
          $imageName=$new_name;
        DB::table('chatfiles')->insertGetId([
            'user_id' => auth()->user()->id,
            'chat_id' =>  $chat_id,
            'title' =>  $imageName,
            'path' =>  $path
        ]);
    }}
    return response()->json([
        'message' => 'Your message has been sended',
    ], 201);
    
    }
}
