<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolProfileMapping extends Model
{
    use HasFactory;

    protected $table = 'school_profile_mapping';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'schoolID',
        'UserRefID'
    ];

    public function school()
    {
        return $this->belongsTo(School::class, 'schoolID', 'schoolID');
    }
}