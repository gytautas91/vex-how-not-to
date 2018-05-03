<?php
require('database.php');
require('helpers.php');


if (isset($_POST['delete_selected'])) {

    if (!empty($_POST['documents'])) {
        $db = new Database();
        foreach (array_keys($_POST['documents']) as $id) {
            $db->query("DELETE FROM documents WHERE id=".$id);
        }
    }

    redirect(build_url([
        'page' => 'documents',
        'success' => 'Selected documents were deleted'
    ]));
}



$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["attached_document"]["name"]);

if ($_FILES["attached_document"]["size"] > 500000) {
    redirect(build_url([
        'page' => 'new_document',
        'error' => 'Sorry, your file is too large.'
    ]));

} else if (move_uploaded_file($_FILES["attached_document"]["tmp_name"], $target_file)) {
    $db = new Database();
    $db->insert('documents',  $_POST['document'] + ['user_id' => userId(), 'document' => basename( $_FILES["attached_document"]["name"])]);

    redirect(build_url([
        'page' => 'new_document',
        'success' => 'The file '. basename( $_FILES["attached_document"]["name"]). ' has been uploaded',
    ]));
} else {
    redirect(build_url([
        'page' => 'new_document',
        'error' => 'Something went wrong. Try again or contact administrator',
    ]));
}

?>