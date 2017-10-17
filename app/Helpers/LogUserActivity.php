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
		$log['url'] = Request::url();
		$log['method'] = Request::method();
		$log['ip'] = Request::ip();
		$log['agent'] = Request::header('user-agent');
		$log['user_name'] = auth()->check() ? auth()->user()->username : Auth::user()->username;
		LogUserActivityModel::create($log);
 	}

 	public static function logUserActivityLists()
 	{
 		return LogUserActivityModel::latest()->paginate(10);
 	}
}
