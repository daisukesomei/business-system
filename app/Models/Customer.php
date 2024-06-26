<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    //保存可能なカラムとして設定
    protected $fillable = ['customername', 'postalcode', 'address', 'tel', 'email'];
    
    //お客様が紐づく案件。（Salesprojectモデルとの関係を定義）
    public function salesprojects() {
        return $this->hasMany(Salesproject::class);
    }
}
