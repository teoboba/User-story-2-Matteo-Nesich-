<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;


class PublicController extends Controller
{
    public function welcome()
    {
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
        return view('home', compact('announcements'));
    }

public function searchAnnouncements(Request $request)
    {
        $query = $request->input('query');
        $announcements = Announcement::search($query)->where('is_accepted', true)->paginate(10);

        return view('announcements.searched', ['announcements' => $announcements, 'query' => $query]);
    }


}
