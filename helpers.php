<?php
function is_authorized() {
    return isset($_GET['session']);
}
function userId () {
    if (is_authorized()) {
        return decode($_GET['session'])->user[0];
    }
    return 0;
}
function d($args, $exit = true) {
    echo "<pre>"; print_r($args); if($exit) exit();
}
function encode(array $data) {
    return base64_encode(json_encode($data));
}
function decode($data) {
    return json_decode(base64_decode($data));
}
function redirect($url) {
    header('Location: '.$url);
    die();
}
function is_page_active($match, $className = 'active') {
    return isset($_GET['page']) && $_GET['page'] == $match ? $className : '';
}
function build_url (array $params) {
    unset($params['success']);
    unset($params['error']);
    return 'index.php?'.http_build_query($params+$_GET);
}
function error() {
    if (isset($_GET['error'])) {
        $error = '
        <div class="ui negative message">
            <div class="header">
                Error !
            </div>
            <p>'.$_GET['error'].'</p>
        </div>';
        unset($_GET['error']);
        return $error;
    }
    return '';
}
function success() {
    if (isset($_GET['success'])) {
        $success = '
        <div class="ui positive message">
            <div class="header">
                Success !
            </div>
            <p>'.$_GET['success'].'</p>
        </div>';
        unset($_GET['success']);
        return $success;
    }
    return '';
}
?>
