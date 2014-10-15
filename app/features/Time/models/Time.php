<?php

namespace app\features\Time\models;
use Morrow\Debug;
use Morrow\Factory;

class Time extends Factory {
	public function get() {
		// Returns the current time in milliseconds
		return (new \DateTime)->getTimestamp()*1000;
	}
}
