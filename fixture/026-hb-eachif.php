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
    return ''.((LCRun2::ifvar(Array('empty'), $cx, $in)) ? '

' : '
'.LCRun2::sec(Array('data'), $cx, $in, true, function($cx, $in) {return '

'.LCRun2::sec(Array('child'), $cx, $in, true, function($cx, $in) {return '
    '.((LCRun2::ifvar(Array('key'), $cx, $in)) ? '
       The value is = '.LCRun2::encq(Array('key'), $cx, $in).' !!
    ' : '
        key is empty or null
    ').'

    '.LCRun2::encq(Array(1,'fake'), $cx, $in).'

';}).'
';}).'

').'
';
}
?>