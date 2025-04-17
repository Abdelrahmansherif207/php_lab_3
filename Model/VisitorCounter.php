<?php

class VisitorCounter
{
    private  $file;

    public function __construct( $file)
    {
        $this->file = $file;

        if (!file_exists($this->file)) {
            file_put_contents($this->file, 0);
        }

        if (!$this->isCounted()) {
            $this->increment();
            $this->markAsCounted();
        }
    }

    private function isCounted(): bool
    {
        return isset($_SESSION['is_counted']) && $_SESSION['is_counted'] === true;
    }

    private function markAsCounted(): void
    {
        $_SESSION['is_counted'] = true;
    }

    private function increment(): void
    {
        $count = $this->getCount();
        $count++;
        file_put_contents($this->file, $count);
    }

    public function getCount()
    {
        return (int)file_get_contents($this->file);
    }
}
