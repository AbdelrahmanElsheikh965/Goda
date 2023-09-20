<?php


namespace App\ECommerce\Static\Repositories;

use App\ECommerce\Shared\Repositories\StaticRepository;
use App\ECommerce\Static\Models\Paragraph;

class ParagraphRepository extends StaticRepository
{
    public function __construct(protected Paragraph $paragraph)
    {
        $this->setModel($paragraph);
    }

    public function prepareParagraphsData($requestArrayData)
    {
        $paragraphsIDs = [];
        $dataToBeUpdated = [];

        foreach ($requestArrayData as $key => $value)
        {
            if ($key === '_token' || $key === '_method')
            {
                continue;
            }
            $id = strstr($key, "_", true);

            if (! in_array($id, $paragraphsIDs))
            {
                $dataToBeUpdated [] = [
                    'title' => $requestArrayData[$id.'_title'],
                    'body' => $requestArrayData[$id.'_body']
                ];
            }
            $paragraphsIDs [] = $id;
        }
        $paragraphsIDs = array_unique($paragraphsIDs);
        return [$dataToBeUpdated, $paragraphsIDs];
    }

    /*
     * Override StaticRepository's index method.
     */
    public function index(string $viewName)
    {
        $paragraphs = Paragraph::all();
        return view($viewName, ['paragraphs' => $paragraphs]);
    }

    /*
     * Override StaticRepository's update method.
     */
    public function update(array $data, $ids = null)
    {
        foreach ($data as $index => $element)
        {
            $this->model::find($ids[$index*2])->update($element);
        }
    }
}
