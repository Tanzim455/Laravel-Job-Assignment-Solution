<?php 

$data = [
    ['question_id' => 1, 'answer_id' => 101],
    ['question_id' => 2, 'answer_id' => 102],
    // ... more data
];
$response_id = [
    ['question_id' => 1, 'answer_id' => 102],
];
$filtered_array = array_filter($data, function($q) {
    return $q['question_id'] === 1;
});


print_r($filtered_array);
 $key = array_keys($filtered_array)[0]; // PHP 7.3+

 var_dump($key);


  $main_array = $filtered_array[$key]; // Use null coalescing in case the key doesn't exist
 
  print_r($main_array);
 $merge_response_id=array_merge(...$response_id);
 $diff = array_diff($main_array, $merge_response_id);

 print_r($diff);
 if(count($diff)===0){
    echo "Count is 0";
 }else{
    echo "Wrong answer";
 }