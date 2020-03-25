<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        # code...
    }
}
