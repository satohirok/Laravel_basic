@extends('layouts.default')
@section('title','画像アップロード')
@section('content')
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
   <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
     @csrf
     <label>画像: <input type="file" name="image"></label>
     <button type="submit">アップロード</button>
   </form>
@endsection
