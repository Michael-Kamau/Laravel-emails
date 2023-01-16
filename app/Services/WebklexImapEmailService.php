<?php

namespace App\Services;



class WebklexImapEmailService
{


    public $client = null;

    public function __construct(){

        $this->client =  \Webklex\IMAP\Facades\Client::account('default');

        //Connect to the IMAP Server
        $this->client->connect();

    }


    public function allEmails(): object
    {

        //Get all Mailboxes
        /** @var \Webklex\IMAP\Support\FolderCollection $aFolder */

        $aFolder = $this->client->getFolder('[Gmail]/All Mail');


        $aMessage = $aFolder->query()->setFetchOrderAsc()->since('06.12.2022')->text('Fresh')->get();

        // <span style="font-family : 'century-gothic';">


        return $aMessage;

    }


}
