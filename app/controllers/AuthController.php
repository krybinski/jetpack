<?php

namespace Jetpack\Controllers;

use Jetpack\Services\SessionService;
use Symfony\Component\HttpFoundation\Request;

class AuthController extends Controller
{
    public $pageTitle = 'Panel administracyjny';
    public $list;
    public $user;
	public $csrf;

	public function __construct()
	{
		parent::__construct();
	}

	public function get()
    {
        $userId = $this->sessionService->getSessionValue('user_id');
        $this->sessionService->authenticate($userId);

        $this->user = $this->userControl->getUser($userId);
        $this->csrf = $this->sessionService->getSessionValue('csrf');

        $this->view('auth/panel');
    }

    public function update()
    {
        $request = Request::createFromGlobals();
        $csrf = $request->request->get('csrf');

        SessionService::validateCSRF($csrf);

        $url = $request->request->get('url');
        $imageLogo = $request->files->get('logo');

        // TODO: save url
        // TODO: check if image exists
        // TODO: create image service for save new and remove old images

        $this->redirect('panel');
    }
}
