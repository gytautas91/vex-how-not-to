<?php include('header.php') ?>

<?php
$db = new Database();
$results = $db->select('documents', '*', ['user_id' => userId()]);

?>

<div class="ui container">
    <br>
    <?php include('innerHeader.php'); ?>
    <h1>Documents</h1>
    <form method="post" action="/document_manager.php?<?= http_build_query($_GET) ?>">
        <div class="ui compact menu">
            <a href="/index.php?<?= http_build_query(['page' => 'new_document', 'session' => $_GET['session']]) ?>" class="item">
                <i class="plus icon"></i>
                New document
            </a>
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
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Address</th>
                    <th>Bank</th>
                    <th>Account number</th>
                    <th>Issued sum</th>
                    <th>Date from</th>
                    <th>Date until</th>
                    <th>Comment</th>
                    <th>Person document / ID</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($row = $results->fetch_assoc()) { ?>
                    <tr>
                        <td><input type="checkbox" name="documents[<?= $row['id'] ?>]"/></td>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['firstname'] ?></td>
                        <td><?= $row['lastname'] ?></td>
                        <td><?= $row['address'] ?></td>
                        <td><?= $row['bank'] ?></td>
                        <td><?= $row['account_number'] ?></td>
                        <td><?= $row['issued_sum'] ?></td>
                        <td><?= $row['date_from'] ?></td>
                        <td><?= $row['date_until'] ?></td>
                        <td><?= $row['comment'] ?></td>
                        <td><a target="_blank" href="/uploads/<?= $row['document'] ?>"> <?= $row['document'] ?> </a>
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
