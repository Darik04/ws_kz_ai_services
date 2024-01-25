<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DreamWeaverController extends Controller
{
    private $image = 'https://buffer.com/cdn-cgi/image/w=1000,fit=contain,q=90,f=auto/library/content/images/size/w1200/2023/10/free-images.jpg';
    public function generateImageBasedText(Request $request){
        $validator = Validator::make($request->all(), [
            'text_prompt' => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        return response()->json([
            'job_id' => Str::random(16),
            'started_at' => now()
        ], 201);
    }


    public function getTheStatusAndProgress(Request $request, string $jobId){

        return response()->json([
            'status' => 'pending',
            'progress' => rand(0, 100),
            'image_url' => $this->image
        ], 200);
    }

    public function getResult(Request $request, string $jobId){

        return response()->json([
            'resource_id' => Str::random(16),
            'image_url' => $this->image,
            'finished_at' => now()
        ], 200);
    }


    public function upscaleGeneratedImage(Request $request){
        $validator = Validator::make($request->all(), [
            'resource_id' => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        return response()->json([
            'job_id' => Str::random(16),
            'started_at' => now()
        ], 201);
    }


    public function zoomIn(Request $request){
        $validator = Validator::make($request->all(), [
            'resource_id' => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        return response()->json([
            'job_id' => Str::random(16),
            'started_at' => now()
        ], 201);
    }




    public function zoomOut(Request $request){
        $validator = Validator::make($request->all(), [
            'resource_id' => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        return response()->json([
            'job_id' => Str::random(16),
            'started_at' => now()
        ], 201);
    }
}
