<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\University;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $universities = University::all();
        return view('pages.main', compact('products', 'universities'));
    }

    public function get_product_detail($id)
    {
        $product = Product::with('organization')->find($id);
        $university = University::find($product->organization->university_id);
        return view('pages.product_detail', compact('product', 'university'));
    }

    public function get_popular_products()
    {
        $products = Product::all();
        return view('pages.popular_product', compact('products'));
    }

    public function get_product_by_university($id)
    {
        $university = University::with('organizations.products')->find($id);
        $products = $university->organizations->pluck('products')->flatten()->all();

        return view('pages.university_product', compact('university', 'products'));
    }
}
