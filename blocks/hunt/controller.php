<?php  defined('C5_EXECUTE') or die("Access Denied.");

class HuntBlockController extends BlockController {
	
	protected $btName = 'hunt';
	protected $btDescription = 'A single hunt, including dates, price, etc.';
	protected $btTable = 'btDCHunt';
	
	protected $btInterfaceWidth = "700";
	protected $btInterfaceHeight = "450";
	
	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;
	
	public function getSearchableContent() {
		$content = array();
		$content[] = $this->field_1_textbox_text;
		$content[] = $this->field_2_textbox_text;
		$content[] = $this->field_3_textbox_text;
		$content[] = $this->field_4_textbox_text;
		return implode(' - ', $content);
	}








}
