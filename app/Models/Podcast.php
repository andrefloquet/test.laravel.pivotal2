<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Comment;


class Podcast extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $hidden = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'marketing_url',
        'feed_url'
    ];   

    public function comments() {
        return $this->hasMany(Comment::class);
    } 
}
