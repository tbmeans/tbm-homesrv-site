<?php
// src/Controller/Card.php
namespace App\Controller;

class Card 
{
    public string $link;
    public bool $linkIsExt;
    public string $name;
    public ?string $misc;
    public ?string $iname;
    public ?string $ialt;

    public function __construct(string $link, string $name, ?string $misc,
            ?string $iname, ?string $ialt)
    {
        $this->link = $link;
        $this->linkIsExt = substr($link, 0, 4) == 'http';
        $this->name = $name;
        $this->misc = $misc;
        $this->iname = $iname;
        $this->ialt = $ialt;
    }
}
