<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Data</title>
</head>
<body>
    <h1>Customer Data Array</h1>
    <p><?php echo '<pre>' , print_r($data) , '</pre>' ?></p>
    <form class="upload-customers-form" action="" method="POST" enctype="multipart/form-data">        
        <input type="file" required class="required-entry" name="upload_file" id="upload_file" />
        <input type='submit' name='submit' value='Upload Customer Data'>
    </form>
</body>
</html>