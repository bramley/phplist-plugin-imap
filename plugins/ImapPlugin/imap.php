<?php

define('CL_EXPUNGE', 1);

function imap_open($mailbox, $user, $password, $options = 0)
{
    require 'Net/POP3.php';

    global $imap_last_error;

    preg_match('/{(.+):(\d+).*?}/', $mailbox, $matches);
    $server = $matches[1];
    $port = $matches[2];
    $pop3 = new Net_POP3();

    if (!$pop3->connect($server, $port)) {
        $imap_last_error = "Unable to connect to $server:$port";

        return false;
    }

    if (PEAR::isError($ret = $pop3->login($user, $password, 'USER'))) {
        $imap_last_error = $ret->getMessage();

        return false;
    }

    return $pop3;
}

function imap_qprint($string)
{
    return quoted_printable_decode($string);
}

function imap_base64($string)
{
    return base64_decode($string);
}

function imap_headerinfo($pop3, $messageNumber)
{
    $headers = (object) $pop3->getParsedHeaders($messageNumber);

    if (!isset($headers->date) && isset($headers->Date)) {
        $headers->date = $headers->Date;
    }

    return $headers;
}

function imap_body($pop3, $messageNumber)
{
    return $pop3->getBody($messageNumber);
}

function imap_fetchheader($pop3, $messageNumber)
{
    return $pop3->getRawHeaders($messageNumber);
}

function imap_delete($pop3, $messageNumber)
{
    return $pop3->deleteMsg($messageNumber);
}

function imap_close($pop3)
{
    return $pop3->disconnect();
}

function imap_num_msg($pop3)
{
    return $pop3->numMsg();
}

function imap_last_error()
{
    global $imap_last_error;

    return $imap_last_error;
}
