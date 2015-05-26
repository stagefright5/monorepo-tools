<?php

namespace SS6\ShopBundle\Twig;

use SS6\ShopBundle\Model\Module\ModuleFacade;
use Twig_Extension;
use Twig_SimpleFunction;

class ModuleExtension extends Twig_Extension {

	/**
	 * @var \SS6\ShopBundle\Model\Module\ModuleFacade
	 */
	private $moduleFacade;

	public function __construct(ModuleFacade $moduleFacade) {
		$this->moduleFacade = $moduleFacade;
	}

	/**
	 * @return array
	 */
	public function getFunctions() {
		return [
			new Twig_SimpleFunction('isModuleEnabled', [$this, 'isModuleEnabled']),
		];
	}

	/**
	 * @param int $moduleName
	 * @return string
	 */
	public function isModuleEnabled($moduleName) {
		return $this->moduleFacade->isEnabled($moduleName);
	}

	/**
	 * @return string
	 */
	public function getName() {
		return 'module';
	}

}