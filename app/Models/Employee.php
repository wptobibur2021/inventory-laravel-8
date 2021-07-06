<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'village',
        'post_office',
        'upzila',
        'zila',
        'photo',
        'nid_no',
        'nid_photo',
        'joining_date'
    ];
}
