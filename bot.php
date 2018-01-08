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
			$arr_sax = array("แซกเครียดอะไร บ่นมาได้เลยน้า\nสิคจะนั่งฟังอยู่ข้างๆแซกเองน้าา","พี่ไปเรียกแซกทำไมอ่ะคะ มีคนเล่าให้ฟังว่าเค้าเป็นเด็กเลวระยำ\nสิครับไม่ได้อ่ะค่ะ", "ทำไมพี่แซคต้องหยาบคายกับสิคด้วยอ่ะคะ\nเฬวมากค่ะ", "");
			$arr_ofc = array("พี่พิมพ์อะไรมาอ่ะคะ??\nสิครู้จักแค่ไม่กี่คำเอง เช่น สวัสดี 555 ถถถ สิค ดีจ้า เข้ากลุ่ม แย่ กวน นอน ฝันดี\n\nสิคต่อเรือก็ได้นะ อิอิ", "สิคงงอ่ะค่ะ\nพี่พูดภาษาคนได้มั้ยคะ", "พูดไม่รู้เรื่องแบบนี้ สิคจะไม่คุยด้วยแล้วนะคะ", ".....");
			$arr_slp = array("จะนอนแล้้วหรอ\nสิคยังไม่ง่วงเลยค่ะ","ฝันดีนะคะ","やすみなさい");
			$arr_ran = array("A.","Anato","BlacklotuZ","Cottplay","D_Sora*","EBL","FacePoker","GIFTGRW","help","ItzGunz","jaja_ttp","Jan Techinee","Juffsifly","KEDZANG","Knock Knock","Kuitoon","laplace","Larinnchanpp","mm","MMDC62","patbuster22","PeteZorDor","PnPBlu","Sabastian","Tina(ธิน่า)","Youwillbelieve","ふはま (Fuhama)","กรุบกรอบ20","คนฟิน 2018","ครอส(Cross) ","ต้นไม้ใบเลี้ยงเดี่ยว","นาฬิกาทราย","พี่ช่อ","สมัน","🐺FeoNixFrost🐺");
if (  (strpos($u_text , 'ดีจ้า')!== false)  ||  (strpos($u_text , 'สวัสดี')!== false)  ) {
				$text = "สวัสดีค่า มิวสิค BNK48 ค่า";
			} elseif (strpos($u_text , '555')!== false) { 
				$text = "ขำอะไรกันอ่ะคะ สิคขำด้วยได้ป่าว >_<";
			} elseif (strpos($u_text , 'ถถถ')!== false) { 
				$text = "ขำอะไรกันอ่ะคะ สิคขำด้วยได้ป่าว >_<";
			} elseif (strpos($u_text , 'กวน')!== false) { 
				$text = "ทำไมต้องแกล้งสิคล่ะ โดยแย่!!!";
			} elseif (strpos($u_text , 'สิค')!== false) { 
				$text = "จ๋าาาาาาาาาาาา! \n อย่าเพิ่งกวนสิคสิ สิคจะทำงานนะทู้กโค้นนนนน";
			} elseif (strpos($u_text , 'สุ่ม')!== false) { 
				$ran_int = array_rand($arr_ran);
				$text = "สิคว่านะ พี่".$arr_ran[$ran_int]."คนนี้แหละ เหมาะสมกับเข็มกลัดเราเลยแหละ";
			} else { 
				$ofc_int = array_rand($arr_ofc);
				$text = $arr_ofc[$ofc_int];
				
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
