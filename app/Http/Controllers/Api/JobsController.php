<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;




class JobsController extends Controller
{
    public function index() {

        $data = Job::paginate(5);

        return response()->json($data);
    }
}
