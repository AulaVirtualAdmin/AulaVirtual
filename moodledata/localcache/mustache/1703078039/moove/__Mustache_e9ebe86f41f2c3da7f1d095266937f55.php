<?php

class __Mustache_e9ebe86f41f2c3da7f1d095266937f55 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="table-responsive">
';
        $buffer .= $indent . '    <table class="table border-0 mx-0" style="display: none;">
';
        $buffer .= $indent . '        <thead class="">
';
        $buffer .= $indent . '            <tr>
';
        $buffer .= $indent . '                <th class="border-bottom-0">
';
        $buffer .= $indent . '                    ';
        $value = $context->find('str');
        $buffer .= $this->section47b67cfeeed66155b85b2b709424317e($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                </th>
';
        $buffer .= $indent . '                <th class="border-bottom-0 text-center">
';
        $buffer .= $indent . '                    ';
        $value = $context->find('str');
        $buffer .= $this->section381df8e866a5ab46cc0fbe5c8df708fa($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                </th>
';
        $buffer .= $indent . '                <th class="border-bottom-0 text-center">
';
        $buffer .= $indent . '                    ';
        $value = $context->find('str');
        $buffer .= $this->section6c05e1ab22bb99a059e933817bbb7837($context, $indent, $value);
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

    private function section47b67cfeeed66155b85b2b709424317e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' fullname, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' fullname, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section381df8e866a5ab46cc0fbe5c8df708fa(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' onlinesince, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' onlinesince, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6c05e1ab22bb99a059e933817bbb7837(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' status, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' status, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
