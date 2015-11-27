<?php

namespace steevanb\FormUtils\Field;

class Number extends AbstractField
{
    use Behavior\FormTypeTrait;
    use Behavior\GroupingTrait;
    use Behavior\ScaleTrait;
    use Behavior\RoundingModeTrait;
    use Behavior\PlaceHolderTrait;
    use Behavior\AutofocusTrait;
    use Behavior\AutocompleteTrait;
}
