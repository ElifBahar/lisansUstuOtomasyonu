<?php

namespace App\Http\Controllers\admin\announcements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListAnnouncementsController extends Controller
{
    function ListAnnouncementsController(){
        return view('admin.appeals.list-announcement');
    }
}
