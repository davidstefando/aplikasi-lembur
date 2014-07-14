<?php 
namespace Warlock\Menu;

class Menu
{
	/**
	* Collection of menus
	*/
	protected $primaryItem = array();

	protected $secondaryItem = array();

	/**
	* Add a primary menu item to the collection
	* @param $name (string), $url (string), $text (string), $icon (string)
	*/
	public function addPrimaryMenu($detail = array())
	{
		$menuItem = array(
				'name' => $detail['name'],
				'detail' => array(
					'url' => $detail['url'],
					'text' => $detail['text'],
					'icon' => $detail['icon'],
				)
			);
		array_push($this->primaryItem, $menuItem);
	}

	/**
	* Add a children menu item to the primary menu
	* @param $url (string), $text (string), $icon (string), $parent (string)
	*/
	public function addSecondaryMenu($detail = array())
	{
		$menuItem = array(
				'url' => $detail['url'],
				'text' => $detail['text'],
				'icon' => $detail['icon'],
				'parent' => $detail['parent'],
			);
		array_push($this->secondaryItem, $menuItem);
	}

	public function renderMenu()
	{
		return $this->renderPrimary() . $this->renderSecondary();
	}

	public function renderPrimary()
	{
		$primaryMenu = "<nav class='primary-navigation left'>" .
					"<ul>";

		foreach ($this->primaryItem as $item) {
			if ($item['name'] == $this->getCurrentPrimaryMenu()) {
				$primaryMenu .= "<li class='active'><a href=" . $item['detail']['url'] . ">
							<i class='" . $item['detail']['icon'] . "'>" . $item['detail']['text'] . "</i>
						  </a>
					  </li>";
			} else {
				$primaryMenu .= "<li><a href=" . $item['detail']['url'] . ">
							<i class='" . $item['detail']['icon'] . "'>" . $item['detail']['text'] . "</i>
						  </a>
					  </li>";
			}
		}

		$primaryMenu .= "</ul></nav>";

		return $primaryMenu;
	}

	public function renderSecondary()
	{
		$secondaryMenu = "<nav class='secondary-navigation clear'>" .
					"<ul>";

		foreach ($this->secondaryItem as $item) {
			if ($item['parent'] == $this->getCurrentPrimaryMenu()) {
				$secondaryMenu .= "<li " . $this->isActive($item['url']) . "><a href=" . $item['url'] . ">
							<i class='" . $item['icon'] . "'>" . $item['text'] . "</i>
						  </a>
					  </li>";
			}
		}

		$secondaryMenu .= "</ul></nav>";

		return $secondaryMenu;
	}

	public function isActive($url)
	{
		if (\Route::getCurrentRoute()->getPath() == $url) {
			return "class='active'";
		}
		return "";
	}

	public function getCurrentPrimaryMenu()
	{
		foreach ($this->secondaryItem as $detail) {
			if (\Route::getCurrentRoute()->getPath() == $detail['url']) {
				return $detail['parent'];
			}
		}
	}
}