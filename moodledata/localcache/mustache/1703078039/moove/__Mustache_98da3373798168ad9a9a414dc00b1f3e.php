<?php

class __Mustache_98da3373798168ad9a9a414dc00b1f3e extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $context->find('js');
        $buffer .= $this->sectionFa43b223d1bcc14eaf8c016e11688a2a($context, $indent, $value);

        return $buffer;
    }

    private function sectionFa43b223d1bcc14eaf8c016e11688a2a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
require([\'jquery\'], function($) {
    $(document).ready(function() {
        $(\'.more-nav .nav-item .nav-link.active\').removeClass(\'active\');
        console.log("{{activeurl}}");
        $(\'.more-nav .nav-item [href="{{activeurl}}"]\').addClass(\'active\');
    });
});
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . 'require([\'jquery\'], function($) {
';
                $buffer .= $indent . '    $(document).ready(function() {
';
                $buffer .= $indent . '        $(\'.more-nav .nav-item .nav-link.active\').removeClass(\'active\');
';
                $buffer .= $indent . '        console.log("';
                $value = $this->resolveValue($context->find('activeurl'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '");
';
                $buffer .= $indent . '        $(\'.more-nav .nav-item [href="';
                $value = $this->resolveValue($context->find('activeurl'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '"]\').addClass(\'active\');
';
                $buffer .= $indent . '    });
';
                $buffer .= $indent . '});
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
