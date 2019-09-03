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

/* navbar.twig */
class __TwigTemplate_bc583fcdf2379604a26b60f5724194f0c637f43a023165eef4e8a741d8e17719 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "            
            <section class=\"mb-5\">
                    <div class=\"container\">
                        <nav class=\"navbar navbar-expand-lg navbar-dark\">
                        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarTogglerDemo03\" aria-controls=\"navbarTogglerDemo03\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                            <span class=\"navbar-toggler-icon\"></span>
                        </button>

                        <a class=\"navbar-brand\" href=\"index.php\"><i class=\"fab fa-youtube fa-sm
                        mr-1\"></i>Manager</a>

                        <div class=\"collapse navbar-collapse\" id=\"navbarTogglerDemo03\">
                            <ul class=\"navbar-nav mr-auto mt-2 mt-lg-0\">
                            ";
        // line 14
        if ((($context["auth"] ?? null) == false)) {
            // line 15
            echo "                                    <a class=\"nav-item nav-link\" href=\"signup.php\">Signup</a>
                                    <a class=\"nav-item nav-link\" href=\"login.php\">Login</a>
                                        
                            ";
        } else {
            // line 19
            echo "
                                    <a class=\"nav-item nav-link\" href=\"add.php\"><i class=\"fas fa-plus-square mr-1\"></i>Add a movie</a>
                                    <a class=\"nav-item nav-link\" href=\"profile.php\">Profile</a>
                                    <a class=\"nav-item nav-link\" href=\"logout.php\">Logout</a>
                            ";
        }
        // line 24
        echo "                            </ul>
                        </div>
                        </nav>
                    </div>
            </section>
";
    }

    public function getTemplateName()
    {
        return "navbar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 24,  60 => 19,  54 => 15,  52 => 14,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "navbar.twig", "E:\\UwAmp\\www\\movies\\templates\\navbar.twig");
    }
}
