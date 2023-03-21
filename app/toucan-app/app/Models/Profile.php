<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $primaryKey = 'UserRefID';

    protected $fillable = [
        'UserRefID',
        'Firstname',
        'Surname',
        'Deceased',
    ];

    public function emails()
    {
        return $this->hasMany(Email::class, 'UserRefID', 'UserRefID');
    }

    public function schools()
    {
        return $this->belongsToMany(School::class, 'school_profile_mapping', 'UserRefID', 'schoolID');
    }
}
