<?php
require_once '../vendor/autoload.php';

$total_time = 0;
$startTime = microtime(true);

for($x = 0; $x < 500; $x++)
{
	$script = 'var str_test = "hey";var int_test = 500;var float_test = 100.37;var array_test = {"name": "test"}; var func_test = add(1, 2);var nested_test = &array_test.name;var bool_test = true; var test_assignment = 1 + 4;';

	$functions = [];
	$functions['add'] = function($one, $two) { return (int)$one + (int)$two; };

	$parser = new \onembsite\onembcode\Parser($script, $functions);
	// $startTime = microtime(true);
	$parser->parse();
	// $total_time += (microtime(true) - $startTime);
}

// var_dump($total_time);
echo "Average compile time (500 executions) is: ". /*($total_time / $x)*/ (microtime(true) - $startTime) ." seconds" . PHP_EOL;