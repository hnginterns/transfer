<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function formatMessages($arr, $type)
    {
        $msg = array(
            'error' => '<div class="alert alert-danger" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>',
            'success' => '<div class="alert alert-success" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <span class="glyphicon glyphicon-exclamation-ok" aria-hidden="true"></span>
                    <span class="sr-only">Success:</span>',
            'warning' => '<div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Warning:</span>',
        );
        $ret = $msg[$type];

        //$arr = !empty($arr['messages']) ? $arr['messages'] : $arr;

        if (!empty($arr) && is_array($arr)) {
            foreach ($arr as $value) {
                if (is_array($value)) {
                    foreach ($value as $v) {
                        $ret .= '<span>' . $v . '</span> <br>';
                    }
                } else {
                    $ret .= '<span>' . $value . '</span>';
                }
            }
        } elseif (is_string($arr)) {
            $ret .= '<span>' . $arr . '<span>';
        } else {
            return 'Invalid Argument';
        }
        return $ret . '</div>';
    }
}
