<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    // Specify the table name if it's not 'customers'
    // protected $table = 'your_table_name';

    // Columns that are mass-assignable
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Or use guarded to prevent mass assignment on specific fields
    // protected $guarded = ['id'];
}
