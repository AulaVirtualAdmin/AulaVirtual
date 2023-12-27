<?php

class __Mustache_058878939a900a20ffd35dc4725c51d3 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="insight col-12 col-md-6 col-xl-3 mb-5 ';
        $value = $this->resolveValue($context->find('id'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" data-id="';
        $value = $this->resolveValue($context->find('id'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '">
';
        $buffer .= $indent . '    <div class="insight-wrapper p-4">
';
        $buffer .= $indent . '        <div class="insight-image">
';
        $buffer .= $indent . '            ';
        $value = $this->resolveValue($context->find('icon'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <h5 class="insight-title mb-0">';
        $value = $this->resolveValue($context->find('title'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '</h5>
';
        $buffer .= $indent . '        <div class="insight-wrap">
';
        $buffer .= $indent . '        </div>
';
        $value = $context->find('editing');
        $buffer .= $this->sectionD8fd39abd36b81a4f82e285a9252ffe1($context, $indent, $value);
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';

        return $buffer;
    }

    private function sectionD8fd39abd36b81a4f82e285a9252ffe1(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div class="card-editing btn-group d-flex">
                <button class="btn bg-secondary move-left" data-id="{{id}}">
                    <i class="fa fa-arrow-left"></i>
                </button>
                <button class="btn bg-secondary move-right" data-id="{{id}}">
                    <i class="fa fa-arrow-right"></i>
                </button>
                <button class="btn bg-secondary edit-hide" data-id="{{id}}">
                    <i class="fa fa-eye"></i>
                </button>
            </div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div class="card-editing btn-group d-flex">
';
                $buffer .= $indent . '                <button class="btn bg-secondary move-left" data-id="';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $buffer .= $indent . '                    <i class="fa fa-arrow-left"></i>
';
                $buffer .= $indent . '                </button>
';
                $buffer .= $indent . '                <button class="btn bg-secondary move-right" data-id="';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $buffer .= $indent . '                    <i class="fa fa-arrow-right"></i>
';
                $buffer .= $indent . '                </button>
';
                $buffer .= $indent . '                <button class="btn bg-secondary edit-hide" data-id="';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $buffer .= $indent . '                    <i class="fa fa-eye"></i>
';
                $buffer .= $indent . '                </button>
';
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
