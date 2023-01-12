@extends('ticket::layouts.master')

@section('content')
    <div class="h-screen mt-16">
        <div class="w-full max-w-xs m-auto">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"  method="post" action="{{route('ticket::send-email')}}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" type="email" placeholder="example@gmail.com" name="email">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                        Content
                    </label>
                    <textarea
                        class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="message" name="message"></textarea>
                    <p class="text-green-500 text-xs italic">Please send the enquiry.</p>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Send
                    </button>
                </div>
            </form>
        </div>


@endsection
