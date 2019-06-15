<?php

namespace Jetpack\Controllers;

class DefaultController
{
	public function home()
	{
		view('index');
	}

	public function contact()
	{
        return 'DefaultController -> contact';
	}

	public function companies($id = null)
	{
        return 'DefaultController -> companies -> id: ' . $id;
	}

    public function notFound()
    {
        return 'Page not found';
    }
}
