<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Announcements;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $counterAnnouncement = Announcements::all() -> count();

        $counterActiveAnnouncement = Announcements::where(['is_deleted' => 0,'status' => 1]) -> count();
        $counterInActiveAnnouncement = Announcements::where(['is_deleted' => 0,'status' => 0]) -> count();

        return view('student.index',compact('counterAnnouncement','counterActiveAnnouncement','counterInActiveAnnouncement'));
    }
}
