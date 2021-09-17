<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class JobsController extends Controller
{
    public function index() {

      $jobs = DB::table('authors')
            ->leftJoin('jobs', 'authors.id', '=', 'jobs.author_id')
            ->paginate(5);

         $response = [
             'jobs' => $jobs,
         ];

         /*return Inertia::render('JobList', [
            'jobList' => $response
        ]);*/

        return response()->json($response);
    }


}
