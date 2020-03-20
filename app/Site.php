<?php


namespace App;


class Site
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var string
     */
    protected $id;

    public function __construct($id)
    {
        $this->setConfig(config('sites.'.$id));
        $this->id = $id;
    }

    /**
     * @param string $path
     * @return Site|null
     */
    public static function createByUrlPath(string $path):? Site
    {
        if(isset(config('sites.paths')[$path])) {
            return new self(config('sites.paths')[$path]);
        }
        return null;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->config['name'];
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->config['url'];
    }

    /**
     * @param string $color
     * @param string $default
     * @return string
     */
    public function getColor(string $color, string $default = ''): string
    {
        $result = $default;
        if(isset($this->getColors()[$color])) {
            $result = $this->getColors()[$color];
        }
        return $result;
    }

    /**
     * @return array
     */
    public function getColors(): array
    {
        return $this->config['colors'];
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config): void
    {
        $this->config = $config;
    }





}
