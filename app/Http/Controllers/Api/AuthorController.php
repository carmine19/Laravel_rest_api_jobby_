<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Support\Facades\DB;


class AuthorController extends Controller
{

    public function index()
    {

        $authors = DB::table('authors')->paginate(5);

        if ($authors) {
            return response()->json($authors);
        } else {
            abort('404');
        }

    }


    public function show($id)
    {

        $author = Author::where('id', $id)->first();

        if ($author) {
            return response()->json($author);
        } else {
            abort('404');
        }

    }
}
