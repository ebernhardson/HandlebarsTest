<?php return function ($in) {
    $cx = Array(
        'flags' => Array(
            'jstrue' => true,
            'jsobj' => true
        ),
        'path' => Array(),
        'parents' => Array()
    );
    return 'Hello '.(($in['name'] === true) ? 'true' : htmlentities($in['name'], ENT_QUOTES)).', you have just won $'.(($in['value'] === true) ? 'true' : htmlentities($in['value'], ENT_QUOTES)).'!
Hello '.(($in['name'] === true) ? 'true' : htmlentities($in['name'], ENT_QUOTES)).', you have just won $'.(($in['value'] === true) ? 'true' : htmlentities($in['value'], ENT_QUOTES)).'!
Hello '.(($in['name'] === true) ? 'true' : htmlentities($in['name'], ENT_QUOTES)).', you have just won $'.(($in['value'] === true) ? 'true' : htmlentities($in['value'], ENT_QUOTES)).'!
Hello '.(($in['name'] === true) ? 'true' : htmlentities($in['name'], ENT_QUOTES)).', you have just won $'.(($in['value'] === true) ? 'true' : htmlentities($in['value'], ENT_QUOTES)).'!
Hello '.(($in['name'] === true) ? 'true' : htmlentities($in['name'], ENT_QUOTES)).', you have just won $'.(($in['value'] === true) ? 'true' : htmlentities($in['value'], ENT_QUOTES)).'!
Hello '.(($in['name'] === true) ? 'true' : htmlentities($in['name'], ENT_QUOTES)).', you have just won $'.(($in['value'] === true) ? 'true' : htmlentities($in['value'], ENT_QUOTES)).'!
Hello '.(($in['name'] === true) ? 'true' : htmlentities($in['name'], ENT_QUOTES)).', you have just won $'.(($in['value'] === true) ? 'true' : htmlentities($in['value'], ENT_QUOTES)).'!
Hello '.(($in['name'] === true) ? 'true' : htmlentities($in['name'], ENT_QUOTES)).', you have just won $'.(($in['value'] === true) ? 'true' : htmlentities($in['value'], ENT_QUOTES)).'!
Hello '.(($in['name'] === true) ? 'true' : htmlentities($in['name'], ENT_QUOTES)).', you have just won $'.(($in['value'] === true) ? 'true' : htmlentities($in['value'], ENT_QUOTES)).'!
Hello '.(($in['name'] === true) ? 'true' : htmlentities($in['name'], ENT_QUOTES)).', you have just won $'.(($in['value'] === true) ? 'true' : htmlentities($in['value'], ENT_QUOTES)).'!
Hello '.(($in['name'] === true) ? 'true' : htmlentities($in['name'], ENT_QUOTES)).', you have just won $'.(($in['value'] === true) ? 'true' : htmlentities($in['value'], ENT_QUOTES)).'!
';
}
?>