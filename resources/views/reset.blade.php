@extends('layouts.app')

@section('content')
<h1>Recover Password - Step 3</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <p style="color: green;">{{ session('status') }}</p>
@endif

<form action="{{ route('recovery.reset') }}" method="POST">
    @csrf
    <label for="password">New Password:</label>
    <input type="password" name="password" required>

    <label for="password_confirmation">Confirm Password:</label>
    <input type="password" name="password_confirmation" required>

    <button type="submit">Reset Password</button>
</form>
@endsection
