<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Illuminate\Validation\ValidationException;

class TestController extends Controller
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function tmpUpload(Request $request) {    

        $validator = Validator::make($request->all(), [
            'document' => 'required|mimes:png,pdf,doc,docx,zip,rar,jpeg,jpg|max:5048',
        ]);
    
        if ($validator->fails()) {
            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $file->storeAs('vaqtincha/tmp', $file->getClientOriginalName());
                Storage::delete(storage_path('app/vaqtincha/tmp/' . $file->getClientOriginalName()));
            }
    
            throw new ValidationException($validator);
        }
    
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = $file->getClientOriginalName();
            $folder = uniqid('vaqtincha', true);
            $file->storeAs('vaqtincha/tmp/' . $folder, $filename);
            TemporaryFile::create([
                'folder' => $folder,
                'file' => $filename
            ]);
    
            return $folder;
        }
    
        return '';

        // if ($request->hasFile('document')) {
        //     $file = $request->file('document');
        //     $filename = $file->getClientOriginalName();            
        //     $folder = uniqid('vaqtincha', true);
        //     $file->storeAs('vaqtincha/tmp/' . $folder, $filename);
        //     TemporaryFile::create([
        //         'folder' => $folder,
        //         'file' => $filename
        //     ]);
           
        //     return $folder;
        // }
        
        // return '';
    }
}
