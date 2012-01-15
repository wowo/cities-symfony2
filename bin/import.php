<?php

try {
    $states = @$_SERVER['argv'][1];
    $cities = @$_SERVER['argv'][2];
    if (empty($states)) {
        throw new \Exception("States csv not specified!");
    }
    if (empty($cities)) {
        throw new \Exception("Cities csv not specified!");
    }
    $handle = fopen(__DIR__ . '/' . $states, 'r');
    $statesSQL = "INSERT INTO state(name, shortcut, capital, population) VALUES ";
    $valuesSQL = array();
    $headers = fgetcsv($handle);
    while ($data = fgetcsv($handle)) {
        $valuesSQL[] = $statesSQL . vsprintf("('%s', '%s', '%s', %d)", $data) . ';';
    }
    $statesSQL = implode(PHP_EOL, $valuesSQL);


    $handle = fopen(__DIR__ . '/' . $cities, 'r');
    $citiesSQL = "INSERT INTO city(name, rank, population, land_area, population_density, state_id) VALUES ";
    $valuesSQL = array();
    $headers = fgetcsv($handle);
    while ($data = fgetcsv($handle)) {
        $row = array_combine($headers, $data);
        $ordered = array($row['city'], $row['rank'], str_replace(',', '', $row['population']), 
            str_replace(',', '', $row['land_area']), str_replace(',', '', $row['density']), $row['state']);
        $valuesSQL[] = $citiesSQL . vsprintf("('%s', %d, %d, %.2f, %.2f , (SELECT id FROM state WHERE name = '%s'))", $ordered) . ';';
    }
    $citiesSQL = implode(PHP_EOL, $valuesSQL);
    
    printf("%s\n\n\n%s\n", $statesSQL, $citiesSQL);

} catch (\Exception $e) {
    printf("[%s] %s\n", get_class($e), $e->getMessage());
}
