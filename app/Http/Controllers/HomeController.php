<?php

namespace App\Http\Controllers;

use App\Mail\ReplyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
//    public function emails()
//    {
//        //use Webklex\IMAP\Client;
//
////        $client = \Webklex\IMAP\Facades\Client::make([
////            'host' => env('IMAP_HOST'),
////            'port' => env('imap_port'),
////            'encryption' => env('IMAP_ENCRYPTION'),
////            'validate_cert' => true,
////            'username' => env('IMAP_USERNAME'),
////            'password' => env('IMAP_PASSWORD'),
////            'protocol' => env('IMAP_PROTOCOL')
////        ]);
//
//        $client = \Webklex\IMAP\Facades\Client::account('default');
//        $aMessage =[];
//
//
////Connect to the IMAP Server
//        $client->connect();
////Get all Mailboxes
//        /** @var \Webklex\IMAP\Support\FolderCollection $aFolder */
//        $aFolder = $client->getFolders();
////$aFolder = $client->getFolder('[Gmail]/Sent Mail');
//
//        dd( $aFolder);
//
//        $count = 0;
//
//        foreach ($aFolder as $oFolder) {
//            $count++;
//
//            //Get all Messages of the current Mailbox $oFolder
//            /** @var \Webklex\IMAP\Support\MessageCollection $aMessage */
////    $aMessage = $oFolder->messages()->all()->get();
//            $aMessage = $oFolder->query()->since('06.12.2022')->text('Introduction Email')->get();
//            error_log(json_encode('And here is the message from the user'.$count));
//
////    $aMessage = $oFolder->query()->from('noreply@example.com')->get();
//
//
//            $threads = [];
//
//
//            /** @var \Webklex\IMAP\Message $oMessage */
////            foreach ($aMessage as $oMessage) {
////                dump($oMessage->getInReplyTo());
////                dump($oMessage->setFetchBodyOption(false)->thread($oMessage->getFolder()));
////                $threads = $oMessage->setFetchBodyOption(false)->thread($oMessage->getFolder());
////        dump($oMessage);
////                echo $oMessage->getSubject() . '<br />';
////        echo 'Attachments: '.$oMessage->getAttachments()->count().'<br />';
////                dump($oMessage->getTextBody(true));
////            }
//            return view('emails.emails')->with('messages',$aMessage ?? null)->with('threads',$threads);
//        }
//
//
//
//    }


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
