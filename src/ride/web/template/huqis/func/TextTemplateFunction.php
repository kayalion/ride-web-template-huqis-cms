<?php

namespace ride\web\template\huqis\func;

use huqis\func\TemplateFunction;
use huqis\TemplateContext;

use ride\library\cms\content\text\TextParser;

class TextTemplateFunction implements TemplateFunction {

    private $textParser;

    public function __construct(TextParser $textParser) {
        $this->textParser = $textParser;
    }

    public function call(TemplateContext $context, array $arguments) {
        if (!$arguments) {
            throw new Exception('No text found to parse');
        }

        $this->textParser->setNode($context->getVariable('app.cms.node'));
        $this->textParser->setLocale($context->getVariable('app.locale', 'en'));

        return $this->textParser->parseText($arguments[0]);
    }

}
