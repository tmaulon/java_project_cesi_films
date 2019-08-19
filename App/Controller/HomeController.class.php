<?php


namespace App\Controller;


use App\Layout;

class HomeController
{
    private $layout;

    public function __construct()
    {
        $this->layout = new Layout('base');
    }

    public function show()
    {
        $html = $this->layout->render('home', [
            'name' => 'Tom',
        ]);
        echo $html;
    }

}
