<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Podcast;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'podcast_id',
        'name',
        'email',
        'body',
    ];    

    public function podcast() {
        return $this->belongsTo(Podcast::class);
    }
}
