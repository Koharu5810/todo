<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [   // fillable＝書き換え可能  guarded=書き換え不可
        'category_id',
        'content'
    ];
    // public function todos()
    // {
    //     return $this->hasMany('App\Models\Todo');
    // }
    // public function todos()
    // {
    //     return $this->belongsTo('App\Models\Todo');
    // }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
