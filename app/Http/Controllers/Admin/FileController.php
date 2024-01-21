<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;

class FileController extends Controller
{
    static $mainDir = '/storage/';
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

    public function store($request,$nameFile)
    {
        if ($request->hasFile($nameFile)) {
            $file = $request->file($nameFile);
            $res = $this->UploadFile($file, 'Posts');
            if (!empty($res) && !isset($res['f_oldFile'])){
                return File::create($res);
            } else {
                return File::query()->where(['name' => $res['name']])->get();
            }
        }
    }

    public function UploadFile(UploadedFile $file, string $folder, $filename = ''){
        $root = public_path() . self::$mainDir;
        $destinationPath = $folder.'/';
        if (!is_dir($root.$destinationPath))
            mkdir($root.$destinationPath, 0755);

        $hashName = md5(mb_substr($file->getClientOriginalName(),0,6).auth()->user()->id);
        $fileName = date('dmYH') . "_". $hashName .".". $file->getClientOriginalExtension();
        
        // dd($root.$destinationPath.$fileName);
        if (!file_exists($root.$destinationPath.$fileName)){
            if ($file->move($root.$destinationPath, $fileName)){
                return ['name' => $fileName, 'path' => $destinationPath.$fileName];
            } else {
                return [];
            }
        }
        
        return ['name' => $fileName, 'path' => $destinationPath.$fileName, 'f_oldFile' => true];
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
