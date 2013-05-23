<?php

class __Mustache_c4ac0382cd28be50d5d9bc3e71ddbc00 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . 'Hello ';
        $value = $this->resolveValue($context->find('name'), $context, $indent);
        $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        $buffer .= ', you have just won $';
        $value = $this->resolveValue($context->find('value'), $context, $indent);
        $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        $buffer .= '!';
        $buffer .= "\n";
        $buffer .= $indent . 'This is next line.';
        $buffer .= "\n";
        // 'test' section
        $buffer .= $this->section364d5f021cd691fbea8663fa93d71f2e($context, $indent, $context->find('test'));
        // 'test' inverted section
        $value = $context->find('test');
        if (empty($value)) {
            
            $buffer .= $indent . 'No, this is fake! not win $';
            $value = $this->resolveValue($context->find('value'), $context, $indent);
            $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
            $buffer .= '!!';
            $buffer .= "\n";
        }

        return $buffer;
    }

    private function section364d5f021cd691fbea8663fa93d71f2e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        if (!is_string($value) && is_callable($value)) {
            $source = '
This is true! won ${{value}}!!
';
            $buffer .= $this->mustache
                ->loadLambda((string) call_user_func($value, $source, $this->lambdaHelper))
                ->renderInternal($context, $indent);
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                $buffer .= $indent . 'This is true! won $';
                $value = $this->resolveValue($context->find('value'), $context, $indent);
                $buffer .= htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
                $buffer .= '!!';
                $buffer .= "\n";
                $context->pop();
            }
        }
    
        return $buffer;
    }
}
