<?php

namespace Jetpack\Services;

//use Symfony\Component\HttpFoundation\Request;
//use Intervention\Image\Image;

class ImageService
{

//	const SMALL_SIZE = 1000;
//	const THUMBNAIL_SIZE = 300;
//	const MINIATURE_SIZE = 40;

	private $ORIGINAL_DIR;
	private $SMALL_DIR;
	private $THUMBNAIL_DIR;
	private $MINIATURE_DIR;

	/**
	 * Create instance of ImageService
	 */
	public function __construct()
	{
		$this->ORIGINAL_DIR = 'public/upload';
		$this->SMALL_DIR = 'public/upload/small';
		$this->THUMBNAIL_DIR = 'public/upload/thumbnail';
		$this->MINIATURE_DIR = 'public/upload/miniature';
	}

}

//
//	/**
//	 * Upload photos
//	 *
//	 * @param Request $request
//	 * @param string $inputName
//	 * @return void
//	 */
//	public function upload(Request $request, string $inputName)
//	{
//		$this->initDirectories();
//
//		if ($request->hasFile($inputName)) {
//			if($request->file($inputName)->isValid()) {
//				$file = $request->file($inputName);
//				$filename = $file->hashName();
//
//				$this->resizeImage($file, $filename);
//
//				return $filename;
//			}
//		}
//	}
//
//	/**
//	 * Remove photos by filename
//	 */
//	public function remove($filename)
//	{
//		if ($filename !== null) {
//			Storage::disk('local')->delete($this->ORIGINAL_DIR . '/' . $filename);
//			Storage::disk('local')->delete($this->SMALL_DIR . '/' . $filename);
//			Storage::disk('local')->delete($this->THUMBNAIL_DIR . '/' . $filename);
//			Storage::disk('local')->delete($this->MINIATURE_DIR . '/' . $filename);
//		}
//	}
//
//	/**
//	 * Directories initialization
//	 *
//	 * @return void
//	 */
//	private function initDirectories()
//	{
//		if (!Storage::exists($this->ORIGINAL_DIR)) {
//			Storage::makeDirectory($this->ORIGINAL_DIR);
//		}
//
//		if (!Storage::exists($this->SMALL_DIR)) {
//			Storage::makeDirectory($this->SMALL_DIR);
//		}
//
//		if (!Storage::exists($this->THUMBNAIL_DIR)) {
//			Storage::makeDirectory($this->THUMBNAIL_DIR);
//		}
//
//		if (!Storage::exists($this->MINIATURE_DIR)) {
//			Storage::makeDirectory($this->MINIATURE_DIR);
//		}
//	}
//
//	/**
//	 * Resize image
//	 *
//	 * @param $file
//	 * @param string $filename
//	 * @param int $width
//	 * @param int $height
//	 * @return void
//	 */
//	private function resizeImage($file, string $filename, int $width = 1920, int $height = 1080)
//	{
//		$extension = $file->getClientOriginalExtension();
//
//		$path = Storage::disk('local')
//			->getDriver()
//			->getAdapter()
//			->applyPathPrefix($this->ORIGINAL_DIR . '/' . $filename);
//
//		// Image resize
//		$image = Image::make($file);
//
//		$imageWidth = $image->width();
//		$imageHeight = $image->height();
//
//		// Portrait
//		if ($imageWidth < $imageHeight && $imageHeight > $height) {
//			$image->resize($width, $height, function($constraint) {
//				$constraint->aspectRatio();
//			});
//			// Landscape
//		} else if ($imageWidth > $imageHeight && $imageWidth > $width) {
//			$image->resize($width, $height, function($constraint) {
//				$constraint->aspectRatio();
//			});
//			// Square
//		} else if ($imageWidth == $imageHeight && $imageWidth > $width) {
//			$image->resize($width, $height, function($constraint) {
//				$constraint->aspectRatio();
//			});
//		}
//
//		$image->save($path);
//
//		$this->createSmall($image, $filename);
//		$this->createThumbnail($image, $filename);
//		$this->createMiniature($image, $filename);
//	}
//
//	/**
//	 * Create small photo
//	 *
//	 * @param Image $image
//	 * @param string $filename
//	 * @return void
//	 */
//	private function createSmall($image, string $filename)
//	{
//		$path = Storage::disk('local')
//			->getDriver()
//			->getAdapter()
//			->applyPathPrefix($this->SMALL_DIR . '/' . $filename);
//
//		$image->resize(self::SMALL_SIZE, null, function ($constraint) {
//			$constraint->aspectRatio();
//		});
//
//		$image->save($path);
//	}
//
//	/**
//	 * Create thumbnail photo
//	 *
//	 * @param Image $image
//	 * @param string $filename
//	 * @return void
//	 */
//	private function createThumbnail($image, string $filename)
//	{
//		$path = Storage::disk('local')
//			->getDriver()
//			->getAdapter()
//			->applyPathPrefix($this->THUMBNAIL_DIR . '/' . $filename);
//
//		$image->resize(self::THUMBNAIL_SIZE, null, function ($constraint) {
//			$constraint->aspectRatio();
//		});
//
//		$image->save($path);
//	}
//
//	/**
//	 * Create miniature
//	 *
//	 * @param Image $image
//	 * @param string $filename
//	 * @return void
//	 */
//	private function createMiniature($image, string $filename)
//	{
//		$path = Storage::disk('local')
//			->getDriver()
//			->getAdapter()
//			->applyPathPrefix($this->MINIATURE_DIR . '/' . $filename);
//
//		$image->resize(self::MINIATURE_SIZE, null, function ($constraint) {
//			$constraint->aspectRatio();
//		});
//
//		$image->save($path);
//	}
//
//}
