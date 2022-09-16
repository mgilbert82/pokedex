<?php

class Pokemon
{

    private int $id;
    private int $number;
    private string $name;
    private string $description;
    private string $type1;
    private string $type2;
    private string $image_url;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): Pokemon
    {
        $this->id = $id;

        return $this;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber($number): Pokemon
    {
        if ($number < 800) {
            $this->number = $number;
        }
        return $this;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): Pokemon
    {
        if (strlen($name) > 3) {
            $this->name = $name;
        }
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription($description): Pokemon
    {
        if (is_string($description) && strlen($description) > 10) {
            $this->description = $description;
        }
        return $this;
    }

    public function getType1(): string
    {
        return $this->type1;
    }

    public function setType1($type1): Pokemon
    {
        $this->type1 = $type1;

        return $this;
    }

    public function getType2(): string
    {
        return $this->type2;
    }

    public function setType2($type2): Pokemon
    {
        $this->type2 = $type2;

        return $this;
    }

    public function getImage_url(): string
    {
        return $this->image_url;
    }

    public function setImage_url($image_url): Pokemon
    {
        $this->image_url = $image_url;

        return $this;
    }
}
