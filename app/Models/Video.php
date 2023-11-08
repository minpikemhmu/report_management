<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'link'];

    public function merchandisers()
    {
        return $this->belongsToMany(Merchandiser::class, 'user_video',
        'merchandiser_id', 'video_id');
    }

    public function baStaffs()
    {
        return $this->belongsToMany(BaStaff::class, 'user_video',
        'bastaff_id', 'video_id');
    }
}
