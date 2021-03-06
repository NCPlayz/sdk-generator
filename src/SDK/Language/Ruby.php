<?php

namespace Appwrite\SDK\Language;

use Appwrite\SDK\Language;

class Ruby extends Language {

    protected $params = [
        'gemPackage' => 'gemName',
    ];

    /**
     * @param string $name
     * @return $this
     */
    public function setGemPackage($name)
    {
        $this->setParam('gemPackage', $name);

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Ruby';
    }

    /**
     * Get Language Keywords List
     *
     * @return array
     */
    public function getKeywords()
    {
        return [
            'BEGIN',
			'END',
			'alias',
			'and',
			'begin',
			'break',
			'case',
			'class',
			'def',
			'defined?',
			'do',
			'else',
			'module',
			'next',
			'nil',
			'not',
			'or',
			'redo',
			'rescue',
			'retry',
			'return',
			'self',
			'super',
			'then',
			'elsif',
			'end',
			'false',
			'ensure',
			'for',
			'if',
			'true',
			'undef',
			'unless',
			'until',
			'when',
			'while',
        ];
    }

    /**
     * @return array
     */
    public function getFiles()
    {
        return [
            [
                'scope'         => 'default',
                'destination'   => 'README.md',
                'template'      => '/ruby/REDAME.md.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'LICENSE',
                'template'      => '/ruby/LICENSE.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'lib/{{ spec.title | caseDash }}.rb',
                'template'      => '/ruby/lib/container.rb.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'lib/{{ spec.title | caseDash }}/client.rb',
                'template'      => '/ruby/lib/container/client.rb.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'lib/{{ spec.title | caseDash }}/service.rb',
                'template'      => '/ruby/lib/container/service.rb.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'service',
                'destination'   => '/lib/{{ spec.title | caseDash}}/services/{{service.name | caseDash}}.rb',
                'template'      => '/ruby/lib/container/services/service.rb.twig',
                'minify'        => false,
            ],
        ];
    }

    /**
     * @param $type
     * @return string
     */
    public function getTypeName($type)
    {
        switch ($type) {
            case self::TYPE_INTEGER:
            case self::TYPE_NUMBER:
                return 'number';
            break;
            case self::TYPE_FILE:
                return 'File';
            break;
        }

        return $type;
    }

    /**
     * @param array $param
     * @return string
     */
    public function getParamDefault(array $param)
    {
        $type       = (isset($param['type'])) ? $param['type'] : '';
        $default    = (isset($param['default'])) ? $param['default'] : '';
        $required   = (isset($param['required'])) ? $param['required'] : '';

        if($required) {
            return ':';
        }

        $output = ': ';

        if(empty($default) && $default !== 0 && $default !== false) {
            switch ($type) {
                case self::TYPE_NUMBER:
                case self::TYPE_INTEGER:
                case self::TYPE_BOOLEAN:
                    $output .= 'nill';
                    break;
                case self::TYPE_STRING:
                    $output .= "''";
                    break;
                case self::TYPE_ARRAY:
                    $output .= '[]';
                    break;
            }
        }
        else {
            switch ($type) {
                case self::TYPE_NUMBER:
                case self::TYPE_INTEGER:
                case self::TYPE_ARRAY:
                    $output .= $default;
                    break;
                case self::TYPE_BOOLEAN:
                    $output .= ($default) ? 'true' : 'false';
                    break;
                case self::TYPE_STRING:
                    $output .= "'{$default}'";
                    break;
            }
        }

        return $output;
    }

    /**
     * @param array $param
     * @return string
     */
    public function getParamExample(array $param)
    {
        // TODO: Implement getParamExample() method.
    }
}