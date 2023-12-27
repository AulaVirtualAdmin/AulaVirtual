<?php

class __Mustache_a75a8419e36ddefa1c1e3348943ae673 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="table-responsive">
';
        $buffer .= $indent . '    <table class="table border-0">
';
        $buffer .= $indent . '        <thead class="">
';
        $buffer .= $indent . '            <tr>
';
        $buffer .= $indent . '                <th class="border-bottom-0">
';
        $buffer .= $indent . '                    ';
        $value = $context->find('str');
        $buffer .= $this->section657fdd84fc5dd0a16a83e024ba32e71b($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                </th>
';
        $buffer .= $indent . '                <th class="border-bottom-0">
';
        $buffer .= $indent . '                    ';
        $value = $context->find('str');
        $buffer .= $this->section8d4f0370cb28ea524abadb535516b614($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                </th>
';
        $buffer .= $indent . '                <th class="border-bottom-0 text-center">
';
        $buffer .= $indent . '                    ';
        $value = $context->find('str');
        $buffer .= $this->section69c7c51552a4e5cec49b1bcc101a7aae($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                </th>
';
        $buffer .= $indent . '                <th class="border-bottom-0 text-center">
';
        $buffer .= $indent . '                    ';
        $value = $context->find('str');
        $buffer .= $this->section02c010dbfe90af446f66d0a7d1fa206d($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                </th>
';
        $buffer .= $indent . '                <th class="border-bottom-0 text-center">
';
        $buffer .= $indent . '                    ';
        $value = $context->find('str');
        $buffer .= $this->section14801ae4dab665170ae7583a07d6eae8($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                </th>
';
        $buffer .= $indent . '            </tr>
';
        $buffer .= $indent . '        </thead>
';
        $buffer .= $indent . '    </table>
';
        $buffer .= $indent . '</div>
';

        return $buffer;
    }

    private function section657fdd84fc5dd0a16a83e024ba32e71b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' rank, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' rank, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8d4f0370cb28ea524abadb535516b614(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' coursename, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' coursename, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section69c7c51552a4e5cec49b1bcc101a7aae(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' enrolments, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' enrolments, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section02c010dbfe90af446f66d0a7d1fa206d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' visits, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' visits, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section14801ae4dab665170ae7583a07d6eae8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' completions, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' completions, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
