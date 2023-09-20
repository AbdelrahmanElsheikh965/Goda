<?php

namespace App\Http\Controllers\Web;

use App\ECommerce\Product\Services\ClientProductService;
use App\ECommerce\Product\Models\Product;
use App\ECommerce\Static\Models\Paragraph;
use App\ECommerce\Static\Models\WebImage;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ClientProductController extends Controller
{
    public function __construct(private ClientProductService $productService) {}

    public function index(Request $request)
    {
        $webImages      = WebImage::all();
        $webParagraphs  = Paragraph::all();
        $contactDetails = ContactUs::first();
        $data = $this->productService->index($request); // products + categoriesWithSubCategories
        return view('Web.Products.products', [
            'webImages'      => $webImages,
            'webParagraphs'  => $webParagraphs,
            'contactDetails' => $contactDetails
        ])->with('data', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $webImages      = WebImage::all();
        $webParagraphs  = Paragraph::all();
        $contactDetails = ContactUs::first();
        $product = $this->productService->show($product);
        return view('Web.Products.product', [
            'webImages'      => $webImages,
            'webParagraphs'  => $webParagraphs,
            'contactDetails' => $contactDetails
        ])->with('product', $product);
    }

}
