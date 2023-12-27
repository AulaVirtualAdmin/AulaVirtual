<?php

class __Mustache_0636392642a401749151b0f405359bbe extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $context->find('cronwarning');
        $buffer .= $this->sectionFec1faaed3786dce1cd4d83b5e17c8fe($context, $indent, $value);
        $buffer .= $indent . '<div id="apex-chart-siteaccess-block"></div>
';
        $buffer .= $indent . '<div class="siteaccess-values-shade">
';
        $buffer .= $indent . '    <label class="siteaccess">
';
        $buffer .= $indent . '        ';
        $value = $context->find('str');
        $buffer .= $this->section3c16a67f611f92f59d1fcb483fbedf7d($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '    </label>
';
        $buffer .= $indent . '    <div class="shades px-1"></div>
';
        $buffer .= $indent . '    <label class="siteaccess">
';
        $buffer .= $indent . '        ';
        $value = $context->find('str');
        $buffer .= $this->section1ec5bedf5c178263335fd36894a2229d($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '    </label>
';
        $buffer .= $indent . '</div>
';

        return $buffer;
    }

    private function sectionFec1faaed3786dce1cd4d83b5e17c8fe(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    {{{.}}}
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    ';
                $value = $this->resolveValue($context->last(), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3c16a67f611f92f59d1fcb483fbedf7d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' quietest, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' quietest, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1ec5bedf5c178263335fd36894a2229d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' busiest, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' busiest, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
