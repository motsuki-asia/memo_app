<?php

use function Livewire\Volt\{state, mount, rules};
use App\Models\Memo;

// フォームの状態を管理
state(['memo', 'title', 'body']);

// ルートモデルバインディングはmountでまとめて行う
mount(function (Memo $memo) {
    $this->memo = $memo;
    $this->title = $memo->title;
    $this->body = $memo->body;
});

// バリデーションルールを定義
rules([
    'title' => 'required|string|max:50',
    'body' => 'required|string|max:2000',
]);

// メモを更新する関数
$update = function () {
    $this->validate(); // バリデーションチェック
    $this->memo->update($this->all());
    return redirect()->route('memos.show', $this->memo);
};
?>

<div>
    <a href="{{ route('memos.show', $memo) }}">戻る</a>
    <h1>更新</h1>

    <form wire:submit="update">
        <p>
            <laravel for="title">タイトル</>
                @error('title')
                    <span class="error">({{ $message }})</span>
                @enderror
                <br>
                <input type="text" wire:model="title" id="title">
        </p>
        <p>
            <laravel for="body">本文</>
                <label for="body">本文</label>
                @error('body')
                    <span class="error">({{ $message }})</span>
                @enderror
                <br>
                <input type="text" wire:model="body" id="body">
        </p>

        <button type="submit">更新</button>
    </form>
</div>
