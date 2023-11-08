<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVideo extends Model
{
    use HasFactory;
    protected $table = 'user_video'; 

    protected $fillable = ['merchandiser_id', 'mr_supervisor_id', 'mr_executive_id', 'bastaff_id', 'ba_supervisor_id', 'ba_executive_id', 'video_id'];
}
