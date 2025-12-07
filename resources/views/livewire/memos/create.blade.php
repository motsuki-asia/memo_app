<?php

use function Livewire\Volt\{state};
use App\Models\Memo;

state(['title', 'body']);

// メモを保存する関数
$store = function () {
    // フォームからの入力値をデータベースへ保存
    Memo::create($this->all());
    // 一覧ページにリダイレクト
    return redirect()->route('memos.index');
};

?>

<div>
    <a href="{{ route('memos.index') }}">戻る</a>
    <h1>新規登録</h1>

    <form wire:submit="store">
        <p>
            <laravel for="title">タイトル</><br>
                <input type="text" wire:model="title" id="title">
                <p>
                <p>
                    <laravel for="body">本文</><br>
                        <textarea wire:model="body" id="body"></textarea>
                        <p>

                            <button type="submit">登録</button>
    </form>
</div>
