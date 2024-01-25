<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModuleENewAPIController extends Controller
{
    public function getNews(Request $request){
        $data = [
            "id" => 2,
            "title" => "2A Look at the Latest Innovations in AI Technology",
            "publicationDate" => "2023-08-01T12:58:04Z",
            "author" => "Celine Gordon",
            "imageUrl" => "http://localhost:3000/images/10.jpg"
        ];
        $articles = [
            $data,
            $data,
            $data,
            $data,
            $data,
            $data,
            $data,
            $data,
        ];
        return response()->json([
            'articles' => $articles
        ]);
    }
}
