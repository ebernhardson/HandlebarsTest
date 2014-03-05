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
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq(Array('name'), $cx, $in).', you have just won $'.LCRun2::encq(Array('value'), $cx, $in).'!

##0 start section:
'.LCRun2::sec(Array('winners'), $cx, $in, false, function($cx, $in) {return '
  - EACH 1- '.LCRun2::encq(Array('name'), $cx, $in).'
';}).'
end section.

##1 start each:
'.LCRun2::sec(Array('winners'), $cx, $in, true, function($cx, $in) {return '
  - EACH 2 - '.LCRun2::encq(Array('name'), $cx, $in).'
';}).'
end each.

##3 Index
Index ?: '.LCRun2::encq(Array('winners','name'), $cx, $in).'
Index 0: '.LCRun2::encq(Array('winners','0','name'), $cx, $in).'
Index 1: '.LCRun2::encq(Array('winners','1','name'), $cx, $in).'
';
}
?>