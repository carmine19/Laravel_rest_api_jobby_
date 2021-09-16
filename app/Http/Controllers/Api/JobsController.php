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

         $response = [
           'pagination' => [
               'total' => $jobs->total(),
               'per_page' => $jobs->perPage(),
               'current_page' => $jobs->currentPage(),
               'last_page' => $jobs->lastPage(),
               'from' => $jobs->firstItem(),
               'to' => $jobs->lastItem()
           ],
           'jobs' => $jobs
       ];


        return response()->json($response);
    }
}
