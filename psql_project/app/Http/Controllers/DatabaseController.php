<?php

namespace App\Http\Controllers;

use App\Models\DatabaseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DatabaseController extends Controller
{

    # Task 1: Update the following index() function
    public function index()
    {
        $dBInstance = new DatabaseModel();
        $dbs = $dBInstance->getDbsList();
        return view('main', compact('dbs'));
    }


}
