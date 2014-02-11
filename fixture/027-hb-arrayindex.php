<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'scopes' => Array($in),
        'path' => Array(),

    );
    return 'Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!

##0 start section:
'.LCRun::sec('winners', $cx, $in, false, function($cx, $in) {return '
  - EACH 1- '.LCRun::enc('name', $cx, $in).'
';}).'
end section.

##1 start each:
'.LCRun::sec('winners', $cx, $in, true, function($cx, $in) {return '
  - EACH 2 - '.LCRun::enc('name', $cx, $in).'
';}).'
end each.

##3 Index
Index ?: '.LCRun::enc('winners.name', $cx, $in).'
Index 0: '.LCRun::enc('winners.0.name', $cx, $in).'
Index 1: '.LCRun::enc('winners.1.name', $cx, $in).'
';
}
?>