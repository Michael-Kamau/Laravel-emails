<?php

namespace App\Http\Controllers;

use App\Mail\ReplyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

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





        return view('emails.emails')->with('messages', $aMessage ?? null)->with('threads', $threads??null);


    }


    public function sendEmail(Request $request)
    {


        Mail::to('kamau.karitu@gmail.com')->cc('michaelkaritu254@gmail.com')->send(new ReplyEmail($request->input()));

        return redirect('/');

    }


    public function replyEmail(Request $request)
    {

        $payload = $request->input();

        $payload['references'] = $payload['references'] . ' <' . $payload['messageId'] . '>';


        Mail::to('kamau.karitu@gmail.com')->send(new ReplyEmail($payload));

        return redirect('/emails');

    }
}
