<?php

declare(strict_types=1);

namespace Cacing69\Cquery\Adapter;

use Cacing69\Cquery\CallbackAdapter;

class IntegerCallbackAdapter extends CallbackAdapter
{
    protected static $signature = '/^\s*int\(\s*(.*?)\s*\)\s*$/is';

    public static function getSignature()
    {
        return self::$signature;
    }

    public function __construct(string $raw)
    {
        $this->raw = $raw;

        $this->callback = function (string $value) {
            return intval($value);
        };

        // check if function is nested
        if (preg_match('/^\s?int\(\s?([a-z0-9_]*\(.+?\))\s?\)$/', $raw)) {
            preg_match('/^\s?int\(\s?([a-z0-9_]*\(.+?\))\s?\)$/', $raw, $extract);

            $extractChild = $this->extractChild($extract[1]);
            $_childCallback = $extractChild->getAdapter()->getCallback();

            if($_childCallback) {
                $this->callback = function (string $value) use ($_childCallback) {
                    return intval((string) $_childCallback($value));
                };
            }
        } else {
            preg_match(self::$signature, $raw, $node);

            $this->node = $node[1];

            $this->callMethod = "extract";
            $this->callMethodParameter = ["_text"];
        }
    }
}
