@extends('layouts.app')

@section('title', '予約完了')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')
<div class="container">
    <h1>ご予約ありがとうございます</h1>
    <button class="back-botton" onclick="location.href='{{ route('index') }}'">戻る</button>
</div>
@endsection