<?php
App::uses('AppHelper', 'Helper');
class MarkItUpHelper extends AppHelper {

  public $helpers = array('Html');

  private $skins = array(
    'default' => array(
      '/mark_it_up/markitup/skins/default/style.css',
    ),
    'simple' => array(
      '/mark_it_up/markitup/skins/simple/style.css',
    ),
  );

  private $sets = array(
    'default' => array(
      '/mark_it_up/markitup/sets/default/set.js',
      '/mark_it_up/markitup/sets/default/style.css',
    ),
    'markdown' => array(
      '/mark_it_up/markitup/sets/markdown/set.js',
      '/mark_it_up/vendor/js-markdown-extra/js-markdown-extra.js',
      '/mark_it_up/js/markdown_parser_setting.js',
      '/mark_it_up/markitup/sets/markdown/style.css',
    ),
  );

  public function start($options = null) {
    $default = array(
      'set' => 'default',
      'skin' => 'simple',
    );
    $options = Set::merge($default, $options);

    $core = $this->Html->script(array(
      '/mark_it_up/markitup/jquery.markitup',
      '/mark_it_up/js/enable_markitup',
    ));

    $set = $this->loadAssets($this->sets[$options['set']]);
    $skin = $this->loadAssets($this->skins[$options['skin']]);
    return $core.$set.$skin;
  }

/**
 * 引数の配列に含まれるassetファイルを、ファイル名に応じて適宜includeするためのhtmlを返す.
 *
 * @param Array $assets assetファイル名の羅列
 * @return string $out assetファイルを読み込むhtmlタグ
 */
  private function loadAssets($assets) {
    if (!is_array($assets)) {
      $assets = array($assets);
    }

    $out = '';
    foreach ($assets as $asset) {
      switch (pathinfo($asset, PATHINFO_EXTENSION)) {
      case 'js':
        $out .= $this->Html->script($asset);
        break;

      case 'css':
        $out .= $this->Html->css($asset);
        break;

      default:
        break;
      }
    }
    return $out;
  }

}
