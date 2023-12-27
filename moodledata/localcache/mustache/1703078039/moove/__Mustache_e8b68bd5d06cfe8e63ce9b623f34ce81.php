<?php

class __Mustache_e8b68bd5d06cfe8e63ce9b623f34ce81 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="table-responsive">
';
        $buffer .= $indent . '    <table id="inactiveuserstable" class="table border-0">
';
        $buffer .= $indent . '        <thead class="">
';
        $buffer .= $indent . '            <tr>
';
        $buffer .= $indent . '                <th class="border-bottom-0">
';
        $buffer .= $indent . '                    ';
        $value = $context->find('str');
        $buffer .= $this->sectionD29b3461815b13dc82292250e08b4d69($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                </th>
';
        $buffer .= $indent . '                <th class="border-bottom-0 d-none d-sm-none d-md-table-cell d-lg-table-cell ">
';
        $buffer .= $indent . '                    ';
        $value = $context->find('str');
        $buffer .= $this->sectionE1551a1c6d34bfab94ee86a9e469af96($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                </th>
';
        $buffer .= $indent . '                <th class="border-bottom-0">
';
        $buffer .= $indent . '                    ';
        $value = $context->find('str');
        $buffer .= $this->section37e53be65c5a644457f57b32f6ee1e8b($context, $indent, $value);
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

    private function sectionD29b3461815b13dc82292250e08b4d69(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' fullname, local_edwiserreports';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' fullname, local_edwiserreports';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE1551a1c6d34bfab94ee86a9e469af96(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' email, local_edwiserreports';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' email, local_edwiserreports';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section37e53be65c5a644457f57b32f6ee1e8b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' lastaccess, local_edwiserreports';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' lastaccess, local_edwiserreports';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
