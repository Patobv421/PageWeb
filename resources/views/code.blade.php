@extends('layouts.app')

@section('content')
<h1>Recover Password - Step 2</h1>

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

<p>We sent a code to your email. Please enter it below:</p>

<form action="{{ route('recovery.code.check') }}" method="POST">
    @csrf
    <label for="code">Enter code:</label>
    <input type="text" name="code" required>
    <button type="submit">Validate Code</button>
</form>
@endsection
