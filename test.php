
<?php
echo "<pre>";
function getResult($inputArray) {
    
    // Sort intervals based on the start time
    usort($inputArray, function($a, $b) {
        return $a[0] - $b[0];
    });
	
    $tempArray = [];
    $tempArray[] = $inputArray[0];

    // Iterate through the intervals
    for ($i = 1; $i < count($inputArray); $i++) {
        $currentInterval = $inputArray[$i];
        $lastMergedInterval = &$tempArray[count($tempArray) - 1];

        // If current interval overlaps with the last merged interval, merge them
        if ($currentInterval[0] <= $lastMergedInterval[1]) {
            $lastMergedInterval[1] = max($currentInterval[1], $lastMergedInterval[1]);
        } else {
            // If current interval doesn't overlap, add it to the merged array
            $tempArray[] = $currentInterval;
        }
    }

    return $tempArray;
}

$inputData = [[6,8],[1,9],[2,4],[4,7]];

echo "Input Array: "."</br>";
print_r($inputData);
echo "Output Array: "."</br>";
print_r(getResult($inputData));


?>

