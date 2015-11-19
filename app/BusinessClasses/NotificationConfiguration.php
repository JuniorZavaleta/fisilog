<?php
namespace FisiLog\BusinessClasses;
use FisiLog\Services\Notificator;

class NotificationConfiguration {
	private $notificator;

	public function setStrategyNotification(Notificator $strategyNotification) {
		$this->notificator = $strategyNotification;
	}

	public function executeStrategyNotification($message, $subject, $to) {
		$this->notificator->notify($message, $subject, $to);
	}
}