<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function list()
    {
        $categories = Product::with('comments')->get();

        return response()->json([
            'data' => ProductResource::collection($categories)
        ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ],
            ['name.required' => 'لطفا نام محصول را وارد کنید',
                'price.required' => 'لطفا قیمت محصول را صحیح وارد کنید',
                'description.required' => 'لطفا توضیحات محصول را صحیح وارد کنید',
            ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 403,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 403);
        }
        return response()->json([
            'status' => 200,
            'message' => 'محصول جدید با موفقیت ایجاد شد',
        ], 200);
    }
}
