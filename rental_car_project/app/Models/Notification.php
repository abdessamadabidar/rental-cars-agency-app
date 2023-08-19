<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['isRead', 'title', 'content', 'user_id'];



    public  function send() {
        $notification['title'] = $this->title;
        $notification['content'] = $this->content;
        $notification['user_id'] = $this->user_id;
        self::create($notification);
    }

}
