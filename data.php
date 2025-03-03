<?php

$year = 2025;
$month = 3;


$count_days_in_month = date('t', strtotime("$year-$month-01"));

echo "В месяце $count_days_in_month дней" . PHP_EOL;

$day_of_week = date('w', strtotime("$year-$month-01"));

$days_of_week = [
    0 => 'Воскресенье',
    1 => 'Понедельник',
    2 => 'Вторник',
    3 => 'Среда',
    4 => 'Четверг',
    5 => 'Пятница',
    6 => 'Суббота',
];

echo "Первый день недели месяца $month - это $days_of_week[$day_of_week]" . PHP_EOL;

$work_counter = 1;

echo "Расписание для месяца $month $year:\n";
for ($day = 1; $day <= $count_days_in_month; $day++) {
    $current_day_of_week = date('w', strtotime("$year-$month-$day"));
    if ($work_counter % 3 == 1) {
        if ($current_day_of_week == 0 || $current_day_of_week == 6) {
            while ($current_day_of_week == 0 || $current_day_of_week == 6) {
                $day++;
                $current_day_of_week = date('w', strtotime("$year-$month-$day"));
            }
        }
        echo "\033[32m $day \033[0m" . " ";
    } else {
        echo "$day" . " ";
    }
    $work_counter++;
}


?>

