<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return '<h1>'.LCRun2::encq((is_array($in) ? $in['header'] : null), $cx).'</h1>
'.LCRun2::sec((is_array($in) ? $in['notEmpty'] : null), $cx, $in, false, function($cx, $in) {return '
<ul>
'.LCRun2::sec((is_array($in) ? $in['item'] : null), $cx, $in, false, function($cx, $in) {return '
'.LCRun2::sec((is_array($in) ? $in['current'] : null), $cx, $in, false, function($cx, $in) {return '
    <li><strong>'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).'</strong></li>
';}).'
'.((LCRun2::isec((is_array($in) ? $in['current'] : null))) ? '
    <li><a href="'.LCRun2::encq((is_array($in) ? $in['url'] : null), $cx).'">'.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).'</a></li>
' : '').'
';}).'
</ul>
';}).'
'.LCRun2::sec((is_array($in) ? $in['isEmpty'] : null), $cx, $in, false, function($cx, $in) {return '
<p>The list is empty.</p>
';}).'
';
}
?>