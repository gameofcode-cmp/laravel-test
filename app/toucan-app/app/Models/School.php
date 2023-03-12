<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $table = 'schools';

    protected $primaryKey = 'schoolID';

    public $timestamps = false;

    protected $fillable = [
        'Name',
        'Country'
    ];

    public function profiles()
    {
        return $this->hasMany(SchoolProfileMapping::class, 'schoolID', 'schoolID');
    }
}