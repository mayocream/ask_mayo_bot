<?php

namespace Bot;

use \Bot\Di;

class Commands {

	public function __construct() {
		$this->init();
	}

	private function init() {
		$command = Di::get('message_text');
		if ($command == '/help') {
			return $this->help();
		}
		if ($command == '/start') {
			return $this->help();
		}
		if ($command == '/user_id') {
			return $this->user_id();
		}
	}

	private function help() {
		$text = getenv('HELP_TEXT_TEMPLATE');
		$rendered_text = render($text, [
			'\n' => "\n",
			'[MASTER_NAME]' => getenv('MASTER_NAME'),
			'[CHANNAL_ID]' => getenv('CHANNAL_ID'),
			'"' => ''
		]);
		$data = [
			'chat_id' => Di::get('chat_id'),
			'text' => $rendered_text,
			'parse_mode' => 'HTML'
		];
		return Di::get('telegram')->sendMessage($data);
	}

	private function user_id() {
		$data = [
			'chat_id' => Di::get('chat_id'),
			'text' => Di::get('user_id')
		];
		return Di::get('telegram')->sendMessage($data);
	}


}