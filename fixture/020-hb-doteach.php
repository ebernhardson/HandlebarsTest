<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
            'spvar' => true,
        ),
        'helpers' => Array(),
        'blockhelpers' => Array(),
        'scopes' => Array($in),
        'sp_vars' => Array(),
        'path' => Array(),

    );
    return 'Hello '.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).'!
<ul>
'.LCRun2::sec(((is_array($in['people']) && isset($in['people']['boss'])) ? $in['people']['boss'] : null), $cx, $in, true, function($cx, $in) {return '
 <li>'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' is a '.LCRun2::encq(((is_array($in) && isset($in['gender'])) ? $in['gender'] : null), $cx).' ('.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', '.LCRun2::encq(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).', '.LCRun2::encq(((is_array($in) && isset($in['end'])) ? $in['end'] : null), $cx).')</li>
';}).'
</ul>
'.LCRun2::encq(((is_array($in) && isset($in['end'])) ? $in['end'] : null), $cx).'
'.LCRun2::sec(((is_array($in['people']) && isset($in['people']['boss'])) ? $in['people']['boss'] : null), $cx, $in, false, function($cx, $in) {return '
 THIS:'.LCRun2::encq(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).' is a '.LCRun2::raw(((is_array($in) && isset($in['gender'])) ? $in['gender'] : null), $cx).'
 PARENT: '.LCRun2::raw(((is_array($in) && isset($in['name'])) ? $in['name'] : null), $cx).', '.LCRun2::raw(((is_array($in) && isset($in['value'])) ? $in['value'] : null), $cx).', '.LCRun2::raw(((is_array($in) && isset($in['end'])) ? $in['end'] : null), $cx).'
';}).'
';
}
?>