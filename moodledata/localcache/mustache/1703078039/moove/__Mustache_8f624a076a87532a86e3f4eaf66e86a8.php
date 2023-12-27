<?php

class __Mustache_8f624a076a87532a86e3f4eaf66e86a8 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<form action="';
        $value = $this->resolveValue($context->find('downloadurl'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '" target="_blank" method="post" class="download-links dropdown-item p-0">
';
        $buffer .= $indent . '    <input type="hidden" name="block" value="';
        $value = $this->resolveValue($context->find('id'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" />
';
        $buffer .= $indent . '    <input type="hidden" name="filter" value="';
        $value = $this->resolveValue($context->find('filter'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" />
';
        $buffer .= $indent . '    <input type="hidden" name="cohortid" value="';
        $value = $this->resolveValue($context->find('cohortid'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" />
';
        $buffer .= $indent . '    <input type="hidden" name="region" value="';
        $value = $this->resolveValue($context->find('region'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" />
';
        $buffer .= $indent . '    <input type="hidden" name="sesskey" value="';
        $value = $this->resolveValue($context->find('sesskey'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '">
';
        $buffer .= $indent . '    <button
';
        $buffer .= $indent . '        type="';
        $value = $context->find('type');
        $buffer .= $this->section1123354f5ceef3c38ba329187f298c85($context, $indent, $value);
        $value = $context->find('type');
        if (empty($value)) {
            
            $buffer .= 'submit';
        }
        $buffer .= '"
';
        $buffer .= $indent . '        ';
        $value = $context->find('graphical');
        $buffer .= $this->section94a447b46d461dd42ee10b9bd1e1d1df($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '        class="a border-0 bg-transparent dropdown-item m-0 text-body w-100 text-left"
';
        $buffer .= $indent . '        name="type"
';
        $buffer .= $indent . '        value="';
        $value = $this->resolveValue($context->find('name'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '"
';
        $buffer .= $indent . '    >
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->find('label'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '    </button>
';
        $buffer .= $indent . '</form>
';

        return $buffer;
    }

    private function section1123354f5ceef3c38ba329187f298c85(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{type}}';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $this->resolveValue($context->find('type'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section94a447b46d461dd42ee10b9bd1e1d1df(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'data-type="graphical"';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'data-type="graphical"';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
