<?php
$access_token = 'DMBhWuIVZPWWW7Dr7Pg2XVraYCk3BrKp3+tT4P1+ne6GAZfc7VYIcMLgITFzU4zdDB2zcLC2Vfk7Gc/TFchL/ZHRO7y+eTs9cFwT870BueF9CKQJ6Kihei2hRwsH2Td0FZs0emwk6Dt/yiWYISwTFQdB04t89/1O/w1cDnyilFU=';

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
			$arr_nu = array("พี่เรียกนุเหรอคะ! \nหนูไปดีกว่า ไม่อยากคุยด้วย","นักบินประจำ Music BNK48 Square");
			$arr_slp = array("จะนอนแล้้วหรอ\nสิคยังไม่ง่วงเลยค่ะ","ฝันดีนะคะ","やすみなさい");
			$arr_back = array("เฬวสึสๆไปเลยค่ะ","ชื่อตะกวดหรอคะ~~~~","เรื่องหักหลัง ไว้ใจเค้าเลยค่ะ");
			$arr_kitty = array("ขนลุกเลยค่ะ~","นี่แคปชั่นหรือนี่~");
			$arr_ran = array("A.","Anato","BlacklotuZ","Cottplay","D_Sora*","EBL","FacePoker","GIFTGRW","help","ItzGunz","jaja_ttp","Jan Techinee","Juffsifly","KEDZANG","Knock Knock","Kuitoon","laplace","Larinnchanpp","mm","MMDC62","patbuster22","PeteZorDor","PnPBlu","Sabastian","Tina(ธิน่า)","Youwillbelieve","ふはま (Fuhama)","กรุบกรอบ20","คนฟิน 2018","ครอส(Cross) ","ต้นไม้ใบเลี้ยงเดี่ยว","นาฬิกาทราย","พี่ช่อ","สมัน","FeoNixFrost");
if (  (strpos($u_text , 'ดีจ้า')!== false)  ||  (strpos($u_text , 'สวัสดี')!== false)  ) {
				$text = "สวัสดีค่า";
			} elseif (strpos($u_text , '555')!== false) { 
				$text = "ขำอะไรกันอ่ะคะ สิคขำด้วยได้ป่าว >_<";
			} elseif (strpos($u_text , 'ถถถ')!== false) { 
				$text = "ขำอะไรกันอ่ะคะ สิคขำด้วยได้ป่าว >_<";
			} elseif (strpos($u_text , 'กวน')!== false) { 
				$text = "ทำไมต้องแกล้งสิคล่ะ โดยแย่!!!";
			} elseif (strpos($u_text , 'สิค')!== false) { 
				$text = "จ๋าาาาาาาาาาาา! \nอย่าเพิ่งกวนสิคสิ สิคจะทำงานนะทู้กโค้นนนนน";
			} elseif (strpos($u_text , 'นุ')!== false) { 
				$nu_int = array_rand($arr_nu);
				$text = $arr_nu[$nu_int];	
			} elseif (strpos($u_text , 'ฝันดี')!== false) { 
				//$ran_int = array_rand($arr_ran);
				$text = "ฝันดีค่ะ";
			} elseif (  (strpos($u_text , 'แมวผี')!== false)  ||  (strpos($u_text , 'คิตตี้')!== false) ||  (strpos($u_text , 'ป้าแมว')!== false)  ) {
				$ran_kitty = array_rand($arr_kitty);
				$text = $arr_kitty[$ran_kitty];
			} elseif (  (strpos($u_text , 'แบค')!== false)  ||  (strpos($u_text , 'อวาย่า')!== false)  ) {
				$ran_back = array_rand($arr_back);
				$text = $arr_back[$ran_back];
			} elseif (strpos($u_text , 'สุ่ม')!== false) { 
				//$ran_int = array_rand($arr_ran);
				//$text = "สิคว่านะ พี่ ".$arr_ran[$ran_int]." คนนี้แหละ เหมาะสมกับเข็มกลัดเราเลยแหละ";
			} elseif (strpos($u_text , 'ลุงหมี')!== false) { 
				//$ran_int = array_rand($arr_ran);
				$text = "น่ารัก";
			} elseif (strpos($u_text , 'ชิบะ')!== false) { 
				//$ran_int = array_rand($arr_ran);
				$text = "อีหมาแรด";
			} elseif (strpos($u_text , 'ต้น')!== false) { 
				//$ran_int = array_rand($arr_ran);
				$text = "ลิงจ๋อในป่าไผ่";
			} elseif (strpos($u_text , 'ยุ่ง')!== false) { 
				//$ran_int = array_rand($arr_ran);
				$text = "เสือกไรคะพี่?";
			} elseif (strpos($u_text , 'เฌอสิค')!== false) { 
				//$ran_int = array_rand($arr_ran);
				$text = "เรือหลวงของข้า";
			} else { 
				//$ofc_int = array_rand($arr_ofc);
				//$text = $arr_ofc[$ofc_int];
				
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
