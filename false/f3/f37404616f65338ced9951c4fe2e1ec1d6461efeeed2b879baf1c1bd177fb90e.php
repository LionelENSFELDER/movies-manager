<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* login.twig */
class __TwigTemplate_f06b833089bc01492bc11754c0b40a113436e8e844efa66ede28c3798c6ae375 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 2
        return "default.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("default.twig", "login.twig", 2);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "
    <section class=\"vh-100 row h-100\">
        <div class=\"col-sm-12 my-5\">
            <div class=\"card mb-3 mx-auto p-5 rounded shadow\" style=\"width: 45rem;\">
                <form action=\"login.php\" method=\"POST\">
                    <h1>Login ta mere</h1>
                        <div class=\"form-group\">
                            <label for=\"exampleInputEmail1\">Name</label>
                            <input type=\"text\" name=\"name\" class=\"form-control\" placeholder=\"Name\">
                        </div>
                        <div class=\"form-group\">
                            <label for=\"exampleInputPassword1\">Password</label>
                            <input type=\"password\" name=\"password\" class=\"form-control\" placeholder=\"Password\">
                        </div>
                        <div class=\"form-group\">
                            <a type=\"button\" class=\"btn btn-link p-0\" href=\"signup.php\">Don't have an account ?</a>
                        </div>
                        <p style=\"color:red;\">";
        // line 23
        echo twig_escape_filter($this->env, ($context["test"] ?? null), "html", null, true);
        echo "</p>
                    <button class=\"btn btn-primary\" type=\"submit\" value=\"\">Envoyer !</button>
                </form>
            </div>
        </div>
    </section>
";
    }

    public function getTemplateName()
    {
        return "login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 23,  50 => 6,  46 => 5,  35 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "login.twig", "E:\\UwAmp\\www\\movies\\templates\\login.twig");
    }
}
