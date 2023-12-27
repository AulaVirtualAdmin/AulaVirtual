<?php

class __Mustache_3e99a19de41d86963e4f73bb6f5b2714 extends Mustache_Template
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
        $buffer .= $indent . '    <div class="filter-selector col-12 col-md-6 mb-1 d-flex">
';
        $buffer .= $indent . '        <button type="button" class="btn btn-sm dropdown-toggle ml-auto" data-toggle="dropdown" aria-expanded="true">';
        $value = $context->find('str');
        $buffer .= $this->sectionA14cde04af4b5260eccc47a8c914ed7c($context, $indent, $value);
        $buffer .= '</button>
';
        $buffer .= $indent . '        <div class="dropdown-menu dropdown-sm" role="menu" x-placement="top-start">
';
        $buffer .= $indent . '            <a class="active dropdown-item" href="javascript:void(0)" data-value="never" role="menuitem">
';
        $buffer .= $indent . '                ';
        $value = $context->find('str');
        $buffer .= $this->sectionA14cde04af4b5260eccc47a8c914ed7c($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '            </a>
';
        $buffer .= $indent . '            <a class="dropdown-item" href="javascript:void(0)" data-value="1month" role="menuitem">
';
        $buffer .= $indent . '                ';
        $value = $context->find('str');
        $buffer .= $this->section21abf66bd59fd5af2316a67b18c2567a($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '            </a>
';
        $buffer .= $indent . '            <a class="dropdown-item" href="javascript:void(0)" data-value="3month" role="menuitem">
';
        $buffer .= $indent . '                ';
        $value = $context->find('str');
        $buffer .= $this->sectionEc2df20f0950d7ac6a8bcf183d0f4481($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '            </a>
';
        $buffer .= $indent . '            <a class="dropdown-item" href="javascript:void(0)" data-value="6month" role="menuitem">
';
        $buffer .= $indent . '                ';
        $value = $context->find('str');
        $buffer .= $this->section4701b59c68065cf69d3d6e64e353d17d($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '            </a>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
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

    private function sectionA14cde04af4b5260eccc47a8c914ed7c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'never, local_edwiserreports';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'never, local_edwiserreports';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section21abf66bd59fd5af2316a67b18c2567a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'before1month, local_edwiserreports';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'before1month, local_edwiserreports';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionEc2df20f0950d7ac6a8bcf183d0f4481(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'before3month, local_edwiserreports';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'before3month, local_edwiserreports';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section4701b59c68065cf69d3d6e64e353d17d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'before6month, local_edwiserreports';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'before6month, local_edwiserreports';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
