<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function store(ProductRequest $request) {
        //dd($request);
        $data = $request->validated();
        //if ($request->user()) {
            $data['created_by'] = $request->user()->id;
            $data['updated_by'] =$request->user()->id;
            $data['deleted_by'] = 2;
        //}

        $image = $data['product_image'] ?? null;
        if ($image) {
            $relativePath = $this->saveImage($image);
            $data['product_image'] = URL::to(Storage::url($relativePath));
        }

        $product = Products::create($data);
        return response()->json($product, 201);
        


    }
    private function saveImage($image)
    {
        // Saves file inside storage/app/public/images
        return $image->store('images', 'public');
    }
}
