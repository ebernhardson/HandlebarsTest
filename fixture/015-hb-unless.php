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
'.((!LCRun2::ifvar(Array('test'), $cx, $in)) ? '
Yes! '.LCRun2::encq(Array('name'), $cx, $in).' is '.LCRun2::encq(Array('gender'), $cx, $in).'
' : '').'
'.((!LCRun2::ifvar(Array('test'), $cx, $in)) ? '
2nd If, '.LCRun2::encq(Array('name'), $cx, $in).' is '.LCRun2::raw(Array('gender'), $cx, $in).'
' : '
Else test, '.LCRun2::encq(Array('name'), $cx, $in).' is '.LCRun2::encq(Array('gender'), $cx, $in).'
').'
'.LCRun2::encq(Array('end'), $cx, $in).'
';
}
?>