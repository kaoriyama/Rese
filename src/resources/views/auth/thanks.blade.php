@extends('layouts.app')

@section('title', '会員登録完了')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>会員登録ありがとうございます</h1>
    <button class="btn" onclick="location.href='{{ route('login') }}'">ログインする</button>
</div>
@endsection