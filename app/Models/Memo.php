<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $fillable = ['title', 'body', 'priority'];

    /**
     * 優先度の数値を日本語テキストに変換
     */
    public function getPriorityTextAttribute()
    {
        return match ($this->priority) {
            1 => '低',
            2 => '中',
            3 => '高',
            default => '不明'
        };
    }
}
