<?php

namespace Jetpack\Traits;

trait SeoTrait
{
	public function pageTitle(string $title = '')
	{
		if ($title === '') {
			$this->pageTitle = config('app.name');
		} else {
			$this->pageTitle = $title . ' | ' . config('app.name');
		}
	}

	public function pageDescription(string $description = '')
	{
		$this->pageDescription = $description;
	}
}
