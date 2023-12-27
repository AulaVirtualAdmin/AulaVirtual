<?php

class __Mustache_4fa6fe9c4d7666fd9357bc935c0b3e3a extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<style>
';
        $buffer .= $indent . '    li[data-key="home"]{
';
        $buffer .= $indent . '        display:none!important;
';
        $buffer .= $indent . '    }
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    li[data-key="mycourses"]{
';
        $buffer .= $indent . '        display:none!important;
';
        $buffer .= $indent . '    }
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    li[data-key="myhome"]{
';
        $buffer .= $indent . '        display: none!important;
';
        $buffer .= $indent . '    }
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</style>
';
        $buffer .= $indent . '<nav class="navbar fixed-top navbar-light bg-white navbar-expand shadow" aria-label="';
        $value = $context->find('str');
        $buffer .= $this->section1880a930791c830b67e23ff34b5a4123($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '    
';
        $buffer .= $indent . '    <button class="navbar-toggler aabtn d-block d-md-none px-1 my-1 border-0" data-toggler="drawers" data-action="toggle" data-target="theme_moove-drawers-primary">
';
        $buffer .= $indent . '        <span class="navbar-toggler-icon"></span>
';
        $buffer .= $indent . '        <span class="sr-only">';
        $value = $context->find('str');
        $buffer .= $this->sectionB88b20c96dd523877b35fd7e4389a3fd($context, $indent, $value);
        $buffer .= '</span>
';
        $buffer .= $indent . '    </button>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <a href="';
        $value = $this->resolveValue($context->findDot('config.homeurl'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '" class="navbar-brand d-none d-md-flex align-items-center m-0 mr-4 p-0 aabtn">
';
        $value = $context->findDot('output.should_display_logo');
        $buffer .= $this->sectionD6a9603318cb09006e95f8a3645c781a($context, $indent, $value);
        $value = $context->findDot('output.should_display_logo');
        if (empty($value)) {
            
            $buffer .= $indent . '            ';
            $value = $this->resolveValue($context->find('sitename'), $context);
            $buffer .= ($value === null ? '' : $value);
            $buffer .= '
';
        }
        $buffer .= $indent . '    </a>
';
        $buffer .= $indent . '
';
        $value = $context->find('primarymoremenu');
        $buffer .= $this->section9dc97ed0ab3b088a2ed611e0ffba83df($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <ul class="navbar-nav d-none d-md-flex my-1 px-1">
';
        $buffer .= $indent . '        <!-- page_heading_menu -->
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->findDot('output.page_heading_menu'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '    </ul>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <div id="usernavigation" class="navbar-nav ml-auto">
';
        $buffer .= $indent . '    <div class="d-flex align-items-center mr-2" ><a href = "https://aulavirtual.relpro.cl/FAQs/Centro de ayuda/help.html" ><svg fill="#707070" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
';
        $buffer .= $indent . '     width="20px" height="20px" viewBox="0 0 395.001 395" xml:space="preserve"
';
        $buffer .= $indent . '    >
';
        $buffer .= $indent . '<g>
';
        $buffer .= $indent . '    <g>
';
        $buffer .= $indent . '        <path d="M322.852,0H72.15C32.366,0,0,32.367,0,72.15v250.7C0,362.634,32.367,395,72.15,395h250.701
';
        $buffer .= $indent . '            c39.784,0,72.15-32.366,72.15-72.15V72.15C395.002,32.367,362.635,0,322.852,0z M370.002,322.85
';
        $buffer .= $indent . '            c0,25.999-21.151,47.15-47.15,47.15H72.15C46.151,370,25,348.849,25,322.85V72.15C25,46.151,46.151,25,72.15,25h250.701
';
        $buffer .= $indent . '            c25.999,0,47.15,21.151,47.15,47.15L370.002,322.85L370.002,322.85z"/>
';
        $buffer .= $indent . '        <path d="M197.501,79.908c-33.775,0-61.253,27.479-61.253,61.254c0,6.903,5.596,12.5,12.5,12.5c6.904,0,12.5-5.597,12.5-12.5
';
        $buffer .= $indent . '            c0-19.99,16.263-36.254,36.253-36.254s36.253,16.264,36.253,36.254c0,11.497-8.314,19.183-22.01,30.474
';
        $buffer .= $indent . '            c-12.536,10.334-26.743,22.048-26.743,40.67v40.104c0,6.902,5.597,12.5,12.5,12.5c6.903,0,12.5-5.598,12.5-12.5v-40.104
';
        $buffer .= $indent . '            c0-6.832,8.179-13.574,17.646-21.381c13.859-11.426,31.106-25.646,31.106-49.763C258.754,107.386,231.275,79.908,197.501,79.908z"
';
        $buffer .= $indent . '            />
';
        $buffer .= $indent . '        <path d="M197.501,283.024c-8.842,0-16.034,7.193-16.034,16.035c0,8.84,7.192,16.033,16.034,16.033
';
        $buffer .= $indent . '            c8.841,0,16.034-7.193,16.034-16.033C213.535,290.217,206.342,283.024,197.501,283.024z"/>
';
        $buffer .= $indent . '    </g>
';
        $buffer .= $indent . '</g>
';
        $buffer .= $indent . '</svg>
';
        $buffer .= $indent . '    </a>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '  
';
        $buffer .= $indent . '        <div class="navbarcallbacks">
';
        $buffer .= $indent . '            ';
        $value = $this->resolveValue($context->findDot('output.get_navbar_callbacks_data'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '        </div>
';
        $value = $context->findDot('output.search_box');
        $buffer .= $this->sectionE2562fcbd77029c1b5711289433b72fd($context, $indent, $value);
        $value = $context->find('langmenu');
        $buffer .= $this->section2a521dcf1a529f9936a3d9bc3fb7afe7($context, $indent, $value);
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->findDot('output.navbar_plugin_output'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '        <div class="d-flex align-items-stretch usermenu-container" data-region="usermenu">
';
        $value = $context->find('usermenu');
        $buffer .= $this->sectionE5695d2f8ae8540a988acfe2bf214d13($context, $indent, $value);
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->findDot('output.edit_switch'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</nav>
';
        $buffer .= $indent . '
';
        $value = $context->find('secondarymoremenu');
        $buffer .= $this->section1c204fa36c1da1286a2c7d01d7ddb52c($context, $indent, $value);
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('theme_moove/primary-drawer-mobile')) {
            $buffer .= $partial->renderInternal($context);
        }

        return $buffer;
    }

    private function section1880a930791c830b67e23ff34b5a4123(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'sitemenubar, admin';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'sitemenubar, admin';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB88b20c96dd523877b35fd7e4389a3fd(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'sidepanel, core';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'sidepanel, core';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionD6a9603318cb09006e95f8a3645c781a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <img src="{{output.get_logo}}" class="logo mr-1" alt="{{sitename}}">
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <img src="';
                $value = $this->resolveValue($context->findDot('output.get_logo'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" class="logo mr-1" alt="';
                $value = $this->resolveValue($context->find('sitename'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section9dc97ed0ab3b088a2ed611e0ffba83df(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <div class="primary-navigation">
            {{> core/moremenu}}
        </div>
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        <div class="primary-navigation">
';
                if ($partial = $this->mustache->loadPartial('core/moremenu')) {
                    $buffer .= $partial->renderInternal($context, $indent . '            ');
                }
                $buffer .= $indent . '        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE2562fcbd77029c1b5711289433b72fd(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            {{{ output.search_box }}}
            <div class="divider border-left h-75 align-self-center mx-1"></div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            ';
                $value = $this->resolveValue($context->findDot('output.search_box'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '            <div class="divider border-left h-75 align-self-center mx-1"></div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2a521dcf1a529f9936a3d9bc3fb7afe7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            {{> theme_moove/language_menu }}
            <div class="divider border-left h-75 align-self-center mx-1"></div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                if ($partial = $this->mustache->loadPartial('theme_moove/language_menu')) {
                    $buffer .= $partial->renderInternal($context, $indent . '            ');
                }
                $buffer .= $indent . '            <div class="divider border-left h-75 align-self-center mx-1"></div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE5695d2f8ae8540a988acfe2bf214d13(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                {{> core/user_menu }}
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                if ($partial = $this->mustache->loadPartial('core/user_menu')) {
                    $buffer .= $partial->renderInternal($context, $indent . '                ');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1c204fa36c1da1286a2c7d01d7ddb52c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <div class="secondary-navigation d-print-none moove">
        <div class="moove-container-fluid">
            {{> core/moremenu}}
        </div>
    </div>
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    <div class="secondary-navigation d-print-none moove">
';
                $buffer .= $indent . '        <div class="moove-container-fluid">
';
                if ($partial = $this->mustache->loadPartial('core/moremenu')) {
                    $buffer .= $partial->renderInternal($context, $indent . '            ');
                }
                $buffer .= $indent . '        </div>
';
                $buffer .= $indent . '    </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
