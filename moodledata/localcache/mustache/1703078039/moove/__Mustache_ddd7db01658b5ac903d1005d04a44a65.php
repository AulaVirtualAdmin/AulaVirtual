<?php

class __Mustache_ddd7db01658b5ac903d1005d04a44a65 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<div class="table-search-input">
';
        $buffer .= $indent . '    <input class="form-control empty" type="text" placeholder="';
        $value = $this->resolveValue($context->find('placeholder'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '"/>
';
        $buffer .= $indent . '    <button class="search-button btn" type="button">
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->find('searchicon'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '    </button>
';
        $buffer .= $indent . '</div>
';

        return $buffer;
    }
}
