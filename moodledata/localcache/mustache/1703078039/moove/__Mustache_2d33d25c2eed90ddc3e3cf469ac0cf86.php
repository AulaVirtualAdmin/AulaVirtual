<?php

class __Mustache_2d33d25c2eed90ddc3e3cf469ac0cf86 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<div class="insight">
';
        if ($partial = $this->mustache->loadPartial('local_edwiserreports/insight-placeholder')) {
            $buffer .= $partial->renderInternal($context, $indent . '    ');
        }
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '<div id="apex-chart-timespentonsite-block" class="pt-4"></div>
';

        return $buffer;
    }
}
