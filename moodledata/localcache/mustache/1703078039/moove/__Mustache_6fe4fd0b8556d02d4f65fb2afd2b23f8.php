<?php

class __Mustache_6fe4fd0b8556d02d4f65fb2afd2b23f8 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="row">
';
        $buffer .= $indent . '    <div class="filter-selector col-12 col-md-6 mb-1">
';
        $buffer .= $indent . '        <label>';
        $value = $context->find('str');
        $buffer .= $this->section0688143182b8f9814b6a3cc2990c5f3e($context, $indent, $value);
        $buffer .= '</label>
';
        $buffer .= $indent . '        <select id="timespentonsite-student-select" class="form-control singleselect w-full" name="state">
';
        $value = $context->find('students');
        $buffer .= $this->section0c16d36326b32eeb2daeedf117e6a5cc($context, $indent, $value);
        $buffer .= $indent . '        </select>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';

        return $buffer;
    }

    private function section0688143182b8f9814b6a3cc2990c5f3e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' user, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' user, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section0c16d36326b32eeb2daeedf117e6a5cc(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <option value="{{id}}">{{fullname}}</option>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <option value="';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">';
                $value = $this->resolveValue($context->find('fullname'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</option>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
