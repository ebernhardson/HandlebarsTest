<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true,
        ),
        'scopes' => Array($in),
        'path' => Array(),
'funcs' => Array(
    'ifvar' => function ($var, $cx, $in) {
        $v = $cx['funcs']['val']($var, $cx, $in);
        return !is_null($v) && ($v !== false) && ($v !== 0) && ($v !== '') && (is_array($v) ? (count($v) > 0) : true);
    },
    'ifv' => function ($var, $cx, $in, $truecb, $falsecb = null) {
        $v = $cx['funcs']['val']($var, $cx, $in);
        $ret = '';
        if (is_null($v) || ($v === false) || ($v === 0) || ($v === '') || (is_array($v) && (count($v) == 0))) {
            if ($falsecb) {
                $cx['scopes'][] = $in;
                $ret = $falsecb($cx, $in);
                array_pop($cx['scopes']);
            }
        } else {
            if ($truecb) {
                $cx['scopes'][] = $in;
                $ret = $truecb($cx, $in);
                array_pop($cx['scopes']);
            }
        }
        return $ret;
    },
    'unl' => function ($var, $cx, $in, $truecb, $falsecb = null) {
        return $cx['funcs']['ifv']($var, $cx, $in, $falsecb, $truecb);
    },
    'isec' => function ($var, $cx, $in) {
        $v = $cx['funcs']['val']($var, $cx, $in);
        return is_null($v) || ($v === false);
    },
    'val' => function ($var, $cx, $in) {
        $levels = 0;

        if ($var === '@index') {
            return $cx['sp_vars']['index'];
        }
        if ($var === '@key') {
            return $cx['sp_vars']['key'];
        }
        $var = preg_replace_callback('/\\.\\.\\//', function($matches) use (&$levels) {
            $levels++;
            return '';
        }, $var);
        if ($levels > 0) {
            $pos = count($cx['scopes']) - $levels;
            if ($pos >= 0) {
                $in = $cx['scopes'][$pos];
            } else {
                return '';
            }
        }
        if (preg_match('/(.+?)\\.(.+)/', $var, $matched)) {
            if (array_key_exists($matched[1], $in)) {
                return $cx['funcs']['val']($matched[2], $cx, $in[$matched[1]]);
            } else {
                return null;
            }
        }
        return ($var === '') ? $in : (is_array($in) && isset($in[$var]) ? $in[$var] : null);
    },
    'raw' => function ($var, $cx, $in, $loop = false) {
        $v = $cx['funcs']['val']($var, $cx, $in);
        if ($v === true) {
            if ($cx['flags']['jstrue']) {
                return 'true';
            }
        }

        if ($loop && ($v === false)) {
            if ($cx['flags']['jstrue']) {
                return 'false';
            }
        }

        if (is_array($v)) {
            if ($cx['flags']['jsobj']) {
                if (count(array_diff_key($v, array_keys(array_keys($v)))) > 0) {
                    return '[object Object]';
                } else {
                    $ret = Array();
                    foreach ($v as $k => $vv) {
                        $ret[] = $cx['funcs']['raw']($k, $cx, $v, true);
                    }
                    return join(',', $ret);
                }
            }
        }

        return $v;
    },
    'enc' => function ($var, $cx, $in) {
        return htmlentities($cx['funcs']['raw']($var, $cx, $in), ENT_QUOTES);
    },
    'sec' => function ($var, &$cx, $in, $each, $cb) {
        $v = $cx['funcs']['val']($var, $cx, $in);
        $isary = is_array($v);
        $loop = $each;
        if (!$loop && $isary) {
            $loop = (count(array_diff_key($v, array_keys(array_keys($v)))) == 0);
        }
        if ($loop && $isary) {
            if ($each) {
                $is_obj = count(array_diff_key($v, array_keys(array_keys($v)))) > 0;
            } else {
                $is_obj = false;
            }
            $ret = Array();
            $cx['scopes'][] = $in;
            foreach ($v as $index => $raw) {
                $cx['sp_vars'][$is_obj ? 'key' : 'index'] = $index;
                $ret[] = $cb($cx, $raw);
            }
            unset($cx['sp_vars'][$is_obj ? 'key' : 'index']);
            array_pop($cx['scopes']);
            return join('', $ret);
        }
        if ($each) {
            return '';
        }
        if ($isary) {
            $cx['scopes'][] = $v;
            $ret = $cb($cx, $v);
            array_pop($cx['scopes']);
            return $ret;
        }
        if ($v === true) {
            return $cb($cx, $in);
        }
        if (is_string($v)) {
            return $cb($cx, Array());
        }
        if (!is_null($v) && ($v !== false)) {
            return $cb($cx, $v);
        }
        return '';
    },
    'wi' => function ($var, &$cx, $in, $cb) {
        $v = $cx['funcs']['val']($var, $cx, $in);
        if (($v === false) || ($v === null)) {
            return '';
        }
        $cx['scopes'][] = $in;
        $ret = $cb($cx, $v);
        array_pop($cx['scopes']);
        return $ret;
    },
)

    );
    ob_start();echo 'Hello ',$cx['funcs']['enc']('name', $cx, $in),', you have just won $',$cx['funcs']['enc']('value', $cx, $in),'!
each partial....
',$cx['funcs']['sec']('winners', $cx, $in, true, function($cx, $in) {echo '
  Hello ',$cx['funcs']['enc']('name', $cx, $in),', you have just won $',$cx['funcs']['enc']('value', $cx, $in),'!
This is next line.',$cx['funcs']['enc']('empty_var', $cx, $in),'中文
Test \on \'spacing in mustache: Hello ',$cx['funcs']['enc']('name', $cx, $in),', you have just won $',$cx['funcs']['enc']('value', $cx, $in),'!

--
  <div class="yui3-u-1-2 member-status">
 <ul class="h-list">
 ',$cx['funcs']['wi']('login_status', $cx, $in, function($cx, $in) {echo '
  ';if ($cx['funcs']['ifvar']('is_login', $cx, $in)){echo '
   <li><a href="',$cx['funcs']['enc']('edit_account_link', $cx, $in),'">Hello ',$cx['funcs']['enc']('username', $cx, $in),'</a></li>
   <li><a href="',$cx['funcs']['enc']('logut_link', $cx, $in),'">Logout</a></li>
  ';}else{echo '';}echo '
  ';if (!$cx['funcs']['ifvar']('is_login', $cx, $in)){echo '
   <li>New User? <a href="',$cx['funcs']['enc']('register_link', $cx, $in),'">Register Now</a></li>
   <li><a href="',$cx['funcs']['enc']('login_link', $cx, $in),'">Login</a></li>
  ';}else{echo '';}echo '
 ';}),'
  <li><a>About Auction</a></li>
 </ul>
</div>

';}),'
end each.

if + with + partial:
';if ($cx['funcs']['ifvar']('test', $cx, $in)){echo '
w>',$cx['funcs']['wi']('people', $cx, $in, function($cx, $in) {echo '
  p>Hello ',$cx['funcs']['enc']('name', $cx, $in),', you have just won $',$cx['funcs']['enc']('value', $cx, $in),'!
This is next line.',$cx['funcs']['enc']('empty_var', $cx, $in),'中文
Test \on \'spacing in mustache: Hello ',$cx['funcs']['enc']('name', $cx, $in),', you have just won $',$cx['funcs']['enc']('value', $cx, $in),'!
<
<w';}),'
';}else{echo '';}echo '
';return ob_get_clean();
}
?>