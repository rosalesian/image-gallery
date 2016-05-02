<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\Gallery;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function viewGalleryList()
    {
        $gallery = Gallery::all();

	   return view('gallery.gallery', compact('gallery'));
    }

    public function saveGallery(Request $request)
    {
        $gallery = new Gallery();
        $gallery->name = $request->input('gallery_name');
        $gallery->created_at = 1;
        $gallery->published = 1;
        $gallery->save();
        return redirect()->back();
    }

    public function viewGalleryPics($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('gallery.gallery-view', compact('gallery'));
    }

    public function doImageUpload(Request $request)
    {
        //get the filel from post request
        $file = $request->file('file');
        //get the file name
        $filename = uniqid() . $file->getClientOriginalName();
        //move the file correct location
        if(!file_exists('gallery/images'))
        {
            mkdir('gallery/images',0777, true);
        }
        $file->move('gallery/images', $filename);

        if(!file_exists('gallery/images/thumbs'))
        {
            mkdir('gallery/images/thumbs',0777, true);
        }

        $thumb = Image::make('gallery/images/' . $filename)->resize(240,160)->save('gallery/images/thumbs/' . $filename, 50);
        //save the image details into the database
        $gallery = Gallery::find($request->input('gallery_id'));
        $images = $gallery->images()->create([
                'gallery_id' => $request->input('gallery_id'),
                'file_name' => $filename,
                'file_size' => $file->getClientSize(),
                'file_mime' => $file->getClientMimeType(),
                'file_path' => 'gallery/images/' . $filename,
                'created_by' => 1
            ]);
        return redirect()->back();

    }

    public function deleteGallery($id) 
    {
        //load the gallery
        $currentGallery = Gallery::findOrFail($id);

        //get the image
        $images = $currentGallery->images();

        //delete the image
        foreach($currentGallery->images as $image)
        {
            unlink(public_path($image->file_path));
            unlink(public_path('/gallery/images/thumbs/' . $image->file_name));
        }

        //delete the db records
        $currentGallery->images()->delete();

        $currentGallery->delete();

        return redirect()->back();
    }
}
