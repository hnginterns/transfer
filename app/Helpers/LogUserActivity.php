<?php

namespace App\Helpers;

use Request;
use App\LogUserActivity as LogUserActivityModel;

class LogUserActivity
{

	public static function addToLog($subject)
	{
		$log = [];
		$log['subject'] = $subject;
		$log['url'] = Request::fullUrl();
		$log['method'] = Request::method();
		$log['ip'] = Request::ip();
		$log['os'] = BrowserDetect::osName();
	}
}