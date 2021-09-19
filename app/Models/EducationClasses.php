<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class EducationClasses extends Model
{
    use HasFactory;
    protected $fillable = [
       'banglaClass',
       'englishClass',
       'language',
       'computer',
       'activities',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
