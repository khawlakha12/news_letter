<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Update; 

class UploadController extends Controller
{
    public function store(Request $request)
    {
     
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'file' => 'nullable|file',
        ]);


        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
        }


        Update::create([
            'title' => $request->title,
            'text' => $request->text,
            'file_path' => $filePath,
           
        ]);


        return redirect()->back()->with('success', 'Upload successful!');
    }
    public function index()
    {
        $newsItems = Update::latest()->get(); 
        dd($newsItems); 
        return view('admin', compact('newsItems'));
    }
}
