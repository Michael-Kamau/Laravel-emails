@extends('layouts.base')

@section('content')
    <div class="h-screen">
        <div>
            <p>This is the main application that I am using for the website</p>

            <div class="flex space-x-2">
                <a class="shadow px-4 py-2 mx-1 hover:text-white hover:bg-blue-600 transition duration-300" href="{{route('ticket::mail-form')}}">Mail Form</a>
                <a class="shadow px-4 py-2 mx-1 hover:text-white hover:bg-blue-600 transition duration-300" href="{{route('ticket::all-mail')}}">All Emails</a>
            </div>

        </div>
    </div>

@endsection

