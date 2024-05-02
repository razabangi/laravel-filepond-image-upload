<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd(12);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tmpFile = TemporaryFile::where('folder', $request->image)->first();

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|max:100|string',
            'description' => 'nullable|max:500'

        ]);

        if ($validator->fails() && $tmpFile) {
            Storage::deleteDirectory('posts/tmp/' . $tmpFile->folder);
            $tmpFile->delete();

            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($tmpFile) {
            Storage::copy('posts/tmp/'. $tmpFile->folder .'/'. $tmpFile->file, 'posts/'. $tmpFile->folder .'/'. $tmpFile->file);

            Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $tmpFile->folder .'/'. $tmpFile->file
            ]);
            Storage::deleteDirectory('posts/tmp/' . $tmpFile->folder);
            $tmpFile->delete();

            return redirect()->back()->with('success', 'Post created.');
        }

        return redirect()->back()->with('error', 'please upload an image.');
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

    function uploadTemp(Request $request) {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $folder = uniqid('post', true);
            $image->storeAs('posts/tmp/' . $folder, $fileName);
            TemporaryFile::create([
                'folder' => $folder,
                'file' => $fileName,
            ]);

            return $folder;
        }

        return '';
    }

    function deleteTemp() {
        $tmpFile = TemporaryFile::where('folder', request()->getContent())->first();
        if ($tmpFile) {
            Storage::deleteDirectory('posts/tmp/' . $tmpFile->folder);
            $tmpFile->delete();
            return response('');
        }
    }
}
