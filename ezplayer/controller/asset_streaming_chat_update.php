<?php

/**
 * Refreshes the whole chat (all messages are reloaded)
 * @global array $input
 * @global type $repository_path
 * @global type $chat_messages
 * @param type $display
 * @return boolean
 */
function index($param = array()) {
    global $input;
    global $repository_path;
    global $chat_messages;

    $display = (count($param) == 0 || $param[0]);
    
    ezmam_repository_path($repository_path);

    $album = $input['album'];
    $asset = $input['asset'];

    if (!isset($album) || $album == '' || $album == 'undefined') {
        $album = $_SESSION['album'];
    }

    if (!isset($asset) || $asset == '' || $asset == 'undefined') {
        $asset = $_SESSION['asset'];
    }
    $asset_meta = ezmam_asset_metadata_get($album, $asset);

    $chat_messages = messages_select_by_asset($album, $asset_meta['record_date'], $asset);
    // $chat_messages = chat_messages_remove_private($chat_messages);

    $last_message = end($chat_messages);
    if (isset($last_message['id'])) {
        $_SESSION['last_chat_message'] = $last_message['id'];
    }
    $_SESSION['last_chat_update'] = date('Y-m-d H:i:s');

    if ($display) {
        include_once template_getpath('div_chat.php');
        return true;
    } else {
        return $chat_messages;
    }
}