<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Status;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();

        return compact('statuses');
    }

}
