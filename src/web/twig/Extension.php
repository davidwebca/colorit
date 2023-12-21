<?php
namespace presseddigital\colorit\web\twig;

use presseddigital\colorit\Colorit;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

use Craft;

class Extension extends AbstractExtension
{
    protected $colors;

    // Public Methods
    // =========================================================================

    public function __construct()
    {
        $this->colors = Colorit::$plugin->getColors();
    }

    public function getName(): string
    {
        return 'Colorit Twig Extensions';
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('hexIsWhite', [$this->colors, 'hexIsWhite']),
            new TwigFilter('hexIsBlack', [$this->colors, 'hexIsBlack']),
            new TwigFilter('hexIsTransparent', [$this->colors, 'hexIsTransparent']),
            new TwigFilter('hexToRgb', [$this->colors, 'hexToRgb']),
            new TwigFilter('hexToRgba', [$this->colors, 'hexToRgba']),
        ];
    }
}
