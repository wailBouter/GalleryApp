<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function viewGalleryList()
    {
        $galleries = Gallery::all();
        return view('gallery.gallery')
                ->with('galleries', $galleries);
    }

    public function saveGallery(Request $request)
    {
        //validate the request through the validation rules
        $validator = Validator::make($request->all(), [
            'gallery_name' => 'required|min:3',
        ]);

        //Take actions when the validation fails
        if($validator->fails()){
            return redirect('gallery/list')
            ->withErrors($validator)
            ->withInput();
        }
        $gallery = new Gallery;
        //save the new gallery
        $gallery->name = $request->input('gallery_name');
        $gallery->created_by= Auth::user()->id;
        $gallery->published = 1;
        $gallery->save();

        return redirect()->back();
    }

    public function viewGalleryPics($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('gallery.gallery-view')
                ->with('gallery', $gallery);
    }
    
    public function doImageUpload(Request $request)
    {
        //get the file from the post request

        $file = $request->file('file');

        //set the file name and size

        $filename = uniqid() . $file->getClientOriginalName();
        $size = File::size($file);

        //move the file to the correct location

        $file->move('gallery/images', $filename);

        //save the image details into the database
        $gallery = Gallery::find($request->input('gallery_id'));
        $image = $gallery->images()->create([
            'gallery_id' => $request->input('gallery_id'),
            'filename' => $filename,
            'file_size' => $size,
            'file_mime' => $file->getClientMimeType(),
            'file_path' => 'gallery/images/' .  $filename,
            'created_by' => Auth::user()->id
            ]);
        return $image;
    }
}
