<?php

class __Mustache_d8e4ccb7d4218d97aec62660416591ca extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="row">
';
        $value = $context->find('cohort');
        $buffer .= $this->section999b4db23042298a15122647cb52bc89($context, $indent, $value);
        $buffer .= $indent . '    <div class="filter-selector col-12 col-md-6 mb-1">
';
        $buffer .= $indent . '        <label>';
        $value = $context->find('str');
        $buffer .= $this->sectionC6844d68809f8f99aeb3595400d02ace($context, $indent, $value);
        $buffer .= '</label>
';
        if ($partial = $this->mustache->loadPartial('local_edwiserreports/filters/courses_filter')) {
            $buffer .= $partial->renderInternal($context, $indent . '        ');
        }
        $buffer .= $indent . '    </div>
';
        $value = $context->find('group');
        $buffer .= $this->sectionE9924055bf7a603fc1ce3aadd52b1a77($context, $indent, $value);
        $buffer .= $indent . '    <div class="filter-selector col-12 col-md-6 mb-1">
';
        $buffer .= $indent . '        <label>';
        $value = $context->find('str');
        $buffer .= $this->section0688143182b8f9814b6a3cc2990c5f3e($context, $indent, $value);
        $buffer .= '</label>
';
        if ($partial = $this->mustache->loadPartial('local_edwiserreports/filters/students_filter')) {
            $buffer .= $partial->renderInternal($context, $indent . '        ');
        }
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';

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

    private function sectionC6844d68809f8f99aeb3595400d02ace(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' course, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' course, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionCa768ca37ed6a1a230e593909d466b3d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' group, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' group, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE9924055bf7a603fc1ce3aadd52b1a77(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <div class="filter-selector col-12 col-md-6 mb-1">
            <label>{{#str}} group, local_edwiserreports {{/str}}</label>
            {{> local_edwiserreports/filters/groups_filter }}
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
                $buffer .= $this->sectionCa768ca37ed6a1a230e593909d466b3d($context, $indent, $value);
                $buffer .= '</label>
';
                if ($partial = $this->mustache->loadPartial('local_edwiserreports/filters/groups_filter')) {
                    $buffer .= $partial->renderInternal($context, $indent . '            ');
                }
                $buffer .= $indent . '        </div>
';
                $context->pop();
            }
        }
    
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

}
