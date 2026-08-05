<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Mail;
use App\Mail\BecomeRevisor;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }

    public function accept(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', "Hai accettato l'articolo $announcement->title");
    }

    public function reject(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()->back()->with('message', "Hai rifiutato l'articolo $announcement->title");
    }


public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('home')->with('message', 'Complimenti, hai richiesto di diventare revisore.');
    }

    public function makeRevisor(User $user)
    {
      Artisan::call('app:make-user-revisor', ["email" => $user->email]);
      return redirect()->back();
    }

}
