<?php  defined('C5_EXECUTE') or die(_("Access Denied."));

class ContactFormPackage extends Package {

	protected $pkgHandle = 'contactform';
	protected $appVersionRequired = '5.6.0';
	protected $pkgVersion = '1.0.3';

	public function getPackageName() {
		return t('Contact form');
	}

	public function getPackageDescription() {
		return t('Multilingual contact form to send emails.');
	}

	public function install() {
		$pkg = parent::install();

		BlockType::installBlockTypeFromPackage('contactform', $pkg);
	}

}
