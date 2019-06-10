<?php

namespace Jetpack\Controllers;

use Jetpack\Traits\SeoTrait;

class IndexController extends Controller
{
	use SeoTrait;

    public $user;
    public $comments;
    public $isLoggedIn;
	public $csrf;

    public function get()
    {
		$this->pageTitle('Home page');
		$this->pageDescription('Home page description');
		$this->seoTags = [
			'canonical' => config('app.url'),
		];

        $this->isLoggedIn = $this->sessionService->isUserLoggedIn();

        $userId = $this->sessionService->getSessionValue('user_id');
        $this->user = $this->userControl->getUser($userId);
        $this->csrf = $this->sessionService->getSessionValue('csrf');

        $this->comments = $this->comment->getComments();
        $this->view('index');
    }
}
