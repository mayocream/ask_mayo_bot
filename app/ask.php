<?php 

namespace Bot;

use \Bot\Di;

class Ask {

	public function __construct() {
		$this->ask();
	}

	private function ask() {
		$message = trim(Di::get('message_text'));
		$data = [
			'chat_id' => getenv('MASTER_USER_ID'),
			'text' => getenv('ASK_TEXT_PREFIX') . "\n" . $message,
			'parse_mode' => 'HTML'
		];
		$return = Di::get('telegram')->sendMessage($data);
		$sent_message_id = $return['result']['message_id'];
		// Storage
		// sent_message_id --- user_id.message_id
		$hash = Di::get('user_id') . '.' . Di::get('message_id');
		Di::get('cache')->set((string)$sent_message_id, $hash);
	}
}