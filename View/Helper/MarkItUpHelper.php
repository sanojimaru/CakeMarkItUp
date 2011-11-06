<?php
App::uses('AppHelper', 'Helper');
class MarkItUpHelper extends AppHelper {

  public $helpers = array('Html');

  public function start() {
    $core = $this->Html->script(array(
      '/mark_it_up/markitup/jquery.markitup',
      '/mark_it_up/js/enable_markitup',
    ));

    $sets = $this->Html->script('/mark_it_up/markitup/sets/default/set')
      .$this->Html->css('/mark_it_up/markitup/sets/default/style');

    $skins = $this->Html->css(array(
      '/mark_it_up/markitup/skins/simple/style',
    ));

    return $core.$sets.$skins;
  }

}
