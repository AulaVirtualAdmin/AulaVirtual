<?php

class __Mustache_a63d127d412b84be863d38f8f5e73c38 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div class="top-insights position-relative col-12 px-0 m-auto ';
        $value = $context->find('editing');
        $buffer .= $this->sectionEe534bc00319ee64bce3640e9767ecc4($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '    <div class="row overflow-hidden">
';
        $value = $context->find('visible');
        $buffer .= $this->sectionAbc57a9a23ac3d38b6d8dab4eed8406f($context, $indent, $value);
        $value = $context->find('editing');
        $buffer .= $this->sectionDc4c11f18f7874723e10e30729a53f9b($context, $indent, $value);
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';

        return $buffer;
    }

    private function sectionEe534bc00319ee64bce3640e9767ecc4(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'editing';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'editing';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section646ec0d71b46a10f95bb24f92a933f59(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                {{> local_edwiserreports/insights/insight }}
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                if ($partial = $this->mustache->loadPartial('local_edwiserreports/insights/insight')) {
                    $buffer .= $partial->renderInternal($context, $indent . '                ');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionAbc57a9a23ac3d38b6d8dab4eed8406f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            {{# internal }}
                {{> local_edwiserreports/insights/insight }}
            {{/ internal }}
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('internal');
                $buffer .= $this->section646ec0d71b46a10f95bb24f92a933f59($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1246808e12b08a69942964594521f1d4(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'add';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'add';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section0b631a2bc970e9f38e2aa19e4305e9aa(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <a class="dropdown-item" href="#" data-id="{{id}}">{{ title }}</a>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <a class="dropdown-item" href="#" data-id="';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">';
                $value = $this->resolveValue($context->find('title'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</a>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionDc4c11f18f7874723e10e30729a53f9b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <div class="insight add-insight col-12 col-md-6 col-lg-3 mb-5">
            <div class="insight-wrapper">
                <div class="dropdown add-new-insight">
                    <button class="dropdown-toggle bg-transparent border-0" type="button" id="additional-insight" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon fa fa-plus"></i>
                        <span class="sr-only">{{#str}}add{{/str}}</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="additional-insight">
                        {{# additional }}
                            <a class="dropdown-item" href="#" data-id="{{id}}">{{ title }}</a>
                        {{/ additional }}
                    </div>
                </div>
            </div>
        </div>
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        <div class="insight add-insight col-12 col-md-6 col-lg-3 mb-5">
';
                $buffer .= $indent . '            <div class="insight-wrapper">
';
                $buffer .= $indent . '                <div class="dropdown add-new-insight">
';
                $buffer .= $indent . '                    <button class="dropdown-toggle bg-transparent border-0" type="button" id="additional-insight" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
';
                $buffer .= $indent . '                        <i class="icon fa fa-plus"></i>
';
                $buffer .= $indent . '                        <span class="sr-only">';
                $value = $context->find('str');
                $buffer .= $this->section1246808e12b08a69942964594521f1d4($context, $indent, $value);
                $buffer .= '</span>
';
                $buffer .= $indent . '                    </button>
';
                $buffer .= $indent . '                    <div class="dropdown-menu" aria-labelledby="additional-insight">
';
                $value = $context->find('additional');
                $buffer .= $this->section0b631a2bc970e9f38e2aa19e4305e9aa($context, $indent, $value);
                $buffer .= $indent . '                    </div>
';
                $buffer .= $indent . '                </div>
';
                $buffer .= $indent . '            </div>
';
                $buffer .= $indent . '        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
