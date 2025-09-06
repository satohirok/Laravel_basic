@extends('layouts.default')

@section('title', 'GETフォーム')

@section('content')
    <form action="/query-strings" method="get">
        <label for="keyword">キーワード:</label>
        <input type="text" name="keyword">
        <button type="submit">送信</button>
    </form>
@endsection
