<?php

namespace App\Enums;

enum IncidentMediaType: string
{
    case External = "external";
    case Embed    = "embed";
    case Url      = "url";
    case Video    = "video";
    case Image    = "image";
    case Document = "document";

    public function isLocalFile(): bool
    {
        return in_array($this->value, [
            self::Document,
            self::Image,
            self::Video
        ]);
    }
}
