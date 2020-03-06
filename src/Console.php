<?php

namespace Console;

class Console
{
    /**
     * @var string
     */
    private $argumentIn;

    /**
     * @var string
     */
    private $argumentOut;

    /**
     * @var string
     */
    private $argumentLanguageToCheck;

    /**
     * @return string
     */
    public function getArgumentIn()
    {
        return $this->argumentIn;
    }

    /**
     * @param string $argumentIn
     */
    public function setArgumentIn($argumentIn)
    {
        $this->argumentIn = $argumentIn;
    }

    /**
     * @return string
     */
    public function getArgumentOut()
    {
        return $this->argumentOut;
    }

    /**
     * @param string $argumentOut
     */
    public function setArgumentOut($argumentOut)
    {
        $this->argumentOut = $argumentOut;
    }

    /**
     * @return string
     */
    public function getArgumentLanguageToCheck()
    {
        return $this->argumentLanguageToCheck;
    }

    /**
     * @param string $argumentLanguageToCheck
     */
    public function setArgumentLanguageToCheck($argumentLanguageToCheck)
    {
        $this->argumentLanguageToCheck = $argumentLanguageToCheck;
    }
}
