<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Author;


class JobsController extends Controller
{
    public function index() {

        $jobs = Job::paginate(5);


        return response()->json([
            'success'=> true,
            'jobs' => $jobs
        ]);
    }
}
