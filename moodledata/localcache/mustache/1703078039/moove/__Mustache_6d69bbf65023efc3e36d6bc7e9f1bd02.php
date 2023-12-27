<?php

class __Mustache_6d69bbf65023efc3e36d6bc7e9f1bd02 extends Mustache_Template
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
        $buffer .= $indent . '<div id="apex-chart-active-users" class="pt-4"></div>
';

        return $buffer;
    }
}
