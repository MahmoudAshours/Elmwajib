<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function alert($type, $action)
    {
        $action = ucfirst($action);
        $message = __("Successfully $action");
        if ($type === 'error') {
            $message = __('There is error Happened !');
        }
        alert()->{$type}($message);
    }
}
