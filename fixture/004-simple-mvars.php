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
Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
Hello '.LCRun::enc('name', $cx, $in).', you have just won $'.LCRun::enc('value', $cx, $in).'!
';
}
?>