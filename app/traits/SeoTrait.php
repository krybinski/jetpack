<?php

namespace Jetpack\Traits;

trait SeoTrait
{
	public function pageTitle(string $title = '')
	{
		if ($title === null || $title === '') {
			$this->pageTitle = config('app.name');
		} else {
			$this->pageTitle = $title . ' | ' . config('app.name');
		}
	}

	public function pageDescription(string $description = '')
	{
		$this->pageDescription = $description;
	}

	public function canonical(string $url = null)
	{
		if ($url === null) {
			$this->canonical = config('app.url');
		} else {
			$this->canonical = config('app.url') . $url;
		}
	}
}
