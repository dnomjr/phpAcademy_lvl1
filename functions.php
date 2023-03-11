<?php

/**
 * Just debugger
 */
require_once 'vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


/**
 * Sprav zakladny php skript, ktory vypise ahoj
 *
 * @return string
 */
function base_script()
{
    echo "Hello WEZEO!";
}


/**
 * Vypis aktualny datum a cas naformatovany
 *
 * @return string
 */
function actual_date()
{
    return date('d.m.Y, H:i:s');
}


/**
 * Vytvori novy subor, ak uz existuje tak vrati false.
 *
 * @param string $filename
 * @return boolean
 */
function mkfile( $filename )
{
    if ( ! is_file( $filename ))
    {
        fclose(fopen( $filename, 'x'));
        return true;
    }
        return false;
}


/**
 * Ukladaj aktualny datum a cas do suboru (ak uz v subore existuje datum a cas, novy cas sa pripise), kazdy zaznam daj na novy riadok
 *
 * Ak prisiel student po 8:00, tak dopis do logu za cas string "meskanie"
 * 
 * Ak pride student medzi 20-24, tak vyhod chybu cez die, ze nemoze sa dany prichod zapisat
 * 
 * @param string $log_file
 * @param string $time
 * @return string
 */
function write_data($filename, $time, $late, $welcome)
{
    if ($late)
    {
        return file_put_contents($filename, "$time You are too late!" . PHP_EOL, FILE_APPEND); 
    }

    elseif ($welcome)
    {
        return file_put_contents($filename, "$time You are welcome!" . PHP_EOL, FILE_APPEND);
    }

    else
    {
        die ("You are too late! Door between 20:00 and 23:59 are closed");
    } 
}
    

/**
 * Getuj obsah log suboru a vypis ho
 *
 * @param string $log_file
 * @return string
 */
function read_data($filename)
{
    return file_get_contents( $filename );
}
?>