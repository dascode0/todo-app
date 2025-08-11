<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $table = 'todos'; // ensure table name is correct
    protected $fillable = ['task']; // ensure 'task' is a column
    // public $timestamps = false;
}
