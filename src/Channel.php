<?php
namespace Basis\Objects;
use Closure;
use RuntimeException;

class ChannelException extends RuntimeException {};

class Channel {
	private $type;
	private $messages = array();
	private $receive_handlers;

	public function __construct($type) {
		$this->type = $type;
	}

	/**
	 * Write message $message into the channel
	 * @param $message a message object whose type matches $this->type
	 * @throws ChannelException when the message is not of type $this->type
	 */
	public function send($message) {
		if(gettype($message) != $this->type && !is_a($message, $this->type)) {
			throw new ChannelException(sprintf('Tried to push message of type "%s" onto channel of type "%s"', get_class($message) ?: gettype($message), $this->type));
		}

		if($this->receive_handlers) {
			$this->callReceiveHandlers($message);

		} else {
			$this->messages[] = $message;
		}
	}

	/**
	 * Register a receive handler which will be called when a new message is added to the channel
	 * @param Closure $fn a receive handler which will be called with any new message
	 */
	public function receive(Closure $fn) {
		$this->receive_handlers[] = $fn;

		if($this->messages) {
			foreach($this->messages as $message) {
				$this->callReceiveHandlers($message);
			}

			$this->messages = array();
		}
	}

	private function callReceiveHandlers($data) {
		foreach($this->receive_handlers as $fn) {
			$fn($data);
		}
	}
	
};
