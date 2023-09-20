<?php

namespace App\Http\Controllers\User;

use App\ECommerce\Static\Services\ParagraphService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParagraphController extends Controller
{
    public function __construct(private ParagraphService $paragraphService) {}

    public function index()
    {
        return $this->paragraphService->index();
    }

    public function update(Request $request)
    {
        $this->paragraphService->update($request);
        return redirect('user/paragraphs');
    }
}
