<?php

namespace OCA\Cookbook\Controller;

use OCP\IRequest;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\JSONResponse;
use OCA\Cookbook\Controller\Implementation\CategoryImplementation;

class CategoryController extends Controller {
	/** @var CategoryImplementation */
	private $impl;

	public function __construct(
		string $AppName,
		IRequest $request,
		CategoryImplementation $categoryImplementation
	) {
		parent::__construct($AppName, $request);

		$this->impl = $categoryImplementation;
	}

	/**
	 * @NoAdminRequired
	 *
	 * @return JSONResponse
	 */
	public function categories() {
		return $this->impl->index();
	}

	/**
	 * @NoAdminRequired
	 * @param string $category
	 * @return JSONResponse
	 */
	public function rename($category) {
		return $this->impl->rename($category);
	}
}
