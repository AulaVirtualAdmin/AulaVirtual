<?php

class __Mustache_355dc8e7c9c350344a62e7636d312511 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        if ($partial = $this->mustache->loadPartial('local_edwiserreports/blocks/gradeblockfilters')) {
            $buffer .= $partial->renderInternal($context);
        }

        return $buffer;
    }
}
