<?php

class __Mustache_6813a8caec2d52289b1da75d861a6d91 extends Mustache_Template
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
        $buffer .= $indent . '<div id="apex-chart-visitsonsite-block" class="pt-4"></div>
';

        return $buffer;
    }
}
