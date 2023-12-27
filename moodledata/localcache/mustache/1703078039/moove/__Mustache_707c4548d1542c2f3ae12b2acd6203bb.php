<?php

class __Mustache_707c4548d1542c2f3ae12b2acd6203bb extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        if ($partial = $this->mustache->loadPartial('theme_moove/head')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '<body ';
        $value = $this->resolveValue($context->find('bodyattributes'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '>
';
        if ($partial = $this->mustache->loadPartial('core/local/toast/wrapper')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '<div id="page-wrapper" class="d-print-block">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    ';
        $value = $this->resolveValue($context->findDot('output.standard_top_of_body_html'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('theme_moove/navbar')) {
            $buffer .= $partial->renderInternal($context, $indent . '    ');
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <div id="page" data-region="mainpage" data-usertour="scroller" class="drawers drag-container bg-white">
';
        $value = $context->find('slidercount');
        $buffer .= $this->sectionEafe8bb51865218a89b656b0cf876750($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('displaymarketingbox');
        $buffer .= $this->section100ed463c4b2cc1179ff15a15b8f510f($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('numbersfrontpage');
        $buffer .= $this->section7dfb11ba6f30b78284aabeb64ca43d53($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '        <div id="topofscroll">
';
        $buffer .= $indent . '            <div id="page-content" class="d-print-block main-inner">
';
        $buffer .= $indent . '                <div id="region-main-box">
';
        $buffer .= $indent . '                    <section id="region-main" aria-label="';
        $value = $context->find('str');
        $buffer .= $this->section6b403a6a78537640b9e04a931aeb6463($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '                        ';
        $value = $this->resolveValue($context->findDot('output.course_content_header'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '                        ';
        $value = $this->resolveValue($context->findDot('output.main_content'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '                        ';
        $value = $this->resolveValue($context->findDot('output.course_content_footer'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '                    </section>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '
';
        $value = $context->find('faqenabled');
        $buffer .= $this->sectionF2004cc1991e6b8c4a2ff413c366d003($context, $indent, $value);
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('theme_moove/footer')) {
            $buffer .= $partial->renderInternal($context, $indent . '        ');
        }
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    ';
        $value = $this->resolveValue($context->findDot('output.standard_after_main_region_html'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '</div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</body>
';
        $buffer .= $indent . '</html>
';
        $value = $context->find('js');
        $buffer .= $this->section8397d600017f65f298d8425ee0497b7d($context, $indent, $value);

        return $buffer;
    }

    private function section39fafbade5b4daabdb3367e1272d1046(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'class="active"';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'class="active"';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6638b978bf77256fc9eb71801e8b224a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <li data-target="#carousel-indicators" data-slide-to="{{{ key }}}" {{#active}}class="active"{{/active}}></li>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <li data-target="#carousel-indicators" data-slide-to="';
                $value = $this->resolveValue($context->find('key'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" ';
                $value = $context->find('active');
                $buffer .= $this->section39fafbade5b4daabdb3367e1272d1046($context, $indent, $value);
                $buffer .= '></li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5749c750acb0d7477dd5257d00cc6d53(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'active';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'active';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA36cdb3e2aec67314c28515896867b65(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                            <h5 class="title">{{.}}</h5>
                                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                            <h5 class="title">';
                $value = $this->resolveValue($context->last(), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</h5>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3eacdc25cb00b19ec20e4f8b997438a1(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                            <div class="caption">
                                                {{{.}}}
                                            </div>
                                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                            <div class="caption">
';
                $buffer .= $indent . '                                                ';
                $value = $this->resolveValue($context->last(), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section69d158a7e316a8bb243173fa127ef272(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                    <div class="carousel-caption d-none d-md-block">
                                        {{#title}}
                                            <h5 class="title">{{.}}</h5>
                                        {{/title}}
                                        {{#caption}}
                                            <div class="caption">
                                                {{{.}}}
                                            </div>
                                        {{/caption}}
                                    </div>
                                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                    <div class="carousel-caption d-none d-md-block">
';
                $value = $context->find('title');
                $buffer .= $this->sectionA36cdb3e2aec67314c28515896867b65($context, $indent, $value);
                $value = $context->find('caption');
                $buffer .= $this->section3eacdc25cb00b19ec20e4f8b997438a1($context, $indent, $value);
                $buffer .= $indent . '                                    </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section61354bce65becaf3d96c585a72c9382c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <div class="carousel-item {{#active}}active{{/active}}">
                                <img src="{{image}}" alt="{{slidertitle}}" class="w-100">
                                {{#hascaption}}
                                    <div class="carousel-caption d-none d-md-block">
                                        {{#title}}
                                            <h5 class="title">{{.}}</h5>
                                        {{/title}}
                                        {{#caption}}
                                            <div class="caption">
                                                {{{.}}}
                                            </div>
                                        {{/caption}}
                                    </div>
                                {{/hascaption}}
                            </div>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <div class="carousel-item ';
                $value = $context->find('active');
                $buffer .= $this->section5749c750acb0d7477dd5257d00cc6d53($context, $indent, $value);
                $buffer .= '">
';
                $buffer .= $indent . '                                <img src="';
                $value = $this->resolveValue($context->find('image'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" alt="';
                $value = $this->resolveValue($context->find('slidertitle'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" class="w-100">
';
                $value = $context->find('hascaption');
                $buffer .= $this->section69d158a7e316a8bb243173fa127ef272($context, $indent, $value);
                $buffer .= $indent . '                            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6082c1f5941a12f77083512a9a2e6a62(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'previous';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'previous';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBa8bb7b1bb267b8cc98d38fe4bf9f047(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'next';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'next';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionEafe8bb51865218a89b656b0cf876750(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div id="mooveslideshow" class="container-fluid">
                <div id="carousel-indicators" class="carousel slide carousel-fade" data-ride="carousel">
                    {{^slidersingleslide}}
                    <ol class="carousel-indicators">
                        {{#slides}}
                            <li data-target="#carousel-indicators" data-slide-to="{{{ key }}}" {{#active}}class="active"{{/active}}></li>
                        {{/slides}}
                    </ol>
                    {{/slidersingleslide}}
                    <div class="carousel-inner">
                        {{#slides}}
                            <div class="carousel-item {{#active}}active{{/active}}">
                                <img src="{{image}}" alt="{{slidertitle}}" class="w-100">
                                {{#hascaption}}
                                    <div class="carousel-caption d-none d-md-block">
                                        {{#title}}
                                            <h5 class="title">{{.}}</h5>
                                        {{/title}}
                                        {{#caption}}
                                            <div class="caption">
                                                {{{.}}}
                                            </div>
                                        {{/caption}}
                                    </div>
                                {{/hascaption}}
                            </div>
                        {{/slides}}
                    </div>
                    {{^slidersingleslide}}
                    <a class="carousel-control-prev" href="#carousel-indicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">{{#str}}previous{{/str}}</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-indicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">{{#str}}next{{/str}}</span>
                    </a>
                    {{/slidersingleslide}}
                </div>
            </div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div id="mooveslideshow" class="container-fluid">
';
                $buffer .= $indent . '                <div id="carousel-indicators" class="carousel slide carousel-fade" data-ride="carousel">
';
                $value = $context->find('slidersingleslide');
                if (empty($value)) {
                    
                    $buffer .= $indent . '                    <ol class="carousel-indicators">
';
                    $value = $context->find('slides');
                    $buffer .= $this->section6638b978bf77256fc9eb71801e8b224a($context, $indent, $value);
                    $buffer .= $indent . '                    </ol>
';
                }
                $buffer .= $indent . '                    <div class="carousel-inner">
';
                $value = $context->find('slides');
                $buffer .= $this->section61354bce65becaf3d96c585a72c9382c($context, $indent, $value);
                $buffer .= $indent . '                    </div>
';
                $value = $context->find('slidersingleslide');
                if (empty($value)) {
                    
                    $buffer .= $indent . '                    <a class="carousel-control-prev" href="#carousel-indicators" role="button" data-slide="prev">
';
                    $buffer .= $indent . '                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
';
                    $buffer .= $indent . '                        <span class="sr-only">';
                    $value = $context->find('str');
                    $buffer .= $this->section6082c1f5941a12f77083512a9a2e6a62($context, $indent, $value);
                    $buffer .= '</span>
';
                    $buffer .= $indent . '                    </a>
';
                    $buffer .= $indent . '                    <a class="carousel-control-next" href="#carousel-indicators" role="button" data-slide="next">
';
                    $buffer .= $indent . '                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
';
                    $buffer .= $indent . '                        <span class="sr-only">';
                    $value = $context->find('str');
                    $buffer .= $this->sectionBa8bb7b1bb267b8cc98d38fe4bf9f047($context, $indent, $value);
                    $buffer .= '</span>
';
                    $buffer .= $indent . '                    </a>
';
                }
                $buffer .= $indent . '                </div>
';
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA11d9cec1f6b588974d15095f6c2b557(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                    <div class="col-sm-6 mt-4">
                                        <div class="card card-body shadow">
                                            <div class="d-flex">
                                                <div class="icon-lg text-white rounded-circle">
                                                    <img src="{{{icon}}}">
                                                </div>
                                                <div class="col ps-3">
                                                    <h5>{{{heading}}}</h5>
                                                    <div class="box-content">{{{content}}}</div>
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
                
                $buffer .= $indent . '                                    <div class="col-sm-6 mt-4">
';
                $buffer .= $indent . '                                        <div class="card card-body shadow">
';
                $buffer .= $indent . '                                            <div class="d-flex">
';
                $buffer .= $indent . '                                                <div class="icon-lg text-white rounded-circle">
';
                $buffer .= $indent . '                                                    <img src="';
                $value = $this->resolveValue($context->find('icon'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '">
';
                $buffer .= $indent . '                                                </div>
';
                $buffer .= $indent . '                                                <div class="col ps-3">
';
                $buffer .= $indent . '                                                    <h5>';
                $value = $this->resolveValue($context->find('heading'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</h5>
';
                $buffer .= $indent . '                                                    <div class="box-content">';
                $value = $this->resolveValue($context->find('content'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</div>
';
                $buffer .= $indent . '                                                </div>
';
                $buffer .= $indent . '                                            </div>
';
                $buffer .= $indent . '                                        </div>
';
                $buffer .= $indent . '                                    </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section100ed463c4b2cc1179ff15a15b8f510f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <section id="feature">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 my-3">
                            <h3 class="h1 mt-3 mb-3">{{{marketingheading}}}</h3>
                            <div class="marketing-content">{{{marketingcontent}}}</div>
                        </div>
                        <div class="col-lg-8 ps-xl-8">
                            <div class="row">
                                {{#marketingboxes}}
                                    <div class="col-sm-6 mt-4">
                                        <div class="card card-body shadow">
                                            <div class="d-flex">
                                                <div class="icon-lg text-white rounded-circle">
                                                    <img src="{{{icon}}}">
                                                </div>
                                                <div class="col ps-3">
                                                    <h5>{{{heading}}}</h5>
                                                    <div class="box-content">{{{content}}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{/marketingboxes}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <section id="feature">
';
                $buffer .= $indent . '                <div class="container">
';
                $buffer .= $indent . '                    <div class="row">
';
                $buffer .= $indent . '                        <div class="col-lg-4 my-3">
';
                $buffer .= $indent . '                            <h3 class="h1 mt-3 mb-3">';
                $value = $this->resolveValue($context->find('marketingheading'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</h3>
';
                $buffer .= $indent . '                            <div class="marketing-content">';
                $value = $this->resolveValue($context->find('marketingcontent'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</div>
';
                $buffer .= $indent . '                        </div>
';
                $buffer .= $indent . '                        <div class="col-lg-8 ps-xl-8">
';
                $buffer .= $indent . '                            <div class="row">
';
                $value = $context->find('marketingboxes');
                $buffer .= $this->sectionA11d9cec1f6b588974d15095f6c2b557($context, $indent, $value);
                $buffer .= $indent . '                            </div>
';
                $buffer .= $indent . '                        </div>
';
                $buffer .= $indent . '                    </div>
';
                $buffer .= $indent . '                </div>
';
                $buffer .= $indent . '            </section>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionEebda8ccf20355c1f145216979119901(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'numbersusers, theme_moove';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'numbersusers, theme_moove';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionFcdb637207015834c8999dd80fdc9806(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'numberscourses, theme_moove';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'numberscourses, theme_moove';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section7dfb11ba6f30b78284aabeb64ca43d53(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <section id="numbers">
                <div class="moove-container-fluid">
                    <div class="row customer-area-l1 justify-content-center align-items-center ">
                        <div class="col-xl-5 col-lg-5 col-md-10">
                            <div class="sectionheading">
                                {{{numberscontent}}}
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7 col-md-10 offset-xl-1">
                            <div class="row user-rating-box-area">
                                <div class="col-sm-6 col-xs-8">
                                    <div class="h-100 rate-box bg-primary">
                                        <h3>
                                            {{{numbersusers}}}
                                        </h3>
                                        <p>{{#str}}numbersusers, theme_moove{{/str}}</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-8">
                                    <div class="h-100 rate-box rate-box-2 bg-cloudburst">
                                        <h3>
                                            {{{numberscourses}}}
                                        </h3>
                                        <p>{{#str}}numberscourses, theme_moove{{/str}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <section id="numbers">
';
                $buffer .= $indent . '                <div class="moove-container-fluid">
';
                $buffer .= $indent . '                    <div class="row customer-area-l1 justify-content-center align-items-center ">
';
                $buffer .= $indent . '                        <div class="col-xl-5 col-lg-5 col-md-10">
';
                $buffer .= $indent . '                            <div class="sectionheading">
';
                $buffer .= $indent . '                                ';
                $value = $this->resolveValue($context->find('numberscontent'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                            </div>
';
                $buffer .= $indent . '                        </div>
';
                $buffer .= $indent . '                        <div class="col-xl-6 col-lg-7 col-md-10 offset-xl-1">
';
                $buffer .= $indent . '                            <div class="row user-rating-box-area">
';
                $buffer .= $indent . '                                <div class="col-sm-6 col-xs-8">
';
                $buffer .= $indent . '                                    <div class="h-100 rate-box bg-primary">
';
                $buffer .= $indent . '                                        <h3>
';
                $buffer .= $indent . '                                            ';
                $value = $this->resolveValue($context->find('numbersusers'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                        </h3>
';
                $buffer .= $indent . '                                        <p>';
                $value = $context->find('str');
                $buffer .= $this->sectionEebda8ccf20355c1f145216979119901($context, $indent, $value);
                $buffer .= '</p>
';
                $buffer .= $indent . '                                    </div>
';
                $buffer .= $indent . '                                </div>
';
                $buffer .= $indent . '                                <div class="col-sm-6 col-xs-8">
';
                $buffer .= $indent . '                                    <div class="h-100 rate-box rate-box-2 bg-cloudburst">
';
                $buffer .= $indent . '                                        <h3>
';
                $buffer .= $indent . '                                            ';
                $value = $this->resolveValue($context->find('numberscourses'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                        </h3>
';
                $buffer .= $indent . '                                        <p>';
                $value = $context->find('str');
                $buffer .= $this->sectionFcdb637207015834c8999dd80fdc9806($context, $indent, $value);
                $buffer .= '</p>
';
                $buffer .= $indent . '                                    </div>
';
                $buffer .= $indent . '                                </div>
';
                $buffer .= $indent . '                            </div>
';
                $buffer .= $indent . '                        </div>
';
                $buffer .= $indent . '                    </div>
';
                $buffer .= $indent . '                </div>
';
                $buffer .= $indent . '            </section>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6b403a6a78537640b9e04a931aeb6463(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'content';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'content';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section4751be753bef83b9cd391960a73b2d18(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'faq, theme_moove';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'faq, theme_moove';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC3cc51e72be08cb850dac9be27417639(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <div class="card shadow">
                                <div class="card-header" id="heading-{{{id}}}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{{id}}}" aria-expanded="false" aria-controls="collapse-{{{id}}}">
                                            {{{question}}}
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapse-{{{id}}}" class="collapse" aria-labelledby="heading-{{{id}}}" data-parent="#accordionFaq">
                                    <div class="card-body">
                                        {{{answer}}}
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
                
                $buffer .= $indent . '                            <div class="card shadow">
';
                $buffer .= $indent . '                                <div class="card-header" id="heading-';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '">
';
                $buffer .= $indent . '                                    <h2 class="mb-0">
';
                $buffer .= $indent . '                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" aria-expanded="false" aria-controls="collapse-';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '">
';
                $buffer .= $indent . '                                            ';
                $value = $this->resolveValue($context->find('question'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                        </button>
';
                $buffer .= $indent . '                                    </h2>
';
                $buffer .= $indent . '                                </div>
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '                                <div id="collapse-';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" class="collapse" aria-labelledby="heading-';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" data-parent="#accordionFaq">
';
                $buffer .= $indent . '                                    <div class="card-body">
';
                $buffer .= $indent . '                                        ';
                $value = $this->resolveValue($context->find('answer'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                    </div>
';
                $buffer .= $indent . '                                </div>
';
                $buffer .= $indent . '                            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF2004cc1991e6b8c4a2ff413c366d003(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <section id="faq" class="scale-up scale-up-show">
                <div class="moove-container-fluid">
                    <h2>{{#str}}faq, theme_moove{{/str}}</h2>

                    <div class="accordion" id="accordionFaq">
                        {{#faq}}
                            <div class="card shadow">
                                <div class="card-header" id="heading-{{{id}}}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{{id}}}" aria-expanded="false" aria-controls="collapse-{{{id}}}">
                                            {{{question}}}
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapse-{{{id}}}" class="collapse" aria-labelledby="heading-{{{id}}}" data-parent="#accordionFaq">
                                    <div class="card-body">
                                        {{{answer}}}
                                    </div>
                                </div>
                            </div>
                        {{/faq}}
                    </div>
                </div>
            </section>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <section id="faq" class="scale-up scale-up-show">
';
                $buffer .= $indent . '                <div class="moove-container-fluid">
';
                $buffer .= $indent . '                    <h2>';
                $value = $context->find('str');
                $buffer .= $this->section4751be753bef83b9cd391960a73b2d18($context, $indent, $value);
                $buffer .= '</h2>
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '                    <div class="accordion" id="accordionFaq">
';
                $value = $context->find('faq');
                $buffer .= $this->sectionC3cc51e72be08cb850dac9be27417639($context, $indent, $value);
                $buffer .= $indent . '                    </div>
';
                $buffer .= $indent . '                </div>
';
                $buffer .= $indent . '            </section>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8397d600017f65f298d8425ee0497b7d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
M.util.js_pending(\'theme_boost/loader\');
require([\'theme_boost/loader\', \'theme_boost/drawer\'], function(Loader, Drawer) {
    Drawer.init();
    M.util.js_complete(\'theme_boost/loader\');
});
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . 'M.util.js_pending(\'theme_boost/loader\');
';
                $buffer .= $indent . 'require([\'theme_boost/loader\', \'theme_boost/drawer\'], function(Loader, Drawer) {
';
                $buffer .= $indent . '    Drawer.init();
';
                $buffer .= $indent . '    M.util.js_complete(\'theme_boost/loader\');
';
                $buffer .= $indent . '});
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
