@extends('layouts.base')

@section('content')

    @forelse ($messages as $message)
        <div class="shadow mx-auto w-full p-4 my-4">
            <p>{{$message->getSubject()}}</p> <br><br>
            {!! $message->getHTMLBody() !!}
{{--            {!! $threads = $message->setFetchBodyOption(false)->thread($message->getFolder())[0]->getHTMLBody() !!}--}}
{{--            {!! $threads[0]->getHTMLBody() !!}--}}
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" action="{{url('ticket::reply-email')}}">
                @csrf
                <input type="hidden" id="messageId" name="messageId" value="{{$message->getMessageId()}}">
                <input type="hidden" id="references" name="references" value="{{$message->getReferences()}}">
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                        Reply
                    </label>
                    <textarea
                        class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="message" name="message"></textarea>
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
    @empty
        <p>No messages</p>
    @endforelse

@endsection

