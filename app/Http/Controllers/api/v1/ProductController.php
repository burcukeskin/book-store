<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\ProductPostRequest;
use App\Http\Requests\v1\ProductPutRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{

    const PAGE_SIZE = 50;

    public function index()
    {
        try {
            $productPaginator = Product::paginate(self::PAGE_SIZE);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }

        return ProductResource::collection($productPaginator);
    }

    public function store(ProductPostRequest $request)
    {
        $data = $request->validated();
        try {
            $product = Product::create($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
        return ProductResource::make($product);
    }


    public function show($id)
    {
        try {
            $product = Product::findOrFail($id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }

        return new ProductResource($product);

    }

    public function update(ProductPutRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->validated();

        try {
            $product->update($data);
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }

        return Response::success()
            ->message("The product has been updated")
            ->response(new ProductResource($product));
    }

    public function destroy($id)
    {
        try {
            Product::destroy($id);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }

        return Response::success()
            ->message("The product has successfully deleted.")
            ->response();
    }

}
