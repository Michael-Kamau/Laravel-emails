<?php

use Illuminate\Support\Facades\Route;

//use Webklex\IMAP\Client;

$client = \Webklex\IMAP\Facades\Client::make([
    'host'          => env('IMAP_HOST'),
    'port'          => env('imap_port'),
    'encryption'    => env('IMAP_ENCRYPTION'),
    'validate_cert' => true,
    'username'      => env('IMAP_USERNAME'),
    'password'      => env('IMAP_PASSWORD'),
    'protocol'      => env('IMAP_PROTOCOL')
]);

//Connect to the IMAP Server
$client->connect();
//Get all Mailboxes
/** @var \Webklex\IMAP\Support\FolderCollection $aFolder */
$aFolder = $client->getFolders();
//$aFolder = $client->getFolder('STARRED');

foreach($aFolder as $oFolder){
    //Get all Messages of the current Mailbox $oFolder
    /** @var \Webklex\IMAP\Support\MessageCollection $aMessage */
//    $aMessage = $oFolder->messages()->all()->get();
    $aMessage = $oFolder->query()->since('01.01.2023')->get();
//    $aMessage = $oFolder->query()->from('noreply@example.com')->get();

    /** @var \Webklex\IMAP\Message $oMessage */
    foreach($aMessage as $oMessage){
//        dump($oMessage);
        echo $oMessage->getSubject().'<br />';
//        echo 'Attachments: '.$oMessage->getAttachments()->count().'<br />';
        echo $oMessage->getHTMLBody(true);
    }
}

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {




    return view('welcome');
});
