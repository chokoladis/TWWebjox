<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Traits\Upload;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $name = $request->hasFile('name');
            $res = $this->UploadFile($request->file('file'), 'Posts', filename: $name);
            File::create([ $res ]);
            return redirect()->route('file.index')->with('success', 'File Uploaded Successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
}
