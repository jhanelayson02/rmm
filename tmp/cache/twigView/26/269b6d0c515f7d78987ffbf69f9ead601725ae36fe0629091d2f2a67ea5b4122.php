<?php

/* C:\xampp\htdocs\rmm\vendor\cakephp\bake\src\Template\Bake\tests\test_case.twig */
class __TwigTemplate_fc852e575b8d7f59c5b4147c66e22d539a7fa45a03f79458debd60451bc25623 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 18
        $context["isController"] = (twig_lower_filter($this->env, (isset($context["type"]) ? $context["type"] : null)) == "controller");
        // line 19
        $context["isShell"] = (twig_lower_filter($this->env, (isset($context["type"]) ? $context["type"] : null)) == "shell");
        // line 20
        if ((isset($context["isController"]) ? $context["isController"] : null)) {
            // line 21
            $context["superClassName"] = "IntegrationTestCase";
        } elseif (        // line 22
(isset($context["isShell"]) ? $context["isShell"] : null)) {
            // line 23
            $context["superClassName"] = "ConsoleIntegrationTestCase";
        } else {
            // line 25
            $context["superClassName"] = "TestCase";
        }
        // line 27
        $context["uses"] = twig_array_merge((isset($context["uses"]) ? $context["uses"] : null), array(0 => ("Cake\\TestSuite\\" . (isset($context["superClassName"]) ? $context["superClassName"] : null))));
        // line 29
        $context["uses"] = twig_sort_filter((isset($context["uses"]) ? $context["uses"] : null));
        // line 30
        echo "<?php
namespace ";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["baseNamespace"]) ? $context["baseNamespace"] : null), "html", null, true);
        echo "\\Test\\TestCase\\";
        echo twig_escape_filter($this->env, (isset($context["subNamespace"]) ? $context["subNamespace"] : null), "html", null, true);
        echo ";

";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["uses"]) ? $context["uses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["dependency"]) {
            // line 34
            echo "use ";
            echo twig_escape_filter($this->env, $context["dependency"], "html", null, true);
            echo ";
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dependency'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "
/**
 * ";
        // line 38
        echo twig_escape_filter($this->env, (isset($context["fullClassName"]) ? $context["fullClassName"] : null), "html", null, true);
        echo " Test Case
 */
class ";
        // line 40
        echo twig_escape_filter($this->env, (isset($context["className"]) ? $context["className"] : null), "html", null, true);
        echo "Test extends ";
        echo twig_escape_filter($this->env, (isset($context["superClassName"]) ? $context["superClassName"] : null), "html", null, true);
        echo "
{
";
        // line 42
        if ((isset($context["properties"]) ? $context["properties"] : null)) {
            // line 43
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["properties"]) ? $context["properties"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["propertyInfo"]) {
                // line 44
                echo "
    /**
     * ";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute($context["propertyInfo"], "description", array()), "html", null, true);
                echo "
     *
     * @var ";
                // line 48
                echo twig_escape_filter($this->env, $this->getAttribute($context["propertyInfo"], "type", array()), "html", null, true);
                echo "
     */
    public \$";
                // line 50
                echo twig_escape_filter($this->env, $this->getAttribute($context["propertyInfo"], "name", array()), "html", null, true);
                if (($this->getAttribute($context["propertyInfo"], "value", array(), "any", true, true) && $this->getAttribute($context["propertyInfo"], "value", array()))) {
                    echo " = ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["propertyInfo"], "value", array()), "html", null, true);
                }
                echo ";
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['propertyInfo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 54
        if ((isset($context["fixtures"]) ? $context["fixtures"] : null)) {
            // line 55
            echo "
    /**
     * Fixtures
     *
     * @var array
     */
    public \$fixtures = [";
            // line 61
            echo $this->getAttribute((isset($context["Bake"]) ? $context["Bake"] : null), "stringifyList", array(0 => $this->env->getExtension('Jasny\Twig\ArrayExtension')->values((isset($context["fixtures"]) ? $context["fixtures"] : null))), "method");
            echo "];
";
        }
        // line 64
        if ((isset($context["construction"]) ? $context["construction"] : null)) {
            // line 65
            echo "
    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
";
            // line 74
            if ((isset($context["preConstruct"]) ? $context["preConstruct"] : null)) {
                // line 75
                echo "        ";
                echo (isset($context["preConstruct"]) ? $context["preConstruct"] : null);
                echo "
";
            }
            // line 77
            echo "        \$this->";
            echo (((isset($context["subject"]) ? $context["subject"] : null) . " = ") . (isset($context["construction"]) ? $context["construction"] : null));
            echo "
";
            // line 78
            if ((isset($context["postConstruct"]) ? $context["postConstruct"] : null)) {
                // line 79
                echo "        ";
                echo (isset($context["postConstruct"]) ? $context["postConstruct"] : null);
                echo "
";
            }
            // line 81
            echo "    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset(\$this->";
            // line 90
            echo twig_escape_filter($this->env, (isset($context["subject"]) ? $context["subject"] : null), "html", null, true);
            echo ");

        parent::tearDown();
    }
";
        }
        // line 96
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["methods"]) ? $context["methods"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["method"]) {
            // line 97
            echo "
    /**
     * Test ";
            // line 99
            echo twig_escape_filter($this->env, $context["method"], "html", null, true);
            echo " method
     *
     * @return void
     */
    public function test";
            // line 103
            echo twig_escape_filter($this->env, Cake\Utility\Inflector::camelize($context["method"]), "html", null, true);
            echo "()
    {
        \$this->markTestIncomplete('Not implemented yet.');
    }
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 109
        if ( !(isset($context["methods"]) ? $context["methods"] : null)) {
            // line 110
            echo "
    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        \$this->markTestIncomplete('Not implemented yet.');
    }
";
        }
        // line 121
        echo "}
";
    }

    public function getTemplateName()
    {
        return "C:\\xampp\\htdocs\\rmm\\vendor\\cakephp\\bake\\src\\Template\\Bake\\tests\\test_case.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 121,  207 => 110,  205 => 109,  194 => 103,  187 => 99,  183 => 97,  179 => 96,  171 => 90,  160 => 81,  154 => 79,  152 => 78,  147 => 77,  141 => 75,  139 => 74,  128 => 65,  126 => 64,  121 => 61,  113 => 55,  111 => 54,  98 => 50,  93 => 48,  88 => 46,  84 => 44,  80 => 43,  78 => 42,  71 => 40,  66 => 38,  62 => 36,  53 => 34,  49 => 33,  42 => 31,  39 => 30,  37 => 29,  35 => 27,  32 => 25,  29 => 23,  27 => 22,  25 => 21,  23 => 20,  21 => 19,  19 => 18,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#
/**
 * Test Case bake template
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
#}
{% set isController = type|lower == 'controller' %}
{% set isShell = type|lower == 'shell' %}
{% if isController %}
    {%- set superClassName = 'IntegrationTestCase' %}
{% elseif isShell %}
    {%- set superClassName = 'ConsoleIntegrationTestCase' %}
{% else %}
    {%- set superClassName = 'TestCase' %}
{% endif %}
{%- set uses = uses|merge([\"Cake\\\\TestSuite\\\\#{superClassName}\"]) %}

{%- set uses = uses|sort %}
<?php
namespace {{ baseNamespace }}\\Test\\TestCase\\{{ subNamespace }};

{% for dependency in uses %}
use {{ dependency }};
{% endfor %}

/**
 * {{ fullClassName }} Test Case
 */
class {{ className }}Test extends {{ superClassName }}
{
{% if properties %}
{% for propertyInfo in properties %}

    /**
     * {{ propertyInfo.description }}
     *
     * @var {{ propertyInfo.type }}
     */
    public \${{ propertyInfo.name }}{% if propertyInfo.value is defined and propertyInfo.value %} = {{ propertyInfo.value }}{% endif %};
{% endfor %}
{% endif %}

{%- if fixtures %}

    /**
     * Fixtures
     *
     * @var array
     */
    public \$fixtures = [{{ Bake.stringifyList(fixtures|values)|raw }}];
{% endif %}

{%- if construction %}

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
{% if preConstruct %}
        {{ preConstruct|raw }}
{% endif %}
        \$this->{{ (subject ~ ' = ' ~ construction)|raw }}
{% if postConstruct %}
        {{ postConstruct|raw }}
{% endif %}
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset(\$this->{{ subject }});

        parent::tearDown();
    }
{% endif %}

{%- for method in methods %}

    /**
     * Test {{ method }} method
     *
     * @return void
     */
    public function test{{ method|camelize }}()
    {
        \$this->markTestIncomplete('Not implemented yet.');
    }
{% endfor %}

{%- if not methods %}

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        \$this->markTestIncomplete('Not implemented yet.');
    }
{% endif %}
}
", "C:\\xampp\\htdocs\\rmm\\vendor\\cakephp\\bake\\src\\Template\\Bake\\tests\\test_case.twig", "C:\\xampp\\htdocs\\rmm\\vendor\\cakephp\\bake\\src\\Template\\Bake\\tests\\test_case.twig");
    }
}
