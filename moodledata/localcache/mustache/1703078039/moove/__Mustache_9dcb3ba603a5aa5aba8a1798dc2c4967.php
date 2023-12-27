<?php

class __Mustache_9dcb3ba603a5aa5aba8a1798dc2c4967 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $context->find('hascourses');
        $buffer .= $this->section925892d4a9d6a500e86a0b33ca0fa1ba($context, $indent, $value);
        $value = $context->find('hascourses');
        if (empty($value)) {
            
            $buffer .= $indent . '    <div class="pie-placeholder position-relative mt-50">
';
            $buffer .= $indent . '        ';
            $value = $context->find('pix');
            $buffer .= $this->sectionFbacea4709e6d35d6bf83f8c39056946($context, $indent, $value);
            $buffer .= '
';
            $buffer .= $indent . '        <div class="position-absolute w-full" style="top: 45%;">
';
            $buffer .= $indent . '            <div class="alert alert-secondary text-center w-full" role="alert">
';
            $buffer .= $indent . '                ';
            $value = $context->find('str');
            $buffer .= $this->sectionF6c3a10a59317d4e56e72ce041893f9d($context, $indent, $value);
            $buffer .= '
';
            $buffer .= $indent . '            </div>
';
            $buffer .= $indent . '        </div>
';
            $buffer .= $indent . '    </div>
';
        }

        return $buffer;
    }

    private function section925892d4a9d6a500e86a0b33ca0fa1ba(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <div class="insight">
        {{> local_edwiserreports/insight-placeholder }}
    </div>
    <div class="grade-graphs">
        <div class="graph row px-3">
        </div>
    </div>
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    <div class="insight">
';
                if ($partial = $this->mustache->loadPartial('local_edwiserreports/insight-placeholder')) {
                    $buffer .= $partial->renderInternal($context, $indent . '        ');
                }
                $buffer .= $indent . '    </div>
';
                $buffer .= $indent . '    <div class="grade-graphs">
';
                $buffer .= $indent . '        <div class="graph row px-3">
';
                $buffer .= $indent . '        </div>
';
                $buffer .= $indent . '    </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionFbacea4709e6d35d6bf83f8c39056946(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' pie-placeholder, local_edwiserreports';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' pie-placeholder, local_edwiserreports';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF6c3a10a59317d4e56e72ce041893f9d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' nocourses, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' nocourses, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
