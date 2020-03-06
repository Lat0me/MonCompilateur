<?php

namespace CompilateurController;

use Console\Console;
use Console\Tokenisation;

class CompilateurController
{
    /**
     * @param $argument
     * @return Console
     */
    public function start($argument, $dir) {
        $console = new Console();

        $this->parseConsoleCommand($argument, $console);
        $fileContent = $this->parseFile($console, $dir);

        $this->tokenisation($console, $fileContent);
    }

    /**
     * @param array $arguments
     * @param Console $console
     * @return int
     */
    private function parseConsoleCommand(Array $arguments, Console $console)
    {
        if (count($arguments) <= 0) {
            return E_ERROR;
        }

        foreach ($arguments as $key => $value) {
            if ($key === 1) {
                $console->setArgumentIn($value);
            }

            if ($key === 2) {
                $console->setArgumentOut($value);
            }
        }
    }

    private function parseFile(Console $console, $dir)
    {
        $path_file = $dir . '\in\\' . $console->getArgumentIn();

        $fileContent = file_get_contents($path_file, true);

        return $fileContent;
    }

    private function tokenisation($console, $fileContent)
    {
        $token = new Tokenisation();

        $token->token($fileContent);
    }
}
