<?php

class __Mustache_ad4748b309248bddd133d0a58bfaf243 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '
';
        $buffer .= $indent . '<footer id="page-footer">
';
        $buffer .= $indent . '    <div class="moove-container-fluid footer-columns">
';
        $buffer .= $indent . '        <div class="row">
';
        $buffer .= $indent . '            <div class="col-md-4 column-left">
';
        $buffer .= $indent . '                <div class="contact">
';
        $buffer .= $indent . '                    <h3 class="footer-title">';
        $value = $context->find('str');
        $buffer .= $this->sectionC383ddc1425fec8af2979220a8f6608a($context, $indent, $value);
        $buffer .= '</h3>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                    <ul>
';
        $value = $context->find('website');
        $buffer .= $this->section1c174a8200e2b9fc933439a0e347adbf($context, $indent, $value);
        $value = $context->find('mobile');
        $buffer .= $this->section08834cfca6b20342a9f7bf6e489e95c9($context, $indent, $value);
        $value = $context->find('mail');
        $buffer .= $this->section63bc1f18533e2f43d4d8c3ccad16b0f4($context, $indent, $value);
        $buffer .= $indent . '                    </ul>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                <div class="socialnetworks">
';
        $buffer .= $indent . '                    <h3 class="footer-title">';
        $value = $context->find('str');
        $buffer .= $this->section195e71f8828641c845dfa5605fcf44a6($context, $indent, $value);
        $buffer .= '</h3>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                    <ul class="mb-0">
';
        $value = $context->find('facebook');
        $buffer .= $this->section254b60be66bcffc312c2293839b5a770($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('twitter');
        $buffer .= $this->section175416c4ec193224971628f2a72f8dd2($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('linkedin');
        $buffer .= $this->sectionA7c1f6c58c0561d63ce123b30cbf6455($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('youtube');
        $buffer .= $this->section875108e4c1d49f3c65db9e6db20ef579($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('instagram');
        $buffer .= $this->sectionC1215aa388bf986cf267e881b903e95e($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('whatsapp');
        $buffer .= $this->sectionB77bbf4448ef6511aa8a6a45aa23531b($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('telegram');
        $buffer .= $this->sectionBcfa729c1efd5eeec90c05a19d127d81($context, $indent, $value);
        $buffer .= $indent . '                    </ul>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '            <div class="col-md-4 column-center">
';
        $value = $context->findDot('output.supportemail');
        $buffer .= $this->section2543efcb43e29bf3b0d888b8a56625e6($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '                ';
        $value = $this->resolveValue($context->findDot('output.login_info'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                ';
        $value = $this->resolveValue($context->findDot('output.standard_footer_html'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                <div class="tool_usertours-resettourcontainer"></div>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '            <div class="col-md-4 column-right">
';
        $value = $context->find('enablemobilewebservice');
        $buffer .= $this->sectionBbbd3deb329dac8e34e96b1f742fe016($context, $indent, $value);
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <div class="footer-content-debugging footer-dark bg-dark text-light">
';
        $buffer .= $indent . '        <div class="moove-container-fluid footer-dark-inner">
';
        $buffer .= $indent . '            ';
        $value = $this->resolveValue($context->findDot('output.debug_footer_html'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <div data-region="footer-container-popover">
';
        $buffer .= $indent . '        <button class="btn btn-icon bg-secondary icon-no-margin btn-footer-popover" data-action="footer-popover" aria-label="';
        $value = $context->find('str');
        $buffer .= $this->section5a5198f26dc6ad191d1a18c314235d65($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '            ';
        $value = $context->find('pix');
        $buffer .= $this->section46f926dcc61094038ebb3542556c1993($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '        </button>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <div class="footer-content-popover container" data-region="footer-content-popover">
';
        $value = $context->findDot('output.has_popover_links');
        $buffer .= $this->sectionFc631521605d0fd7afefecb305f15d29($context, $indent, $value);
        $buffer .= $indent . '        <div class="footer-section p-3">
';
        $buffer .= $indent . '            <div>';
        $value = $context->find('str');
        $buffer .= $this->section3cef0c729bd31199c0f96ce94b38f287($context, $indent, $value);
        $buffer .= '</div>
';
        $value = $context->findDot('output.moodle_release');
        $buffer .= $this->section73bb8cb2a5e4cb71f2710d52886fa70e($context, $indent, $value);
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <div class="copyright">
';
        $buffer .= $indent . '        <div class="madeby">
';
        $buffer .= $indent . '            <p>';
        $value = $context->find('str');
        $buffer .= $this->section9382e9bc59c4b409754e999c5b6665bd($context, $indent, $value);
        $buffer .= '</p>
';
        $buffer .= $indent . '            <a href="https://conecti.me">
';
        $buffer .= $indent . '                <img src="';
        $value = $this->resolveValue($context->findDot('config.wwwroot'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '/theme/moove/pix/logo_conectime.svg" alt="Conecti.me" style="height: 40px;">
';
        $buffer .= $indent . '            </a>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</footer>
';
        $buffer .= $indent . '
';
        $value = $this->resolveValue($context->findDot('output.standard_end_of_body_html'), $context);
        $buffer .= $indent . ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $value = $context->find('js');
        $buffer .= $this->section559b18aa79489851f0fb2e1453416c9b($context, $indent, $value);

        return $buffer;
    }

    private function sectionC383ddc1425fec8af2979220a8f6608a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'contactus, theme_moove';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'contactus, theme_moove';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1c174a8200e2b9fc933439a0e347adbf(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <li>
                                <a href="{{{website}}}" target="_blank" class="website btn btn-link">
                                    <i class="fa fa-globe"></i>
                                </a>
                            </li>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <li>
';
                $buffer .= $indent . '                                <a href="';
                $value = $this->resolveValue($context->find('website'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" target="_blank" class="website btn btn-link">
';
                $buffer .= $indent . '                                    <i class="fa fa-globe"></i>
';
                $buffer .= $indent . '                                </a>
';
                $buffer .= $indent . '                            </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section08834cfca6b20342a9f7bf6e489e95c9(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <li>
                                <a href="tel:{{{mobile}}}" target="_blank" class="mobile btn btn-link">
                                    <i class="fa fa-phone"></i>
                                </a>
                            </li>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <li>
';
                $buffer .= $indent . '                                <a href="tel:';
                $value = $this->resolveValue($context->find('mobile'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" target="_blank" class="mobile btn btn-link">
';
                $buffer .= $indent . '                                    <i class="fa fa-phone"></i>
';
                $buffer .= $indent . '                                </a>
';
                $buffer .= $indent . '                            </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section63bc1f18533e2f43d4d8c3ccad16b0f4(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <li>
                                <a href="mailto:{{{mail}}}" target="_blank" class="mail btn btn-link">
                                    <i class="fa fa-envelope"></i>
                                </a>
                            </li>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <li>
';
                $buffer .= $indent . '                                <a href="mailto:';
                $value = $this->resolveValue($context->find('mail'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" target="_blank" class="mail btn btn-link">
';
                $buffer .= $indent . '                                    <i class="fa fa-envelope"></i>
';
                $buffer .= $indent . '                                </a>
';
                $buffer .= $indent . '                            </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section195e71f8828641c845dfa5605fcf44a6(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'followus, theme_moove';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'followus, theme_moove';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section254b60be66bcffc312c2293839b5a770(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <li>
                                <a href="{{{facebook}}}" target="_blank" class="facebook btn btn-link btn-rounded">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <li>
';
                $buffer .= $indent . '                                <a href="';
                $value = $this->resolveValue($context->find('facebook'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" target="_blank" class="facebook btn btn-link btn-rounded">
';
                $buffer .= $indent . '                                    <i class="fa fa-facebook"></i>
';
                $buffer .= $indent . '                                </a>
';
                $buffer .= $indent . '                            </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section175416c4ec193224971628f2a72f8dd2(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <li>
                                <a href="{{{twitter}}}" target="_blank" class="twitter btn btn-link btn-rounded">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <li>
';
                $buffer .= $indent . '                                <a href="';
                $value = $this->resolveValue($context->find('twitter'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" target="_blank" class="twitter btn btn-link btn-rounded">
';
                $buffer .= $indent . '                                    <i class="fa fa-twitter"></i>
';
                $buffer .= $indent . '                                </a>
';
                $buffer .= $indent . '                            </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA7c1f6c58c0561d63ce123b30cbf6455(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <li>
                                <a href="{{{linkedin}}}" target="_blank" class="linkedin btn btn-link btn-rounded">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <li>
';
                $buffer .= $indent . '                                <a href="';
                $value = $this->resolveValue($context->find('linkedin'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" target="_blank" class="linkedin btn btn-link btn-rounded">
';
                $buffer .= $indent . '                                    <i class="fa fa-linkedin"></i>
';
                $buffer .= $indent . '                                </a>
';
                $buffer .= $indent . '                            </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section875108e4c1d49f3c65db9e6db20ef579(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <li>
                                <a href="{{{youtube}}}" target="_blank" class="youtube btn btn-link btn-rounded">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <li>
';
                $buffer .= $indent . '                                <a href="';
                $value = $this->resolveValue($context->find('youtube'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" target="_blank" class="youtube btn btn-link btn-rounded">
';
                $buffer .= $indent . '                                    <i class="fa fa-youtube"></i>
';
                $buffer .= $indent . '                                </a>
';
                $buffer .= $indent . '                            </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC1215aa388bf986cf267e881b903e95e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <li>
                                <a href="{{{instagram}}}" target="_blank" class="instagram btn btn-link btn-rounded">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <li>
';
                $buffer .= $indent . '                                <a href="';
                $value = $this->resolveValue($context->find('instagram'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" target="_blank" class="instagram btn btn-link btn-rounded">
';
                $buffer .= $indent . '                                    <i class="fa fa-instagram"></i>
';
                $buffer .= $indent . '                                </a>
';
                $buffer .= $indent . '                            </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB77bbf4448ef6511aa8a6a45aa23531b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <li>
                                <a href="https://api.whatsapp.com/send?phone={{{whatsapp}}}" target="_blank" class="whatsapp btn btn-link btn-rounded">
                                    <i class="fa fa-whatsapp"></i>
                                </a>
                            </li>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <li>
';
                $buffer .= $indent . '                                <a href="https://api.whatsapp.com/send?phone=';
                $value = $this->resolveValue($context->find('whatsapp'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" target="_blank" class="whatsapp btn btn-link btn-rounded">
';
                $buffer .= $indent . '                                    <i class="fa fa-whatsapp"></i>
';
                $buffer .= $indent . '                                </a>
';
                $buffer .= $indent . '                            </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBcfa729c1efd5eeec90c05a19d127d81(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <li>
                                <a href="{{{telegram}}}" target="_blank" class="telegram btn btn-link btn-rounded">
                                    <i class="fa fa-telegram"></i>
                                </a>
                            </li>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <li>
';
                $buffer .= $indent . '                                <a href="';
                $value = $this->resolveValue($context->find('telegram'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" target="_blank" class="telegram btn btn-link btn-rounded">
';
                $buffer .= $indent . '                                    <i class="fa fa-telegram"></i>
';
                $buffer .= $indent . '                                </a>
';
                $buffer .= $indent . '                            </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2543efcb43e29bf3b0d888b8a56625e6(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                    <div class="supportemail">{{{ output.supportemail }}}</div>
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                    <div class="supportemail">';
                $value = $this->resolveValue($context->findDot('output.supportemail'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionD652fa6441125a6e092e0ca367dbfa54(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'getmoodleonyourmobile, tool_mobile';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'getmoodleonyourmobile, tool_mobile';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8bd610f4f6ec2182bfc48083ee41f00b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        <a href="{{{mobilesetuplink}}}">{{#str}}getmoodleonyourmobile, tool_mobile{{/str}}</a>
                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                        <a href="';
                $value = $this->resolveValue($context->find('mobilesetuplink'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '">';
                $value = $context->find('str');
                $buffer .= $this->sectionD652fa6441125a6e092e0ca367dbfa54($context, $indent, $value);
                $buffer .= '</a>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1352a3fc3ae49df21cf930486534e9c5(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <a href="https://play.google.com/store/apps/details?id={{androidappid}}">
                                <img src="{{config.wwwroot}}/theme/moove/pix/store_google.svg" alt="Play Store">
                            </a>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <a href="https://play.google.com/store/apps/details?id=';
                $value = $this->resolveValue($context->find('androidappid'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $buffer .= $indent . '                                <img src="';
                $value = $this->resolveValue($context->findDot('config.wwwroot'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '/theme/moove/pix/store_google.svg" alt="Play Store">
';
                $buffer .= $indent . '                            </a>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section0959e37b22970b4f1d6f071cf61152c5(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <a class="mt-1" href="https://apps.apple.com/app/id{{iosappid}}">
                                <img src="{{config.wwwroot}}/theme/moove/pix/store_apple.svg" alt="App Store">
                            </a>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                            <a class="mt-1" href="https://apps.apple.com/app/id';
                $value = $this->resolveValue($context->find('iosappid'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $buffer .= $indent . '                                <img src="';
                $value = $this->resolveValue($context->findDot('config.wwwroot'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '/theme/moove/pix/store_apple.svg" alt="App Store">
';
                $buffer .= $indent . '                            </a>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBbbd3deb329dac8e34e96b1f742fe016(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                    {{#mobilesetuplink}}
                        <a href="{{{mobilesetuplink}}}">{{#str}}getmoodleonyourmobile, tool_mobile{{/str}}</a>
                    {{/mobilesetuplink}}
                    {{^mobilesetuplink}}
                        <h3 class="footer-title">{{#str}}getmoodleonyourmobile, tool_mobile{{/str}}</h3>
                    {{/mobilesetuplink}}
                    <div class="stores">
                        {{#androidappid}}
                            <a href="https://play.google.com/store/apps/details?id={{androidappid}}">
                                <img src="{{config.wwwroot}}/theme/moove/pix/store_google.svg" alt="Play Store">
                            </a>
                        {{/androidappid}}
                        {{#iosappid}}
                            <a class="mt-1" href="https://apps.apple.com/app/id{{iosappid}}">
                                <img src="{{config.wwwroot}}/theme/moove/pix/store_apple.svg" alt="App Store">
                            </a>
                        {{/iosappid}}
                    </div>
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('mobilesetuplink');
                $buffer .= $this->section8bd610f4f6ec2182bfc48083ee41f00b($context, $indent, $value);
                $value = $context->find('mobilesetuplink');
                if (empty($value)) {
                    
                    $buffer .= $indent . '                        <h3 class="footer-title">';
                    $value = $context->find('str');
                    $buffer .= $this->sectionD652fa6441125a6e092e0ca367dbfa54($context, $indent, $value);
                    $buffer .= '</h3>
';
                }
                $buffer .= $indent . '                    <div class="stores">
';
                $value = $context->find('androidappid');
                $buffer .= $this->section1352a3fc3ae49df21cf930486534e9c5($context, $indent, $value);
                $value = $context->find('iosappid');
                $buffer .= $this->section0959e37b22970b4f1d6f071cf61152c5($context, $indent, $value);
                $buffer .= $indent . '                    </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5a5198f26dc6ad191d1a18c314235d65(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'showfooter, theme_boost';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'showfooter, theme_boost';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section46f926dcc61094038ebb3542556c1993(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'e/question, core';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'e/question, core';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section235cbcf578914b3b2a1ce102d5fef450(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                    <div>{{{ output.page_doc_link }}}</div>
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                    <div>';
                $value = $this->resolveValue($context->findDot('output.page_doc_link'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section62a09bf45708b66afa4d9ff4a387ec76(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                    <div>{{{ output.services_support_link }}}</div>
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                    <div>';
                $value = $this->resolveValue($context->findDot('output.services_support_link'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionFc631521605d0fd7afefecb305f15d29(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div class="footer-section p-3 border-bottom">
                {{# output.page_doc_link }}
                    <div>{{{ output.page_doc_link }}}</div>
                {{/ output.page_doc_link }}

                {{# output.services_support_link }}
                    <div>{{{ output.services_support_link }}}</div>
                {{/ output.services_support_link }}
            </div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div class="footer-section p-3 border-bottom">
';
                $value = $context->findDot('output.page_doc_link');
                $buffer .= $this->section235cbcf578914b3b2a1ce102d5fef450($context, $indent, $value);
                $buffer .= $indent . '
';
                $value = $context->findDot('output.services_support_link');
                $buffer .= $this->section62a09bf45708b66afa4d9ff4a387ec76($context, $indent, $value);
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3cef0c729bd31199c0f96ce94b38f287(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'poweredbymoodle, core';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'poweredbymoodle, core';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionEbadd554e70ec7af082056d50928f237(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'version, core';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'version, core';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section73bb8cb2a5e4cb71f2710d52886fa70e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div>
                    {{#str}}version, core{{/str}} {{{ output.moodle_release }}}
                </div>
            ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <div>
';
                $buffer .= $indent . '                    ';
                $value = $context->find('str');
                $buffer .= $this->sectionEbadd554e70ec7af082056d50928f237($context, $indent, $value);
                $buffer .= ' ';
                $value = $this->resolveValue($context->findDot('output.moodle_release'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section9382e9bc59c4b409754e999c5b6665bd(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'themedevelopedby, theme_moove';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'themedevelopedby, theme_moove';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section559b18aa79489851f0fb2e1453416c9b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    require([\'theme_boost/footer-popover\'], function(FooterPopover) {
        FooterPopover.init();
    });
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    require([\'theme_boost/footer-popover\'], function(FooterPopover) {
';
                $buffer .= $indent . '        FooterPopover.init();
';
                $buffer .= $indent . '    });
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
