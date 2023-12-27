<?php

class __Mustache_5916f2629578051a98137f0c3cb0aa0c extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="table-responsive">
';
        $buffer .= $indent . '        <table class="table">
';
        $buffer .= $indent . '            <thead>
';
        $buffer .= $indent . '                <tr>
';
        $buffer .= $indent . '                    <th>
';
        $buffer .= $indent . '                        ';
        $value = $context->find('str');
        $buffer .= $this->section8d4f0370cb28ea524abadb535516b614($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                    </th>
';
        $buffer .= $indent . '                    <th>
';
        $buffer .= $indent . '                        ';
        $value = $context->find('str');
        $buffer .= $this->section31d7904c1ad9b20ae199db51b65e9173($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                    </th>
';
        $buffer .= $indent . '                    <th>
';
        $buffer .= $indent . '                        ';
        $value = $context->find('str');
        $buffer .= $this->section69c7c51552a4e5cec49b1bcc101a7aae($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                    </th>
';
        $buffer .= $indent . '                    <th>
';
        $buffer .= $indent . '                        ';
        $value = $context->find('str');
        $buffer .= $this->section1b670e7bf557b058183ab2e2d851a72e($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                    </th>
';
        $buffer .= $indent . '                    <th>
';
        $buffer .= $indent . '                        ';
        $value = $context->find('str');
        $buffer .= $this->sectionF62ab9d7aad0fafd0db6202b28b97ec0($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                    </th>
';
        $buffer .= $indent . '                    <th>
';
        $buffer .= $indent . '                        ';
        $value = $context->find('str');
        $buffer .= $this->section6d64cb79af78cb63b57116a5b13bb1f8($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                    </th>
';
        $buffer .= $indent . '                    <th>
';
        $buffer .= $indent . '                        ';
        $value = $context->find('str');
        $buffer .= $this->sectionA1ba5eaa58fb582d6f1e7a137b42c094($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                    </th>
';
        $buffer .= $indent . '                    <th>
';
        $buffer .= $indent . '                        ';
        $value = $context->find('str');
        $buffer .= $this->section8a8f14ca405a77fe24f55c8ac3d15481($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                    </th>
';
        $buffer .= $indent . '                    <th>
';
        $buffer .= $indent . '                        ';
        $value = $context->find('str');
        $buffer .= $this->sectionB69ce0a911d936439dac67d0724656e8($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '                    </th>
';
        $buffer .= $indent . '                </tr>
';
        $buffer .= $indent . '            </thead>
';
        $buffer .= $indent . '            <tbody></tbody>
';
        $buffer .= $indent . '        </table>
';
        $buffer .= $indent . '    </div>
';

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

    private function section31d7904c1ad9b20ae199db51b65e9173(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' categoryname, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' categoryname, local_edwiserreports ';
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

    private function section1b670e7bf557b058183ab2e2d851a72e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' completed, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' completed, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF62ab9d7aad0fafd0db6202b28b97ec0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' completionspercentage, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' completionspercentage, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6d64cb79af78cb63b57116a5b13bb1f8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' totalvisits, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' totalvisits, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA1ba5eaa58fb582d6f1e7a137b42c094(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' averagevisits, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' averagevisits, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8a8f14ca405a77fe24f55c8ac3d15481(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' timespent, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' timespent, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB69ce0a911d936439dac67d0724656e8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' averagetimespent, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' averagetimespent, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
