<?php

class __Mustache_647ca89b9e01212d9bb5f77779c247d9 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<ul class="edwiserreports-tabs mt-4 px-1">
';
        $value = $context->find('navigation');
        $buffer .= $this->section068d3541bb63e8bf00e42701f89e3563($context, $indent, $value);
        $buffer .= $indent . '</ul>
';
        $value = $context->find('js');
        $buffer .= $this->sectionAda29d633426cf41fee131c858d7356d($context, $indent, $value);

        return $buffer;
    }

    private function section3ff98c1deac347d8c4a99550583d4940(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' active';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' active';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section011be3fb3ea672aace87cfeb233dca72(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <li class="tab-item{{#active}} active{{/active}}">
                    <a class="tab-link" data-id="{{id}}" href="{{link}}">{{label}}</a>
                </li>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <li class="tab-item';
                $value = $context->find('active');
                $buffer .= $this->section3ff98c1deac347d8c4a99550583d4940($context, $indent, $value);
                $buffer .= '">
';
                $buffer .= $indent . '                    <a class="tab-link" data-id="';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" href="';
                $value = $this->resolveValue($context->find('link'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">';
                $value = $this->resolveValue($context->find('label'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</a>
';
                $buffer .= $indent . '                </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section365afbaa786aa325ee992c8b53e73782(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                <li><a class="dropdown-item"  data-id="{{id}}" href="{{link}}">{{label}}</a></li>
                            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                <li><a class="dropdown-item"  data-id="';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" href="';
                $value = $this->resolveValue($context->find('link'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">';
                $value = $this->resolveValue($context->find('label'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</a></li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8b1da497a155646f4f1fda5e963cc7ad(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            {{#visible}}
                                <li><a class="dropdown-item"  data-id="{{id}}" href="{{link}}">{{label}}</a></li>
                            {{/visible}}
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('visible');
                $buffer .= $this->section365afbaa786aa325ee992c8b53e73782($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB2c67b77c22530da32b4f8a74a6f9a5a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            {{#link}}
                <li class="tab-item{{#active}} active{{/active}}">
                    <a class="tab-link" data-id="{{id}}" href="{{link}}">{{label}}</a>
                </li>
            {{/link}}
            {{^link}}
                <li class="tab-item dropdown{{#active}} active{{/active}}">
                    <a class="tab-link dropdown-toggle" data-id="{{id}}" data-bs-toggle="dropdown" href="javascript:void(0)" role="button" aria-expanded="false">{{label}}</a>
                    
                    <ul class="dropdown-menu {{class}}">
                        {{#nodes}}
                            {{#visible}}
                                <li><a class="dropdown-item"  data-id="{{id}}" href="{{link}}">{{label}}</a></li>
                            {{/visible}}
                        {{/nodes}}
                    </ul>
                </li>
            {{/link}}
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('link');
                $buffer .= $this->section011be3fb3ea672aace87cfeb233dca72($context, $indent, $value);
                $value = $context->find('link');
                if (empty($value)) {
                    
                    $buffer .= $indent . '                <li class="tab-item dropdown';
                    $value = $context->find('active');
                    $buffer .= $this->section3ff98c1deac347d8c4a99550583d4940($context, $indent, $value);
                    $buffer .= '">
';
                    $buffer .= $indent . '                    <a class="tab-link dropdown-toggle" data-id="';
                    $value = $this->resolveValue($context->find('id'), $context);
                    $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                    $buffer .= '" data-bs-toggle="dropdown" href="javascript:void(0)" role="button" aria-expanded="false">';
                    $value = $this->resolveValue($context->find('label'), $context);
                    $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                    $buffer .= '</a>
';
                    $buffer .= $indent . '                    
';
                    $buffer .= $indent . '                    <ul class="dropdown-menu ';
                    $value = $this->resolveValue($context->find('class'), $context);
                    $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                    $buffer .= '">
';
                    $value = $context->find('nodes');
                    $buffer .= $this->section8b1da497a155646f4f1fda5e963cc7ad($context, $indent, $value);
                    $buffer .= $indent . '                    </ul>
';
                    $buffer .= $indent . '                </li>
';
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section068d3541bb63e8bf00e42701f89e3563(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        {{#visible}}
            {{#link}}
                <li class="tab-item{{#active}} active{{/active}}">
                    <a class="tab-link" data-id="{{id}}" href="{{link}}">{{label}}</a>
                </li>
            {{/link}}
            {{^link}}
                <li class="tab-item dropdown{{#active}} active{{/active}}">
                    <a class="tab-link dropdown-toggle" data-id="{{id}}" data-bs-toggle="dropdown" href="javascript:void(0)" role="button" aria-expanded="false">{{label}}</a>
                    
                    <ul class="dropdown-menu {{class}}">
                        {{#nodes}}
                            {{#visible}}
                                <li><a class="dropdown-item"  data-id="{{id}}" href="{{link}}">{{label}}</a></li>
                            {{/visible}}
                        {{/nodes}}
                    </ul>
                </li>
            {{/link}}
        {{/visible}}
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('visible');
                $buffer .= $this->sectionB2c67b77c22530da32b4f8a74a6f9a5a($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionAda29d633426cf41fee131c858d7356d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
require([\'jquery\', \'local_edwiserreports/common\'], function($, common) {
    $(document).ready(function() {
        // Handling header tab dropdown.
        common.headerNavigation();
    });
});
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . 'require([\'jquery\', \'local_edwiserreports/common\'], function($, common) {
';
                $buffer .= $indent . '    $(document).ready(function() {
';
                $buffer .= $indent . '        // Handling header tab dropdown.
';
                $buffer .= $indent . '        common.headerNavigation();
';
                $buffer .= $indent . '    });
';
                $buffer .= $indent . '});
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
