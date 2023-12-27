<?php

class __Mustache_6e77f4e9143e778ff871f75a6ef28912 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="table-responsive">
';
        $buffer .= $indent . '    <table class="table customreportdata w-full"></table>
';
        $buffer .= $indent . '</div>
';
        $value = $context->find('js');
        $buffer .= $this->section857d66a90082467bc19e4d554f64e19d($context, $indent, $value);

        return $buffer;
    }

    private function section857d66a90082467bc19e4d554f64e19d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
require([\'local_edwiserreports/blocks/customreport\'], function(customReport) {
    customReport.init(\'{{{id}}}\', \'{{{params}}}\');
});
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . 'require([\'local_edwiserreports/blocks/customreport\'], function(customReport) {
';
                $buffer .= $indent . '    customReport.init(\'';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '\', \'';
                $value = $this->resolveValue($context->find('params'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '\');
';
                $buffer .= $indent . '});
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
