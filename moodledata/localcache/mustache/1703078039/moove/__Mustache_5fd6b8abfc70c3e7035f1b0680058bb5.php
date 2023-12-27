<?php

class __Mustache_5fd6b8abfc70c3e7035f1b0680058bb5 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div id="accessibilitybar" class="fixed-top">
';
        $buffer .= $indent . '    <div class="container-fluid">
';
        $buffer .= $indent . '        <div class="bars">
';
        $buffer .= $indent . '            <div class="fontsize">
';
        $buffer .= $indent . '                <span>';
        $value = $context->find('str');
        $buffer .= $this->section8240d8be79c4eaba9534ea3ead19abb1($context, $indent, $value);
        $buffer .= '</span>
';
        $buffer .= $indent . '                <ul>
';
        $buffer .= $indent . '                    <li><a class="btn btn-default" data-action="decrease" title="';
        $value = $context->find('str');
        $buffer .= $this->section73d703c33679978960bbd84a72e66563($context, $indent, $value);
        $buffer .= '" id="fontsize_dec">A-</a></li>
';
        $buffer .= $indent . '                    <li><a class="btn btn-default" data-action="reset" title="';
        $value = $context->find('str');
        $buffer .= $this->section079afec6d40dc916b3c3c71106a7966c($context, $indent, $value);
        $buffer .= '" id="fontsize_reset">A</a></li>
';
        $buffer .= $indent . '                    <li><a class="btn btn-default" data-action="increase" title="';
        $value = $context->find('str');
        $buffer .= $this->section8b0ffd173f5763c0e1e03558a4d9b45e($context, $indent, $value);
        $buffer .= '" id="fontsize_inc">A+</a></li>
';
        $buffer .= $indent . '                </ul>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '            <div class="sitecolor">
';
        $buffer .= $indent . '                <span>';
        $value = $context->find('str');
        $buffer .= $this->sectionB5f9ea01adcd9648c969f6675b2b5059($context, $indent, $value);
        $buffer .= '</span>
';
        $buffer .= $indent . '                <ul>
';
        $buffer .= $indent . '                    <li><a class="btn btn-default" data-action="reset" title="';
        $value = $context->find('str');
        $buffer .= $this->sectionD70e25d7b3fb9dbdfb306a221473f991($context, $indent, $value);
        $buffer .= '" id="sitecolor_color1">R</a></li>
';
        $buffer .= $indent . '                    <li><a class="btn btn-default" data-action="sitecolor-color-2" title="';
        $value = $context->find('str');
        $buffer .= $this->sectionA0b3e1dd6a47e1d8eba31a013a584d1b($context, $indent, $value);
        $buffer .= '" id="sitecolor_color2">A</a></li>
';
        $buffer .= $indent . '                    <li><a class="btn btn-default" data-action="sitecolor-color-3" title="';
        $value = $context->find('str');
        $buffer .= $this->section65ba3a112039b73b5c3677d603865b04($context, $indent, $value);
        $buffer .= '" id="sitecolor_color3">A</a></li>
';
        $buffer .= $indent . '                    <li><a class="btn btn-default" data-action="sitecolor-color-4" title="';
        $value = $context->find('str');
        $buffer .= $this->section6efa652be9dafd45c3d8643d092aadf5($context, $indent, $value);
        $buffer .= '" id="sitecolor_color4">A</a></li>
';
        $buffer .= $indent . '                </ul>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '
';
        $value = $context->find('js');
        $buffer .= $this->sectionC800a827dc3bec351bec28991c3818ea($context, $indent, $value);

        return $buffer;
    }

    private function section8240d8be79c4eaba9534ea3ead19abb1(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'accessibility:fontsize, theme_moove';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'accessibility:fontsize, theme_moove';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section73d703c33679978960bbd84a72e66563(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'accessibility:decreasefont, theme_moove';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'accessibility:decreasefont, theme_moove';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section079afec6d40dc916b3c3c71106a7966c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'accessibility:resetfont, theme_moove';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'accessibility:resetfont, theme_moove';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8b0ffd173f5763c0e1e03558a4d9b45e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'accessibility:increasefont, theme_moove';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'accessibility:increasefont, theme_moove';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB5f9ea01adcd9648c969f6675b2b5059(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'accessibility:sitecolor, theme_moove';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'accessibility:sitecolor, theme_moove';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionD70e25d7b3fb9dbdfb306a221473f991(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'accessibility:resetsitecolor, theme_moove';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'accessibility:resetsitecolor, theme_moove';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA0b3e1dd6a47e1d8eba31a013a584d1b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'accessibility:sitecolor2, theme_moove';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'accessibility:sitecolor2, theme_moove';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section65ba3a112039b73b5c3677d603865b04(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'accessibility:sitecolor3, theme_moove';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'accessibility:sitecolor3, theme_moove';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6efa652be9dafd45c3d8643d092aadf5(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'accessibility:sitecolor4, theme_moove';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'accessibility:sitecolor4, theme_moove';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC800a827dc3bec351bec28991c3818ea(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    require([\'theme_moove/accessibilitybar\'], function(AccessibilityBar) {
        AccessibilityBar.init();
    });
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    require([\'theme_moove/accessibilitybar\'], function(AccessibilityBar) {
';
                $buffer .= $indent . '        AccessibilityBar.init();
';
                $buffer .= $indent . '    });
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
