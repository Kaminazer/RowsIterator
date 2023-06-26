<?php

namespace Iterator;

class RowsIterator implements \Iterator
{
    protected string $pathFile;
    protected $file;
    protected int $index;
    public function __construct(string $pathFile)
    {
        $this->pathFile = $pathFile;
    }

    public function current(): string
    {
        return fgets($this->file);
    }

    public function next(): void
    {
        $this->index++;
    }

    public function key(): int
    {
        // TODO: Implement key() method.
        return $this->index;
    }

    public function valid(): bool
    {
        $checkFile = feof($this->file);
        if ($checkFile) {
            fclose($this->file);
            return false;
        }
        return true ;
    }

    public function rewind():void
    {
        $this->file = fopen($this->pathFile, "r");
        $this->index = 0;
    }
}