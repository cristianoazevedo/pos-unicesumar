<?php
declare(strict_types=1);

namespace App\Application\Actions;

class ActionView
{
    /**
     * @var string
     */
    private $template;

    /**
     * @var array|object|null
     */
    private $data;

    /**
     * @var int
     */
    private $statusCode;

    /**
     * ActionView constructor.
     * @param $data
     * @param string $template
     * @param int $statusCode
     */
    public function __construct($data, string $template, int $statusCode = 200)
    {
        $this->data = $data;
        $this->template = $template;
        $this->statusCode = $statusCode;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @return array|object|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}
