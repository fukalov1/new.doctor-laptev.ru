<?php

namespace App\Lib\Logs;

use Illuminate\Support\Facades\Log;

class LogService
{
    protected $logger;
    protected $log_type;
    protected $text;
    protected $data;

    public function __construct($channel, $log_type = '')
    {
        $this->logger = Log::channel($channel);
        $this->log_type = $log_type;
    }

    public function setText($text) {
        $this->text = $text;
        return $this;
    }

    public function getText() {
        return $this->log_type . $this->text;
    }

    public function setData($data) {
        $this->data = $data;
        return $this;
    }

    public function getData() {
        return  $this->data;
    }

    public function logAlert() {
        $this->logger->alert($this->log_type . $this->text . "\n");
    }

    public function logDebug() {
        $this->logger->debug($this->log_type . $this->text . "\n");
    }

    public function logError() {
        $this->logger->error($this->log_type . $this->text . "\n");
    }

    public function logAlertWithData() {
        $this->logger->alert($this->compareData());
    }

    public function logDebugWithData() {
        $this->logger->debug($this->compareData());
    }

    public function logErrorWithData() {
        $this->logger->error($this->compareData());
    }

    private function compareData() {
        return $this->log_type . $this->text.': '. json_encode($this->data, JSON_UNESCAPED_UNICODE) . "\n";
    }

}
