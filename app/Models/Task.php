<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    //contentカラムへの保存を可能にする。
    protected $fillable = ['content'];
    
    //タスクを所有するユーザー（Userモデルとの関係を定義）
    function user() {
        return $this->belongsTo(User::class);
    }
}
