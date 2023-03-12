<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $table = 'emails';

    protected $primaryKey = 'emailID';

    protected $fillable = [
        'UserRefID',
        'emailaddress',
        'Default',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'UserRefID', 'UserRefID');
    }
}