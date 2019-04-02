<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/hello-world', function(Request $request){
    return response()->json('Hello World!', 200);
});

// Phuong thuc GET
Route::get('/books', function(Request $request){
    $entries = [
        [
            "isbn" => "9781593275846",
            "title" => "Eloquent JavaScript, Second Edition",
            "author" => "Marijn Haverbeke"
        ],
        [
            "isbn" => "9781449331818",
            "title" => "Learning JavaScript Design Patterns",
            "author" => "Addy Osmani"
        ],
        [
            "isbn" => "9781449365035",
            "title" => "Speaking JavaScript",
            "author" => "Axel Rauschmayer",
        ],
        [
            "isbn" => "9781491950296",
            "title" => "Programming JavaScript Applications",
            "author" => "Eric Elliott"
        ]
    ];
    return response()->json($entries, 200);
});

// Send du lieu JSON ve Server bang phuong thuc POST
// Route::post('/books', function(Request $request){
//
//     $entries = [
//         [
//             "isbn" => "9781593275846",
//             "title" => "Eloquent JavaScript, Second Edition",
//             "author" => "Marijn Haverbeke"
//         ],
//         [
//             "isbn" => "9781449331818",
//             "title" => "Learning JavaScript Design Patterns",
//             "author" => "Addy Osmani"
//         ]
//     ];
//
//     // Get book data from POST
//     $book = [
//         "isbn" => $request->input('isbn'),
//         "title" => $request->input('title'),
//         "author" => $request->input('author')
//     ];
//
//     // Append news book into current list.
//     $entries[] = $book;
//
//     return response()->json($entries, 200);
// });
