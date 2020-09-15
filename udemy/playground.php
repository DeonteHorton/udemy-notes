<?php 

class Employee {
    public $fired_laidOff = 50;
    static $males = 20;
    static $females = 10;
    protected $total;

        static function total_employees() {
            $total = Employee::$males + Employee::$females;
            return Employee::$males + Employee::$females;
        }

}
$employees = new Employee();
echo $employees::total_employees();
echo "<br>";

class Staff extends Employee{

    function get_data(){
        
    }
}
$get_info = new Staff();
echo "<h1>Heres the total: " . $get_info->total_employees() . "</h1>";
echo "<br>";
echo "<h1>The number of employees that where laid off or fired: " . $get_info->fired_laidOff . "</h1>";

?>