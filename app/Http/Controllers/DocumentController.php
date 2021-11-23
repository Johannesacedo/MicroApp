<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $file=Document::all();
        return view('Files.index',compact('file'));
    }

    
    public function create()
    {
        return view('Files.upload');
    }

    
    public function store(Request $request)
    {
        $data=new Document;
        if($request->file('file')){
            $file=$request->file('file');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('storage/', $filename);

            $data->file = $filename;
        }

        $data->title = $request->title;
        $data->description=$request->description;
        $data->user_id=Auth::user()->id;
        $data->save();

        return redirect()->route('files.index')->with('success','File Uploaded successfully !');
    }

   
       public function show($id)
       {
          $data=Document::find($id);
          return view('Files.view',compact('data'));
      }

    
    public function edit($id)
    {
        //
    }

    public function download($file)
    {
        return response()->download('storage/'.$file);
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
