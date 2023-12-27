<?php

class __Mustache_0f1b53ceccd3fc558411f0807163438b extends Mustache_Template
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
        $buffer .= $indent . '<div id="apex-chart-courseactivitystatus-block" class="pt-4"></div>
';

        return $buffer;
    }
}
