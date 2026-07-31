<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Category;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(6);
        return view('announcements.index', compact('announcements'));
    }


    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }

    public function byCategory(Category $category)
    {

        return view('announcements.byCategory', [ 'announcements' => $category->announcements(), 'category' => $category]);
    }

    public function create()
{
    return view('announcements.create');
}
}
