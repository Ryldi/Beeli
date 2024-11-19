<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\University;
use App\Models\Organization;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $universities = University::all();
        $organizations = Organization::all()->take(5);
        return view('pages.main', compact('products', 'universities', 'organizations'));
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

    public function get_product_by_organization($id)
    {
        $organization = Organization::with('products')->find($id);
        return view('pages.organization', compact('organization'));
    }
}
