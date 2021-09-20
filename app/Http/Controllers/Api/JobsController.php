<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Support\Facades\DB;


class JobsController extends Controller
{
    public function index()
    {

        $jobs = DB::table('authors')
            ->leftJoin('jobs', 'authors.id', '=', 'jobs.author_id')
            ->paginate(5);

        if ($jobs) {
            return response()->json($jobs);
        } else {
            abort('404');
        }

    }

    public function show($id)
    {

        $job = Job::where('id', $id)->first();
        if ($job) {
            return response()->json($job);
        } else {
            abort('404');
        };

    }

}
