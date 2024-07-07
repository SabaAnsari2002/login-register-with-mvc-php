<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Insert Method</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Choose Insert Method</h2>

        <!-- Display success message -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('success') ?>
            </div>
        <?php endif; ?>

        <!-- Display error message -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('index.php/insertmethod/submit_method') ?>">
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-block" name="method" value="text_editor">Insert Data with Text Editor</button>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-secondary btn-block" name="method" value="text_file">Update Data from Text File</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
