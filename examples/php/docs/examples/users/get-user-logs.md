<?php

use Appwrite\Client;
use Appwrite\Services\Users;

$client = new Client();

$client
    ->setProject('')
;

$users = new Users($client);

$result = $users->getUserLogs('[USER_ID]');