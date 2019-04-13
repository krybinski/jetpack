<?php

namespace Jetpack\Controllers;

class ResetPasswordController extends Controller
{
    public function get()
    {
        $get = filter_get();
        $requestInfo = $this->userControl->verifyPasswordRequest($get['uid'], $get['id'], $get['t']);

        // Check if valid request
        if (empty($requestInfo)) {
            $this->redirect('forgot-password');
        } else {
            // Set session variable
            $this->sessionService->setPasswordRequestId($get['uid']);

            // Redirect them to reset password form.
            $this->redirect('create-password');
        }
    }
}
