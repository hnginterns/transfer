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
		$log['agent'] = Request::server('HTTP_USER_AGENT');
		$log['user_id'] = auth()->check() ? auth()->user()->id : 1;
		LogUserActivityModel::create($log);

	}

	public static function logUserActivityLists()
	{
		return LogUserActivityModel::latest()->get();
	}
	
}