<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Subjects;
use App\ManageContent;
use App\User;

class ManageContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function managenontent()
    {
        $subjects = Subjects::all();
        $ManageContent = ManageContent::all();
        $User = User::all();
            return view('adds.manageContent', compact('User','subjects','ManageContent'));
    }

    public function addnewmanagenontent(Request $request)
    {
        $User = User::all();
            $subject = new Subjects();
            $ManageContent = new  ManageContent();
    
            $ManageContent->title = $request->input('newstitle'); 
            request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);
            $image = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move('images', $image);
            $Image= '/images/'.$image;
            $ManageContents = $request->input('text');
            libxml_use_internal_errors(true);
            $dom = new \DomDocument();
            $dom->loadHtml($ManageContents, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');
            foreach($images as $k => $img){
                $data = $img->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name= time().$k.'.png';
                Storage::disk('public')->put($image_name, $data);
                $image_name= '/images/'.$image_name;
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
    
            }
            $ManageContents = $dom->saveHTML();
            $ManageContent->news = $request->input('text');
            $ManageContent->image = $Image;
            $ManageContent->views = $request->input('views');
            $ManageContent->subjectidfk	= $request->input('subject');
            $ManageContent->save();
    
            return redirect()->back()->with('success', 'Manage Content Added successfully');   
    }

    public function deletemanagenontent(Request $request)
    {
        ManageContent::find($request->get('id'))->delete();
        return redirect()->back()->with('error', 'Manage Content deleted successfully');
    }

    public function editmanagenontent(Request $request)
    {
        $ManageContent = ManageContent::find($request->get('id'));
        $Subjects = Subjects::all();
        $User = User::all();
            return view('adds.editmanageContent', compact('Subjects','ManageContent'));
    }   

    public function submiteditmanagenontent(Request $request)
    {
        $User = User::all();
        $ManageContent = ManageContent::find($request->get('id'));
        $subject = Subjects::all();

        $ManageContent->title = $request->input('newstitle'); 
        if(isset(request()->image)){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move('images', $imageName);
            $Image= '/images/'.$imageName;
            
            $ManageContent->image = $Image;
        }
        request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        $ManageContents = $request->input('text');
        libxml_use_internal_errors(true);
        $dom = new \DomDocument();
        $dom->loadHtml($ManageContents, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= time().$k.'.png';
            Storage::disk('public')->put($image_name, $data);
            $image_name= '/images/'.$image_name;
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);

        }
        $ManageContent->news = $request->input('text');
        $ManageContent->subjectidfk	= $request->input('subject');
        $ManageContents = $dom->saveHTML();
        $ManageContent->save();
        

        $subjects = Subjects::all();
        $ManageContent = ManageContent::all();
        $User = User::all();
        $success = 'Manage Content edit successfully';
        return view('adds.manageContent', compact('User','subjects','ManageContent', 'success'));
    }

}
