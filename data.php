<?php


function print_month_schedule($year, $month) {
    // Количество дней в месяце
    $count_days_in_month = date('t', strtotime("$year-$month-01"));
    echo "В месяце $count_days_in_month дней\n";

    // Определяем первый день недели месяца
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
    echo "Первый день недели месяца $month - это $days_of_week[$day_of_week]\n";

    // Счётчик для работы с цветом
    $work_counter = 1;
    echo "Расписание для месяца $month $year:\n";

    // Выводим все дни месяца
    for ($day = 1; $day <= $count_days_in_month; $day++) {
        $current_day_of_week = date('w', strtotime("$year-$month-$day"));

        // Каждый 3 день выводим зеленым
        if ($work_counter % 3 == 1) {
            if ($current_day_of_week == 0 || $current_day_of_week == 6) {
                // Пропускаем выходные
                while ($current_day_of_week == 0 || $current_day_of_week == 6) {
                    $day++;
                    $current_day_of_week = date('w', strtotime("$year-$month-$day"));
                }
            }
            echo "\033[32m $day \033[0m" . " "; // Зеленый цвет для рабочих дней
        } else {
            echo "\033[31m $day \033[0m" . " "; // Красный цвет для нерабочих дней
        }
        $work_counter++;
    }
}

// Вызываем функцию
print_month_schedule(2025, 6);

?>

