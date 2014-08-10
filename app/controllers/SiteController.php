<?php
	class SiteController extends BaseController
	{
		public function showHomePage()
		{
			return View::make('home');
		}

		public function getNotificationFor()
		{
			$notifications = Notifikasi::where('to', '=', Auth::user()->nik)->get();
			foreach ($notifications as $notification) {
				echo "
					<div class='notification-message $notification->status'>
						<a href='/read/$notification->id'>$notification->content</a>
			            <div class='timestamp'>
			              $notification->created_at
			            </div>
					</div>
				";
			}
			return null;
		}

		public function getUnreadNotificationCountFor()
		{
			return Notifikasi::where('to', '=', Auth::user()->nik)->where('status', '=', 'unread')->count();
		}

		public function readNotification($id)
		{
			$notification = Notifikasi::find($id);
			$notification->status = "read";
			$notification->save();
			return Redirect::to('status');
		}
	}