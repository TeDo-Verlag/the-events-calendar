<?php
namespace Tribe\Events\Views\V2;

class Test_Context_View extends View {

	public function get_slug() {
		return 'context-view';
	}

	public function get_html() {
		$html = '<script type="text/javascript">'
		        . 'var dump = ' . json_encode( $this->get_context()->to_array(), JSON_PRETTY_PRINT )
		        . '</script>';

		return $html;
	}
}