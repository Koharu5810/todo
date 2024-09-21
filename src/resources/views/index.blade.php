@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__result">
    <div class="todo__result--success">
        Todoを作成しました
    </div>
</div>

<div class="todo__content">
    <!-- <div class="todo__create-form"> これ余計 -->
    <form class="create-form" action="/" method="post">
        @csrf
        <!-- Todo入力欄 -->
        <!-- <div class="form__group"> これ余計 -->
        <div class="create-form__item">
            <input class="create-form__item-input" type="text" name="content" value="" />
        </div>
        <div class="create-form__button">
            <button class="create-form__button-submit" type="submit">作成</button>
        </div>
        <!-- </div> -->
    </form>
    <!-- </div> -->
    <!-- Todo編集欄 -->
    <!-- <div class="todo-list">
        <div class="todo-list__content">
            <div class="todo-list__header">
                <h2>Todo</h2>
            </div>
            <div class="todo-list__view">
                <div class="todo-list__todo">
                    test
                </div>
                <div class="todo-list__button">
                    <button class="todo-list__update-button-submit" type="submit">更新</button>
                    <button class="todo-list__delete-button-submit" type="submit">削除</button>
                </div>
            </div>
            <div class="todo-list__view">
                <div class="todo-list__todo">
                    test2
                </div>
                <div class="todo-list__button">
                    <button class="todo-list__update-button-submit" type="submit">更新</button>
                    <button class="todo-list__delete-button-submit" type="submit">削除</button>
                </div>
            </div>
        </div>
    </div> -->

    <div class="todo-table">
        <table class="todo-table__inner">
            <tr class="todo-table__row">
                <th class="todo-table__header">Todo</th>
            </tr>
            <tr class="todo-table__row">
                <td class="todo-table__item">
                    <form class="update-form">
                        <div class="update-form__item">
                            <input class="update-form__item-input" type="text" name="content" value="test">
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="todo-table__item">
                    <form class="delete-form">
                        <div class="delete-form__button">
                            <button class="delete-form__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            <tr class="todo-table__row">
                <td class="todo-table__item">
                    <form class="update-form">
                        <div class="update-form__item">
                            <input class="update-form__item-input" type="text" name="content" value="test2">
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="todo-table__item">
                    <form class="delete-form">
                        <div class="delete-form__button">
                            <button class="delete-form__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>

@endsection