<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Subjects;
use App\Comments;
use App\User;
use App\ManageContent;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $subject = Subjects::orderBy('name', 'ASC')->limit(5)->get();
        $ManageContent = array();
        $ManageContent4 = ManageContent::all();
        $ManageContent2 = ManageContent::orderBy('created_at', 'desc')->limit(5)->get();
        $ManageContent3 = ManageContent::orderBy('views', 'desc')->limit(5)->get();
        return view('home',compact('ManageContent3','ManageContent2','ManageContent','subject','ManageContent4'));
    }

    public function importantnews(Request $request)
    {
        $ManageContent3 = ManageContent::orderBy('views', 'desc')->get();
        return view('importantnews',compact('ManageContent3'));
    }

    public function latestnews(Request $request)
    {
        $ManageContent2 = ManageContent::orderBy('created_at', 'desc')->get();
        return view('latestnews',compact('ManageContent2'));
    }

    public function search(Request $request)
    {
        $ManageContent = ManageContent::where('title', 'LIKE', '%'. $request->get('q') . '%')->limit(6)->get();
        return $ManageContent;
    }

    public function newsdetails(Request $request)
    {
        $subject = Subjects::all();
        $ManageContentget = ManageContent::where('id', '!=', $request->get('id'))->limit(4)->get();
        $comments = Comments::where('ManageContentidfk',$request->get('id'))->get();
        foreach($comments as $comment){
            $user = User::find($comment->useridfk);
            $comment->username = $user->name;
        }
        $ManageContent = ManageContent::find($request->get('id'));
        $ManageContent3 = ManageContent::find($request->get('id'));
        $ManageContent3->views = (int) $ManageContent->views + 1;
        $ManageContent3->save();

        return view('adds.newsdetails',compact('ManageContent','subject','comments','ManageContentget'));
    }

    public function NewsDetailsOne(Request $request)
    {
        $subject = Subjects::all();
        $ManageContent2 = ManageContent::where('subjectidfk', $request->get('id'))->get();

        return view('adds.newsdetailsOne',compact('ManageContent2','subject'));
    }

    public function newcomment(Request $request)
    {
        $comment = new Comments();
        $comment->comment =$request->get("comment");
        $comment->ManageContentidfk =$request->get("ManageContentidfk");
        $comment->useridfk = Auth::User()->id;
        $comment->save();
        return redirect()->back()->with('');

    }
}
