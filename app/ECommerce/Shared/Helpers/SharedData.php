<?php


namespace App\ECommerce\Shared\Helpers;

use App\ECommerce\Static\Models\Paragraph;
use App\ECommerce\Static\Models\WebImage;
use App\Models\ContactUs;
use Illuminate\Support\Facades\View;

class SharedData
{
    private static $instance;

    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getWebImages()
    {
        return WebImage::all();
    }

    public function getParagraphs()
    {
        return Paragraph::all();
    }

    public function getContactUs()
    {
        return ContactUs::first();
    }

    public function HandleAllSharedData()
    {
        View::share('webImages', $this->getWebImages());
        View::share('webParagraphs', $this->getParagraphs());
        View::share('contactDetails', $this->getContactUs());
    }
}
