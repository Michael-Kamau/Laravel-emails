<?php

namespace Modules\Ticket\Http\Controllers;

use App\Mail\ReplyEmail;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('ticket::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('ticket::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('ticket::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('ticket::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function emails()
    {

        $client = \Webklex\IMAP\Facades\Client::account('default');


//Connect to the IMAP Server
        $client->connect();
//Get all Mailboxes
        /** @var \Webklex\IMAP\Support\FolderCollection $aFolder */
//        $aFolder = $client->getFolders();
        $aFolder = $client->getFolder('[Gmail]/All Mail');

//        dd($aFolder);

//        foreach ($aFolder as $oFolder)
//        {
//
//        }


        $aMessage = $aFolder->query()->setFetchOrderAsc()->since('06.12.2022')->text('Fresh')->get();

//        dd($aMessage->toArray());
//        error_log(gettype($aMessage));





        return view('ticket::emails.emails')->with('messages', $aMessage ?? null)->with('threads', $threads??null);


    }


    public function sendEmail(Request $request)
    {


        Mail::to('kamau.karitu@gmail.com')->cc('michaelkaritu254@gmail.com')->send(new ReplyEmail($request->input()));

        return redirect('/ticket');

    }


    public function replyEmail(Request $request)
    {

        $payload = $request->input();

        $payload['references'] = $payload['references'] . ' <' . $payload['messageId'] . '>';


        Mail::to('kamau.karitu@gmail.com')->send(new ReplyEmail($payload));

        return redirect('/emails');

    }
}