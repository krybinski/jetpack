<?php

namespace Jetpack\Controllers;

class IndexController extends Controller
{
	public $pageTitle = 'Jetpack - ' . SITE_NAME;
	public $seoTags = [
		'description' => 'Opis',
		'canonical' => APP_URL,
	];
    public $user;
    public $comments;
    public $isLoggedIn;
    public $csrf;

    public function get()
    {
        $this->isLoggedIn = $this->sessionService->isUserLoggedIn();

        $userId = $this->sessionService->getSessionValue('user_id');
        $this->user = $this->userControl->getUser($userId);
        $this->csrf = $this->sessionService->getSessionValue('csrf');

        $this->comments = $this->comment->getComments();
        $this->view('index');
    }
}
