<?php include('header.php') ?>

<?php
$db = new Database();
$results = $db->select('contacts', '*', ['user_id' => userId()]);

?>

<div class="ui container">
    <br>
    <?php include('innerHeader.php'); ?>
    <h1>Contacts</h1>
    <form method="post" action="/document_manager.php?<?= http_build_query($_GET) ?>">
        <div class="ui compact menu">
            <button type="submit" name="delete_selected" class="item">
                <i class="eraser icon"></i>
                Delete selected
            </button>
        </div>
        <div class="ui divider"></div>
        <br>
        <?= error() ?>
        <?= success() ?>
        <div class="ui grid">
            <table class="ui single line table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($row = $results->fetch_assoc()) { ?>
                    <tr>
                        <td><input type="checkbox" name="documents[<?= $row['id'] ?>]"/></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td><?= $row['message'] ?></td>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>
    </form>
</div>

</body>
</html>
