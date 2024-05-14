<?php

namespace App\Blockchain;
class Block
{
    public $timestamp;
    public $data;
    public $previousHash;
    public $hash;

    public function __construct(string $timestamp, $data, string $previousHash = '')
    {

        $this->timestamp = $timestamp;
        $this->data = $data;
        $this->previousHash = $previousHash;
        $this->hash = $this->calculateHash();
    }

    public function calculateHash(): string
    {
        return hash(
            'sha256',
            sprintf(
                '%s%s%s',
                strval($this->timestamp), // Assuming timestamp is a string or can be cast to a string
                strval($this->previousHash), // Assuming previousHash is a string or can be cast to a string
                is_string($this->data) ? $this->data : json_encode($this->data), // Ensuring data is a string or serialized if it's an object/array
            )
        );
    }
}
