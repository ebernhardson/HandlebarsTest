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
    return 'Hello '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq((is_array($in) ? $in['value'] : null), $cx).'!
each partial....
'.LCRun2::sec((is_array($in) ? $in['winners'] : null), $cx, $in, true, function($cx, $in) {return '
  Hello '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq((is_array($in) ? $in['value'] : null), $cx).'!
This is next line.'.LCRun2::encq((is_array($in) ? $in['empty_var'] : null), $cx).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq((is_array($in) ? $in['value'] : null), $cx).'!

--
  <div class="yui3-u-1-2 member-status">
 <ul class="h-list">
 '.LCRun2::wi((is_array($in) ? $in['login_status'] : null), $cx, $in, function($cx, $in) {return '
  '.((LCRun2::ifvar((is_array($in) ? $in['is_login'] : null))) ? '
   <li><a href="'.LCRun2::encq((is_array($in) ? $in['edit_account_link'] : null), $cx).'">Hello '.LCRun2::encq((is_array($in) ? $in['username'] : null), $cx).'</a></li>
   <li><a href="'.LCRun2::encq((is_array($in) ? $in['logut_link'] : null), $cx).'">Logout</a></li>
  ' : '').'
  '.((!LCRun2::ifvar((is_array($in) ? $in['is_login'] : null))) ? '
   <li>New User? <a href="'.LCRun2::encq((is_array($in) ? $in['register_link'] : null), $cx).'">Register Now</a></li>
   <li><a href="'.LCRun2::encq((is_array($in) ? $in['login_link'] : null), $cx).'">Login</a></li>
  ' : '').'
 ';}).'
  <li><a>About Auction</a></li>
 </ul>
</div>

';}).'
end each.

if + with + partial:
'.((LCRun2::ifvar((is_array($in) ? $in['test'] : null))) ? '
w>'.LCRun2::wi((is_array($in) ? $in['people'] : null), $cx, $in, function($cx, $in) {return '
  p>Hello '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq((is_array($in) ? $in['value'] : null), $cx).'!
This is next line.'.LCRun2::encq((is_array($in) ? $in['empty_var'] : null), $cx).'中文
Test \on \'spacing in mustache: Hello '.LCRun2::encq((is_array($in) ? $in['name'] : null), $cx).', you have just won $'.LCRun2::encq((is_array($in) ? $in['value'] : null), $cx).'!
<
<w';}).'
' : '').'
';
}
?>