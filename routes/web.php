<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
});

// 一覧ページ
Volt::route('/memos', 'memos.index')->name('memos.index');
// 具体的なパスを先に定義
// 新規作成ページ
Volt::route('/memos/create', 'memos.create')->name('memos.create');
// 動的パラメータを含むルートは最後に定義
// 詳細ページ
Volt::route('/memos/{memo}', 'memos.show')->name('memos.show');
