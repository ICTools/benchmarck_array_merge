<?php

function generateTestData($size, $valuesPerItem) {
    $data = [];
    for ($i = 0; $i < $size; $i++) {
        $data[] = ['values' => range(1, $valuesPerItem)];
    }
    return $data;
}

function methodOne($data) {
    $result = [];
    foreach ($data as $item) {
        $result = array_merge($result, $item['values']);
    }
    return $result;
}

function methodTwo($data) {
    $result = [];
    foreach ($data as $item) {
        $result[] = $item['values'];
    }
    return array_merge(...$result);
}

function testComparison($data) {
    $start1 = microtime(true);
    $result1 = methodOne($data);
    $time1 = microtime(true) - $start1;

    $start2 = microtime(true);
    $result2 = methodTwo($data);
    $time2 = microtime(true) - $start2;

    return [
        'time_method_one' => $time1,
        'time_method_two' => $time2,
    ];
}

$data = generateTestData(10000, 100); 

$result = testComparison($data);

echo "Method 1 time: " . $result['time_method_one'] . " seconds\n";
echo "Method 2 time: " . $result['time_method_two'] . " seconds\n";
