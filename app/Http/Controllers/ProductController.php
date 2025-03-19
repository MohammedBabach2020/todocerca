<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Imagick;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function add(Request $request)
    {

        $product = \App\Product::create([
            'name' => $request->nom,
            'stock' => $request->stock,
            'buying_price' => $request->buying_price,
            'selling_price' => $request->selling_price,
            'uni' => $request->uni,
            'description' => $request->description,
            'category' => $request->categorie,

        ]);


        $images = $request->images;
        foreach ($images as $index => $image) {
            $image_pro = $index . time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/', $image_pro);
            $img = imagecreatefromstring(file_get_contents("storage/" . $image_pro));
            imagejpeg($img, "storage/" . $image_pro, 70);

            $insertImage = \App\ProductImages::create([
                'prod_id' => $product->id,
                'image' => $image_pro,
            ]);
        }





        toastr()->success('Product is added seccussfully');
        return redirect()->back();
    }

    public function edit(Request $request)
    {



        if (count($request->images) > 0) {

            //delete old images
            $images = \App\ProductImages::where('prod_id', $request->id)->get();
            foreach ($images as $image) {
                Storage::delete($image->image);
                $image->delete();
            }
            //add new images
            $images = $request->images;

            foreach ($images as  $index => $image) {
                $image_name = $index . time() . '.' . $image->getClientOriginalExtension();

                // First, resize the image
                $resizedImage = Image::make($image->getRealPath())->resize(1500, 1500);

                // Save the resized image
                $resizedImage->save(public_path('larges/' . $image_name));

                // Move the original image
                $image->move(public_path('storage/'), $image_name);

                \App\ProductImages::create([
                    'prod_id' => $request->id,
                    'image' => $image_name,
                ]);
                if ($index == 0) {
                    //update product
                    $product = \App\Product::where('id', $request->id)->update([
                        'name' => $request->nom,
                        'stock' => $request->stock,
                        'buying_price' => $request->buying_price,
                        'selling_price' => $request->selling_price,
                        'uni' => $request->uni,
                        'description' => $request->description,
                        'category' => $request->categorie,
                        'image' => $image_name,

                    ]);
                }
            }
        } else {
            $product = \App\Product::where('id', $request->id)->update([
                'name' => $request->nom,
                'stock' => $request->stock,
                'buying_price' => $request->buying_price,
                'selling_price' => $request->selling_price,
                'uni' => $request->uni,
                'description' => $request->description,
                'category' => $request->categorie,
            ]);
        }
        toastr()->info('Product is edited seccussfully');
        return redirect()->back();
    }

    public function delete(Request $req)
    {

        $products = \App\Product::where('id', $req->id)->firstOrFail();
        //delete related images
        $images = \App\ProductImages::where('prod_id', $req->id)->get();
        foreach ($images as $image) {
            Storage::delete($image->image);
            $image->delete();
        }
        //delete products
        $products->delete();
        toastr()->error('Product is deleted seccussfully');
        return redirect()->back();
    }

    public function trend(Request $req)
    {
        if ($req->trend == 1) {
            $trend = \App\Product::where('id', $req->id)->update([
                'trends' => 0,
            ]);
        }
        if ($req->trend == 0) {
            $trend = \App\Product::where('id', $req->id)->update([
                'trends' => 1,
            ]);
        }
        return redirect()->back();
    }
}
