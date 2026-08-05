<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Category;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(10);
        return view('announcements.index', compact('announcements'));
    }


    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }

    public function byCategory(Category $category)
    {

        $announcements = $category->announcements->where('is_accepted', true);
        return view('announcements.byCategory', compact('announcements', 'category'));

    }

    public function create()
{
    return view('announcements.create');
}
}
