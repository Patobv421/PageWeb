@extends('layouts.app') 
<!-- O el layout que uses, en caso de no usar layout, quita @extends y @section -->

@section('content')
<h1>Recover Password - Step 1</h1>

<!-- Muestra errores (si los hay) -->
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

<form action="{{ route('recovery.email.send') }}" method="POST">
    @csrf
    <label for="email">Enter your Email:</label>
    <input type="email" name="email" required>
    <button type="submit">Send Code</button>
</form>
@endsection
