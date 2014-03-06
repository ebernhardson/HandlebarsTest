<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(            'helper1' => function($url, $txt) {
                $u = ($url !== null) ? $url : 'undefined';
                $t = ($txt !== null) ? $txt : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>";
            },
            'helper2' => function($hash) {
                $u = isset($hash['url']) ? $hash['url'] : 'undefined';
                $t = isset($hash['text']) ? $hash['text'] : 'undefined';
                $x = isset($hash['ur"l']) ? $hash['ur"l'] : 'undefined';
                return "<a href=\"{$u}\">{$t}</a>({$x})";
            },
),
        'blockhelpers' => Array(            'helper3' => function($cx, $args) {
                return Array('test1', 'test2', 'test3');
            },
            'helper4' => function($cx, $args) {
                if (isset($args['val']) && is_array($cx)) {
                    $cx['helper4_value'] = $args['val'] % 2;
                    return $cx;
                }
                if (isset($args['odd'])) {
                    return Array(1,3,5,7,9);
                }
            },
),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!

##0 start section:
'.LCRun2::sec(Array('winners'), $cx, $in, false, function($cx, $in) {return '
  - EACH 1 - '.LCRun2::encq(Array('name'), $cx, $in).' ~ '.LCRun2::encq(Array(1,'name'), $cx, $in).'
  Name:'.LCRun2::encq(Array('name'), $cx, $in).', Value:'.LCRun2::encq(Array('value'), $cx, $in).', This: '.LCRun2::encq(Array(null), $cx, $in).', Test: '.LCRun2::encq(Array('test'), $cx, $in).'

  - EACH 2- '.LCRun2::encq(Array('name'), $cx, $in).' ~ '.LCRun2::encq(Array(1,'name'), $cx, $in).'
';}).'
end section.

##1 start each:
'.LCRun2::sec(Array('winners'), $cx, $in, true, function($cx, $in) {return '
  - EACH 3 - '.LCRun2::encq(Array('name'), $cx, $in).' ~ '.LCRun2::encq(Array(1,'name'), $cx, $in).'
  Name:'.LCRun2::encq(Array('name'), $cx, $in).', Value:'.LCRun2::encq(Array('value'), $cx, $in).', This: '.LCRun2::encq(Array(null), $cx, $in).', Test: '.LCRun2::encq(Array('test'), $cx, $in).'

  - EACH 4 - '.LCRun2::encq(Array('name'), $cx, $in).' ~ '.LCRun2::encq(Array(1,'name'), $cx, $in).'
';}).'
end each.

##2 start each+if:
'.LCRun2::sec(Array('winners'), $cx, $in, true, function($cx, $in) {return '
 '.((LCRun2::ifvar(Array('test'), $cx, $in)) ? '
  Name:'.LCRun2::encq(Array('name'), $cx, $in).', Value:'.LCRun2::encq(Array('value'), $cx, $in).', This: '.LCRun2::encq(Array(null), $cx, $in).', Test: '.LCRun2::encq(Array('test'), $cx, $in).'

 ' : '').'
';}).'
end each+if.

##3 start each+if+with:
'.LCRun2::sec(Array('winners'), $cx, $in, true, function($cx, $in) {return '
 '.((LCRun2::ifvar(Array('test'), $cx, $in)) ? '
  '.LCRun2::wi(Array('people'), $cx, $in, function($cx, $in) {return '
   Name:'.LCRun2::encq(Array('name'), $cx, $in).', Value:'.LCRun2::encq(Array('value'), $cx, $in).', This: '.LCRun2::encq(Array(null), $cx, $in).', Test: '.LCRun2::encq(Array('test'), $cx, $in).'

  ';}).'
 ' : '').'
';}).'
end each+if+with.

##4 start each+with+if:
'.LCRun2::sec(Array('winners'), $cx, $in, true, function($cx, $in) {return '
 '.LCRun2::wi(Array('people'), $cx, $in, function($cx, $in) {return '
  '.((LCRun2::ifvar(Array('test'), $cx, $in)) ? '
   Name:'.LCRun2::encq(Array('name'), $cx, $in).', Value:'.LCRun2::encq(Array('value'), $cx, $in).', This: '.LCRun2::encq(Array(null), $cx, $in).', Test: '.LCRun2::encq(Array('test'), $cx, $in).'

  ' : '').'
 ';}).'
';}).'
end each+with+if.
';
}
?>