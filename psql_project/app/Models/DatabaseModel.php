<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseModel extends Model
{
    use HasFactory;
    // Task 1: Add your getDbsList() function below
    public function getDbsList()
    {
        return DB::select("SELECT datname FROM pg_database WHERE datname NOT LIKE 'template%';")
    }

}
