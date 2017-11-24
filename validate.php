<?php
$access_token = 'ePMnJ2dLRW+V7B89BApL5lhnM0iDPGu/AudJE/CL91drkIzqiR17mrnNjzlEE12pDB2zcLC2Vfk7Gc/TFchL/ZHRO7y+eTs9cFwT870BueFl+dIzGX2cBhnwCe6v1ohdsnL5kaz4InQmP8fSc9gzpAdB04t89/1O/w1cDnyilFU=
';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
