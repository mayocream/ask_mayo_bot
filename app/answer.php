<?php

namespace Bot;

use \Bot\Di;

class Answer {

	public function __construct()
	{
		$this->answer();
	}

	private function answer() {
		$ask_message = Di::get('update')['message']['reply_to_message']['text'];
		$this->reply();
		if (!preg_match('/#private/', $ask_message)) {
			$this->forward();
		}
	}

	private function reply() {
		$ask_message = Di::get('update')['message']['reply_to_message']['text'];
		$ask_message_id = Di::get('update')['message']['reply_to_message']['message_id'];
		$hash = Di::get('cache')->get((string)$ask_message_id);
		if ($hash === null) {
			$data = [
				'chat_id' => getenv('MASTER_USER_ID'),
				'text' => '<b><i>The owner of question will NOT be notified since the storaged data is missing.</i></b>',
				'parse_mode' => 'HTML',
				'reply_to_message_id' => Di::get('message_id')
			];
			return Di::get('telegram')->sendMessage($data);
		}
		$hash = explode('.', $hash);
		$user_id = $hash[0];
		$user_ask_message_id = $hash[1];
		$text = getenv('REPLY_TEXT_TEMPLATE');
		$rendered_text = render($text, [
			'\n' => "\n",
			'[MASTER_NAME]' => str_replace('"', '', getenv('MASTER_NAME')),
			'[TEXT]' => trim(Di::get('message_text')),
		]);
		$data = [
			'chat_id' => $user_id,
			'text' => $rendered_text,
			'parse_mode' => 'HTML',
			'reply_to_message_id' => $user_ask_message_id
		];
		return Di::get('telegram')->sendMessage($data);
	}

	private function forward() {
		$ask_message = Di::get('update')['message']['reply_to_message']['text'];
		$ask_message = explode("\n", $ask_message);
		$i = 1;
		$message = '';
		foreach ($ask_message as $paragraph) {
			if ($i !== 1) {	
				$message .= "\n" . $paragraph;
			}
			$i ++;
		}
		$text = getenv('FORWARD_TO_CHANNAL_TEXT_TEMPLATE');
		$rendered_text = render($text, [
			'\n' => "\n",
			'[ASK_TEXT]' => getenv('ASK_TEXT_PREFIX') . $message,
			'[REPLY]' => trim(Di::get('message_text'))
		]);
		$data = [
			'chat_id' => getenv('CHANNAL_ID'),
			'text' => $rendered_text,
			'parse_mode' => 'HTML'
		];
		return Di::get('telegram')->sendMessage($data);
	}

}