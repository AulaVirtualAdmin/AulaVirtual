<?php

class __Mustache_ac84497acc690eea365b525c0e2513a5 extends Mustache_Template
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
        $buffer .= $indent . '<div class="grade-graphs">
';
        $buffer .= $indent . '    <div class="graph row px-3">
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';

        return $buffer;
    }
}
