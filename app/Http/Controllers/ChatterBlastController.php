<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Psy\Util\Str;

class ChatterBlastController extends Controller
{
    public function createConversation(Request $request){
        $validator = Validator::make($request->all(), [
            'conversationId' => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $exist = Conversation::all()->where('conversation_id', $request->get('conversationId'))->first();

        if(!$exist){
            $new_con = new Conversation();
            $new_con->conversation_id = $request->get('conversationId');
            $new_con->save();
        }

        return response()->json([
            'conversation_id' => $request->get('conversationId')
        ], 201);
    }




    public function sendPromptToCon(Request $request, string $conId){
        $validator = Validator::make($request->all(), [
            'text' => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        return response()->json([
            'conversation_id' => $conId,
            'response' => $request->get('text'),
            'is_final' => rand(0, 1) == 1,
        ], 201);
    }

    public function getPartCon(Request $request, string $conId){


//        return response()->json([
//            'conversation_id' => $conId,
//            'response' => 'Example response of Ai(bla bla bla)',
//            'is_final' => rand(0, 1) == 1,
//        ], 200);

        $example1 = "Hello example answer(is finished) <EOF> Заняло 4254 мс";
        $example2 = "Hello example 2 answer ".\Illuminate\Support\Str::random(10);

        $answer = $example2;

        if(rand(0, 3) == 3){
            $answer = $example1;
        }
        return response()->json($answer, 200);
    }
}
