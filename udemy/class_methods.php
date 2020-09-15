<?php
class Cars{
    // this is how you keep track of the methods inside the class.
function gretting(){
    for ($i=0; $i < 25 ; $i++) { 
        echo "hello world";
        echo "<br>";
    }
    }
};
$the_methods = get_class_methods('Cars');
foreach ($the_methods as $method) {
    echo $method . '<br>';
}

$speak = new Cars();
echo $speak->gretting();
// $my_classes = get_declared_classes();
// foreach ($my_classes as $class) {
//     echo $class . "<br>";
// }
?>