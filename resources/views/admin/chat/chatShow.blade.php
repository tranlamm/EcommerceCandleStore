@extends('layouts.admin.admin_layout')

@section('content')
    <div id="chatAdmin" class="h-100">
        <chat-wrapper></chat-wrapper>
    </div>

    <script src="http://localhost:6001/socket.io/socket.io.js"></script>
@endsection

