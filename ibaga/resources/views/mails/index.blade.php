@extends('layouts.app')

@section('actions')
    {{-- <a href="{{ route('post.create') }}" class="btn btn-sm btn-outline-primary my-auto mx-3">
        New post
    </a> --}}
@endsection

@section('content')
    @foreach ($data["mails"] as $email)
        <div>
        <p> {{ $email->from }}</p>
        <p> {{ $email->to }}</p>
        <p> {{ $email->from_email }}</p>
        <p> {{ $email->to_email }}</p>
        <p> {{ $email->text }}</p>
        <p> {{ $email->subject }}</p>
        <p> {!! $email->html !!}</p>
        @foreach ($email->attachments as $att)
            <pre>

                <p> {{ $att["name"] }}</p>
                <p> {{ $att["path"] }}</p>
            </pre>

        @endforeach
        </div>
        <hr>
    @endforeach


  
@endsection