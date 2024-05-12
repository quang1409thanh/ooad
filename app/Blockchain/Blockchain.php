<?php

namespace App\Blockchain;
class Blockchain
{
    private static $instance = null;
    public $chain;

    public function __construct()
    {
        $this->chain = $this->loadChainFromDatabase();
        // echo "<br>";
        // print_r($this->chain);
        if (empty($this->chain)) {
            $this->addBlock($this->createGenesisBlock());
        }
    }


    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Blockchain();
        }
        return self::$instance;
    }

    private function loadChainFromDatabase(): array
    {
        $chain = \App\Models\Blockchain::all()->toArray();
        // Chuyển đổi mỗi bản ghi trong $chain thành đối tượng Block
        $blocks = [];
        foreach ($chain as $row) {
            $block = new Block($row['timestamp'], $row['data'], $row['previous_hash']);
            $block->hash = $row['hash'];
            $blocks[] = $block;
        }

        return $blocks;
    }

    private function createGenesisBlock(): Block
    {
        return new Block(0, '01/01/2023', '0', '0');
    }

    public function getLatestBlock(): ?Block
    {
        if (!empty($this->chain)) {
            return $this->chain[count($this->chain) - 1];
        }
        return null; // Return null or handle this case based on your logic
    }


    public function addBlock(Block $newBlock): void
    {
        if (empty($this->chain)) {
            $this->chain[] = $newBlock;
            $this->insertBlockData($newBlock);
        } else {
            $latestBlock = $this->getLatestBlock();
            $newBlock->previousHash = $latestBlock->hash;
            $newBlock->hash = $newBlock->calculateHash();
            $this->chain[] = $newBlock;
            $this->insertBlockData($newBlock);
        }
    }


    private function insertBlockData(Block $block): void
    {
        \App\Models\Blockchain::create([
            'timestamp' => $block->timestamp,
            'data' => $block->data,
            'previous_hash' => $block->previousHash,
            'hash' => $block->hash,
        ]);
    }

    public function isChainValid(): bool
    {
        $chainLength = count($this->chain);

        if ($chainLength === 0) {
            return true; // No blocks in the chain
        }

        // Check genesis block separately
        if ($chainLength >= 1) {
            $firstBlock = $this->chain[0];
            if ($firstBlock->previousHash != '0') {
                return false; // Genesis block's previous hash should be '0' or an empty string
            }
        }


        if ($chainLength <= 1) {
            return true; // If there's only the genesis block, it's valid
        }


        // Check other blocks in the chain
        for ($i = 1; $i < $chainLength; $i++) {
            $currentBlock = $this->chain[$i];
            $previousBlock = $this->chain[$i - 1];

            if ($currentBlock->hash !== $currentBlock->calculateHash()) {
                return false;
            }


            if ($currentBlock->previousHash !== $previousBlock->hash) {
                return false;
            }
        }

        return true;
    }


    public function getBlockchainData(): array
    {
        $blockchainData = [];

        foreach ($this->chain as $index => $block) {
            $status = $this->isBlockValid($block, $index) ? 'Valid' : 'Altered';

            $blockData = [
                'Block Index' => $index,
                'Timestamp' => $block->timestamp,
                'Data' => json_encode($block->data),
                'Previous Hash' => $block->previousHash,
                'Hash' => $block->hash,
                'Status' => $status,
            ];

            $blockchainData[] = $blockData;
        }

        return $blockchainData;
    }


    private function isBlockValid(Block $block, int $index): bool
    {
        if ($index === 0) {
            return true; // Genesis block is always considered valid
        }

        $previousBlock = $this->chain[$index - 1];

        return $block->hash === $block->calculateHash() && $block->previousHash === $previousBlock->hash;
    }
}
