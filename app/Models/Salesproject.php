<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesproject extends Model
{
    use HasFactory;
    
    //保存可能なカラムとして設定
    protected $fillable = ['customername','price','comment'];

    //Userモデルとの関係を定義
    public function user() {
        return $this->belongsTo(User::class);
    }
}
