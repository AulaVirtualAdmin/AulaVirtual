<?php

class __Mustache_130ab3c0bc2fe408d416897f6fcf4e0e extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="row pb-3">
';
        $buffer .= $indent . '    <div class="filter-selector col-12 col-md-6 mb-1">
';
        $buffer .= $indent . '        <label>';
        $value = $context->find('str');
        $buffer .= $this->sectionC93e9ebab241e3e6bd5310f5c89d07dd($context, $indent, $value);
        $buffer .= '</label>
';
        if ($partial = $this->mustache->loadPartial('local_edwiserreports/datatable/search')) {
            $buffer .= $partial->renderInternal($context, $indent . '        ');
        }
        $buffer .= $indent . '    </div>
';
        $value = $context->find('cohort');
        $buffer .= $this->section999b4db23042298a15122647cb52bc89($context, $indent, $value);
        $buffer .= $indent . '</div>
';

        return $buffer;
    }

    private function sectionC93e9ebab241e3e6bd5310f5c89d07dd(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' search, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' search, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section7896e029ec4b5b2ebff98a9ecfe2332d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' cohort, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' cohort, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section999b4db23042298a15122647cb52bc89(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <div class="filter-selector col-12 col-md-6 mb-1">
            <label>{{#str}} cohort, local_edwiserreports {{/str}}</label>
            {{> local_edwiserreports/filters/cohorts_filter }}
        </div>
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        <div class="filter-selector col-12 col-md-6 mb-1">
';
                $buffer .= $indent . '            <label>';
                $value = $context->find('str');
                $buffer .= $this->section7896e029ec4b5b2ebff98a9ecfe2332d($context, $indent, $value);
                $buffer .= '</label>
';
                if ($partial = $this->mustache->loadPartial('local_edwiserreports/filters/cohorts_filter')) {
                    $buffer .= $partial->renderInternal($context, $indent . '            ');
                }
                $buffer .= $indent . '        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
