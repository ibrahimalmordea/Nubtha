<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Subjects;
use App\User;

class subjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //get all subject in table
    public function subject()
    {
        $subject = Subjects::all();
        $User = User::all();
        if (Auth::user()->type == '1')
        {
            return view('adds.subject', compact('subject'));
        }else
        {
            return view('home');
        }
    }

    //add new subject
    public function addnewsubject(Request $request)
    {
        $User = User::all();
        if (Auth::user()->type == '1')
        {
        $subject = new Subjects();
        $subject->name = $request->input('subject'); 
        request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $image = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move('images', $image);
        $Image= '/images/'.$image;
        $subject->image = $Image;
        $subject->save();

        return redirect()->back()->with('success', 'subject Added successfully');    
        }else
        {
            return view('home');
        }
        
    }

    //delete the subject
    public function deletesubject(Request $request)
    {
        Subjects::find($request->get('id'))->delete();
        return redirect()->back()->with('error', 'subject deleted successfully');
    }

    //open edit page and get the data
    public function editsubject(Request $request)
    {
        $subject = Subjects::find($request->get('id'));
        $User = User::all();
            return view('adds.editsubject', compact('subject'));
    }   

    //function for save the edit
    public function submiteditsubject(Request $request)
    {
        $User = User::all();

            $subject = Subjects::find($request->get('id'));
            $subject->name = $request->input('subject');
            if(isset(request()->image)){
            request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);
            $image = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move('images', $image);
            $Image= '/images/'.$image;
            $subject->image = $Image;
            }
            $subject->save();
    
            return redirect('subject')->with('success', 'Category edit successfully');
    }
}
