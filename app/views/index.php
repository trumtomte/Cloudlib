<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>index_test</title>
</head>
<body>
<?php
    echo '<br>';
    echo timer::boot();
    echo '<br>';
    echo '<pre>';
    debug_print_backtrace();
    echo '<br>';
    echo '</pre>';
    if(isset($error))
        echo $error;
    echo '<br>' . PHP_EOL;
    echo $this->form->create('/cloudlib/index/upload', array('type' => 'file'));
    echo $this->form->input('file[]', array('type' => 'file'));
    echo '<br>';
    echo $this->form->input('file[]', array('type' => 'file'));
    echo '<br>';
    echo $this->form->button('upload');
    echo $this->form->close();
    echo '<pre>';
    echo print_r($_SERVER);
    echo '</pre>';
    echo '<pre>';
    echo print_r($_REQUEST);
    echo '</pre>';
    echo '<br>';
    echo $test;
    echo '<br>';
?>
</body>
</html>
