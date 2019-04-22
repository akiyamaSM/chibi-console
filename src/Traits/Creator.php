<?php


namespace Chibi\Console\Traits;


trait Creator
{
    /**
     * Get the default Namespace
     *
     * @return mixed
     */
    abstract public function getDefaultNameSpace();

    abstract public function handle($string, $extra = []);

    /**
     * Replace
     *
     * @param $string
     * @return mixed
     */
    protected function replace($string, $extra = [])
    {
        $string = str_replace('DefaultNamespace', $this->getDefaultNameSpace(), $string);

        return $this->handle($string, $extra);
    }

    /**
     * Get the path of the app
     *
     * @return string
     */
    protected function getAppPath()
    {
        return __DIR__. '/../../../../app/';
    }
}
