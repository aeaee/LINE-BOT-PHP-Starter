<?php
$access_token = '75lU9HCgLuxnMrdB9TC53Oh2I8HpUGCVjmD9UTbRg9wiYlakPm8QtphmYz7wiMGaDB2zcLC2Vfk7Gc/TFchL/ZHRO7y+eTs9cFwT870BueGnMX/CcH7BYqWHIhHRpp0rEYh73TyZfOAtF1e7flnR5wdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$u_text = $event['message']['text'];
			if (  (strpos($u_text , 'ดีจ้า')!== false)  ||  (strpos($u_text , 'สวัสดี')!== false)  ) {
				$text = "สวัสดีค่า มิวสิค BNK48 ค่า";
			} elseif(  (strpos($u_text , 'แซก')!== false) || (strpos($u_text , 'เลว')!== false) || (strpos($u_text , 'เฬว')!== false)  ) { 
				$text = "พี่ไปเรียกแซกทำไมอ่ะคะ มีคนเล่าให้ฟังว่าเค้าเป็นเด็กเลวระยำ\nสิครับไม่ได้อ่ะค่ะ";
			} elseif( (strpos($u_text , 'รัก')!== false) || (strpos($u_text , 'รักน้า')!== false) || (strpos($u_text , 'รักสิค')!== false) ) { 
				$text = "รักสิคจริงเหรอคะ <3";
			} elseif (strpos($u_text , 'ไม่ยุ่ง')!== false) { 
				$text = "สิคไม่ยุ่งก็ได้ค่ะ เชอะ!!!";
			} elseif (strpos($u_text , 'สิค')!== false) { 
				$text = "จ๋าาาาาาาาาาาา!";
			} elseif (strpos($u_text , 'เข้ากลุ่ม')!== false) {  
				$text = "จริงหรอ.... จะเข้ากลุ่มจริงหรอ....\nตามได้ในเพจ Music BNK48 Fanclub เลน้าาาาา";
			} elseif (strpos($u_text , 'แย่')!== false) { 
				$text = "ไม่น่ารักเลยนะคะ!";
			} elseif (strpos($u_text , '555')!== false) { 
				$text = "ขำอะไรกันอ่ะคะ สิคขำด้วยได้ป่าว >_<";
			} elseif(  (strpos($u_text , 'นอน')!== false) || (strpos($u_text , 'ฝันดี')!== false) || (strpos($u_text , 'ราตรีสวัสดิ์')!== false)  ) { 
				$text = "ฝันดีนะคะ\nเจอสิคในฝันกันนะคะ";
			} elseif (strpos($u_text , 'ถถถ')!== false) { 
				$text = "ขำอะไรกันอ่ะคะ สิคขำด้วยได้ป่าว >_<";
			} elseif (strpos($u_text , 'กวน')!== false) { 
				$text = "ทำไมต้องแกล้งสิคล่ะ โดยแย่!!!";
			} else { 
				$text = "พี่พิมพ์อะไรมาอ่ะคะ??\nสิครู้จักแค่ไม่กี่คำเอง เช่น สวัสดี 555 ถถถ สิค ดีจ้า เข้ากลุ่ม แย่ กวน นอน ฝันดี";
			}
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";

		}
	}
}
echo "OK";
