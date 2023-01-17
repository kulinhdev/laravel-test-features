<?php
if (!function_exists('writeLog')) {
    function writeLog(string $message, array $context = [])
    {
        $date = date('Y-m-d');
        $dateTime = date('Y-m-d H:i:s');
        $logFile = storage_path("logs/{$date}.log");
        if (!file_exists($logFile)) {
            touch($logFile);
        }

        if (!empty($context))
            $data = print_r($context, true);

        $logData = "Log at:::: " . $dateTime . " ::: message: {$message}\n :::" . $data . PHP_EOL;
        file_put_contents($logFile, $logData, FILE_APPEND);
    }
}
?>
