<?php
echo "hello1</br>";
echo "hello2</br>";
ob_start();
echo "hello3</br>";
echo "hello4</br>";
$content= ob_get_clean();
echo "<hr>";
echo "hello5</br>";
echo "hello6</br>";
echo "hello7</br>";
echo "<hr>";
echo $content;

?>