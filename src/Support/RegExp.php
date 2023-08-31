<?php

namespace Cacing69\Cquery\Support;

class RegExp
{
    public const IS_ATTRIBUTE = '/^\s*attr\(\s*(.*?)\s*,\s*(.*?)\s*\)\s*$/is';
    public const IS_LENGTH = '/^\s*length\(\s*(.*?)\s*\)\s*$/is';
    public const IS_UPPER = '/^\s*upper\(\s*(.*?)\s*\)\s*$/is';
    public const IS_LOWER = '/^\s*lower\(\s*(.*?)\s*\)\s*$/is';
    public const IS_REVERSE = '/^\s*reverse\(\s*(.*?)\s*\)\s*$/is';
    public const IS_DEFINER_HAVE_ALIAS = '/.+\s+?as\s+?.+/is';
    public const IS_SOURCE_HAVE_ALIAS = '/\s*?\(\s*?(.*)\s*?\)\s+as\s+(.*)$/is';
    public const IS_FILTER_LIKE_CONTAINS_VALUE = '/^%(.*?)%$/is';
    public const IS_FILTER_LIKE_END_WITH = '/^%(.*?)$/im';
    public const IS_FILTER_LIKE_START_WITH = '/^(.*?)%$/im';
    public const IS_DEFINER_HAVE_WRAP = '/^\s?\(\s?(.+)\s?\)\s?$/is';
}
