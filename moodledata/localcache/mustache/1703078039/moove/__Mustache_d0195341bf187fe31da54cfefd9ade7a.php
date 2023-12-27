<?php

class __Mustache_d0195341bf187fe31da54cfefd9ade7a extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="row">
';
        $buffer .= $indent . '    <div class="filter-selector col-12 position-relative mr-1 mb-1">
';
        $buffer .= $indent . '        <label>';
        $value = $context->find('str');
        $buffer .= $this->section4e8b20a9fe6d8f29751db4d6458c169e($context, $indent, $value);
        $buffer .= '</label>
';
        $buffer .= $indent . '        <button type="button" class="btn edwiserreports-calendar dropdown-toggle text-left w-100 learnertimespentonsite-calendar" data-toggle="dropdown" aria-expanded="false">
';
        $buffer .= $indent . '            ';
        $value = $context->find('str');
        $buffer .= $this->sectionC48b1ed39c6e06f864d9aaa18493d5c4($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '        </button>
';
        $buffer .= $indent . '        <div class="dropdown-menu" aria-labelledby="filter-dropdown" role="menu">
';
        $buffer .= $indent . '            <div class="dropdown-calendar"></div>
';
        $buffer .= $indent . '            <div class="dropdown-body">
';
        $buffer .= $indent . '                <a class="dropdown-item active" role="menuitem" data-value="last7days" href="javascript:void(0)">';
        $value = $context->find('str');
        $buffer .= $this->sectionC48b1ed39c6e06f864d9aaa18493d5c4($context, $indent, $value);
        $buffer .= '</a>
';
        $buffer .= $indent . '                <a class="dropdown-item" role="menuitem" data-value="weekly" href="javascript:void(0)">';
        $value = $context->find('str');
        $buffer .= $this->section1a820dc2f0b751bbacad031e7035500e($context, $indent, $value);
        $buffer .= '</a>
';
        $buffer .= $indent . '                <a class="dropdown-item" role="menuitem" data-value="monthly" href="javascript:void(0)">';
        $value = $context->find('str');
        $buffer .= $this->sectionD51af92dfda0bf8ff3577714a367ae9a($context, $indent, $value);
        $buffer .= '</a>
';
        $buffer .= $indent . '                <a class="dropdown-item" role="menuitem" data-value="yearly" href="javascript:void(0)">';
        $value = $context->find('str');
        $buffer .= $this->section2a6165708677f5d28dd0412b7ad9970a($context, $indent, $value);
        $buffer .= '</a>
';
        $buffer .= $indent . '                <a class="dropdown-item custom" role="menuitem" href="javascript:void(0)">
';
        $buffer .= $indent . '                    <input class="border-0 p-0 bg-transparent flatpickr" placeholder="';
        $value = $context->find('str');
        $buffer .= $this->section99891200e02cb04315d9b8dfb8f49fcc($context, $indent, $value);
        $buffer .= '" 0="data-input" />
';
        $buffer .= $indent . '                </a>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';

        return $buffer;
    }

    private function section4e8b20a9fe6d8f29751db4d6458c169e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' date, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' date, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC48b1ed39c6e06f864d9aaa18493d5c4(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' last7days, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' last7days, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1a820dc2f0b751bbacad031e7035500e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' lastweek, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' lastweek, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionD51af92dfda0bf8ff3577714a367ae9a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' lastmonth, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' lastmonth, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2a6165708677f5d28dd0412b7ad9970a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' lastyear, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' lastyear, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section99891200e02cb04315d9b8dfb8f49fcc(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' customdate, local_edwiserreports ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' customdate, local_edwiserreports ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
