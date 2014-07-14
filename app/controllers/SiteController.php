<?php
	class SiteController extends BaseController
	{
		public function showHomePage()
		{
			return View::make('home');
		}
	}