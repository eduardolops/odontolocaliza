<?php 

namespace Doctor\Supports\CountAccess;

use Doctor\Models\ViewCountAccess;

class CountAccess {

	protected $view;

	function __construct(ViewCountAccess $view)
	{
		$this->view = $view;
	}

	public function count()
	{
		return $this->view->find(1);
	}

}