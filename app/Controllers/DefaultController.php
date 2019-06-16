<?php

namespace Jetpack\Controllers;

class DefaultController
{
	public function home()
	{
		return view('index');
	}

	public function contact()
	{
		return view('contact');
	}
}
