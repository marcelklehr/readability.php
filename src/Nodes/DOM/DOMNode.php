<?php

namespace marcelklehr\Readability\Nodes\DOM;

use marcelklehr\Readability\Nodes\NodeTrait;

/**
 * @method getAttribute($attribute)
 * @method hasAttribute($attribute)
 */
class DOMNode extends \DOMNode
{
    use NodeTrait;
}
