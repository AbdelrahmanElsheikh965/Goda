<?php


namespace App\ECommerce\Static\Services;

use App\ECommerce\Static\Repositories\ParagraphRepository;
use Illuminate\Http\Request;

class ParagraphService
{
    public function __construct(protected ParagraphRepository $paragraphRepository)
    {
        //
    }

    public function index()
    {
        return $this->paragraphRepository->index('Admin.Paragraphs.index');
    }

    public function update(Request $request)
    {
        $request->validate([ '*' => 'sometimes|string' ]);
        $data_with_IDs = $this->paragraphRepository->prepareParagraphsData($request->all());
        $this->paragraphRepository->update($data_with_IDs[0], $data_with_IDs[1]);
    }
}
