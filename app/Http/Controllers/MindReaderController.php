<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MindReaderController extends Controller
{
    public function recognizeImage(Request $request){

        $validator = Validator::make($request->all(), [
            'image' => 'required|file'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $objects = [
            [
                'label' => Str::random(16),
                'probability' => 0,
                'bounding_box' => [
                    'top' => rand(0, 20),
                    'left' => rand(0, 20),
                    'bottom' => rand(0, 20),
                    'right' => rand(0, 20)
                ]
            ]
        ];
        return response()->json([
            'objects' => $objects
        ], 200);
    }
}
