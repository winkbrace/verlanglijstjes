<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MailController extends Controller
{
    /**
     * Because the shared host doesn't support command line cron jobs
     * we have to use this workaround;
     */
    public function reminder()
    {
        return Artisan::call('remind:to-update-list');
    }
}
