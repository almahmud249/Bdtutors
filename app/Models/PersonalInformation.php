<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class PersonalInformation extends Model
{
    use HasFactory;
    protected $fillable = ['fullName',

        'blood_group',

        'date',
        'user_id',
        'religion',
        'marital_status',
        'address',
        'gender',
        'desc',
        'photo',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
