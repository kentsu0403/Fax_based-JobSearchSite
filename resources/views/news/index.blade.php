@extends('layouts.main')  <!-- 新しいレイアウト main.blade.php を指定 -->

@section('content')
    @foreach($news as $article)
        <h2>{{ $article->title }}</h2>
        <p>{{ $article->content }}</p>

        <form action="{{ route('vote.store') }}" method="POST">
            @csrf
            <input type="hidden" name="news_id" value="{{ $article->id }}">
            <label>年齢: <input type="number" name="user_age" required></label><br>
            
            <label for="gender_male">
                <input type="radio" id="gender_male" name="gender" value="male" required>
                男性
            </label>
            <label for="gender_female">
                <input type="radio" id="gender_female" name="gender" value="female" required>
                女性
            </label><br>
            
            <label>居住地:
                <select name="user_location" required>
                    <option value="">選択してください</option>
                    @foreach ($prefectures as $prefecture)
                        <option value="{{ $prefecture }}">{{ $prefecture }}</option>
                    @endforeach
                </select>
            </label><br>

            <button type="submit" name="vote" value="1">肯定</button>
            <button type="submit" name="vote" value="0">否定</button>
        </form>
    @endforeach

@endsection
