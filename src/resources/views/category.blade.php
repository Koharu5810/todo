@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')
<div class="category__result">
    @if(session('success'))
    <div class="category__result--success">
        {{ session('success') }}
    </div>
    @endif
    @if($errors -> any())
    <div class="category__result--error">
        <ul>
            @foreach($errors -> all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<div class="category__content">
    <!-- カテゴリ入力欄 -->
    <form class="create-form" action="/categories" method="post">
        @csrf
        <div class="create-form__item">
            <input class="create-form__item-input" type="text" name="name" value="{{ old('name') }}" />
        </div>
        <div class="create-form__button">
            <button class="create-form__button-submit" type="submit">作成</button>
        </div>
    </form>

    <div class="category-table">
        <table class="category-table__inner">
            <tr class="category-table__row">
                <th class="category-table__header">category</th>
            </tr>
            <!-- 更新機能 -->
            @foreach ($categories as $category)
            <tr class=" category-table__row">
                <td class="category-table__item">
                    <form class="update-form" action="/categories/update" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="update-form__item">
                            <!-- <input class="update-form__item-input" type="text" name="content" value="{{ $category['name'] }}" /> -->
                            <input class="update-form__item-input" type="text" name="name" value="{{ $category['name'] }}" />
                            <input type="hidden" name="id" value="{{ $category['id'] }}">
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <!-- 削除機能 -->
                <td class="category-table__item">
                    <form class="delete-form" action="categories/delete" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="delete-form__button">
                            <input type="hidden" name="id" value="{{ $category['id'] }}">
                            <button class="delete-form__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection