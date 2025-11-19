@extends('layouts.app')

@section('content')
<div class="container">

    <h2>勤怠打刻</h2>

    <p>現在時刻：{{ now()->format('Y-m-d H:i:s') }}</p>

    <h3>今日のステータス：{{ $attendance->status }}</h3>

    {{-- メッセージ --}}
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- 出勤 --}}
    @if($attendance->status === '勤務外')
        <form action="/attendance/clock-in" method="POST">
            @csrf
            <button class="btn btn-primary">出勤</button>
        </form>
    @endif

    {{-- 休憩入 --}}
    @if($attendance->status === '出勤中')
        <form action="/attendance/break-start" method="POST" class="mt-2">
            @csrf
            <button class="btn btn-warning">休憩入</button>
        </form>
    @endif

    {{-- 休憩戻 --}}
    @if($attendance->status === '休憩中')
        <form action="/attendance/break-end" method="POST" class="mt-2">
            @csrf
            <button class="btn btn-success">休憩戻</button>
        </form>
    @endif

    {{-- 退勤 --}}
    @if($attendance->status === '出勤中')
        <form action="/attendance/clock-out" method="POST" class="mt-2">
            @csrf
            <button class="btn btn-danger">退勤</button>
        </form>
    @endif
</div>
@endsection
