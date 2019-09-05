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

/* transaction/recuRetrait.html.twig */
class __TwigTemplate_728fe8e6c2d14235a8c466fd381882710976c2d87bf32e54f7cfadfe6068bf86 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "transaction/recuRetrait.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "transaction/recuRetrait.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Reçu de retrait";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 4
        echo "<style>
    .droit{
        float:right;
    }
    p{
        font-size: 12px;
    }
</style>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 13
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 14
        echo "    
    <fieldset>
        <legend>";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 16, $this->source); })()), "compteRet", [], "any", false, false, false, 16), "partenaire", [], "any", false, false, false, 16), "raisonSociale", [], "any", false, false, false, 16), "html", null, true);
        echo "</legend>
        <h3>Reçu de retrait</h3>
        <p>
            Agence: &emsp; ";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 19, $this->source); })()), "compteRet", [], "any", false, false, false, 19), "partenaire", [], "any", false, false, false, 19), "raisonSociale", [], "any", false, false, false, 19), "html", null, true);
        echo "   &emsp; Guichetier : &emsp; ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 19, $this->source); })()), "user", [], "any", false, false, false, 19), "nomComplet", [], "any", false, false, false, 19), "html", null, true);
        echo " <br>
            Date: ";
        // line 20
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "m/d/Y H:i:s"), "html", null, true);
        echo "
        </p>
        <fieldset>
            <legend>Envoyeur</legend>
            <p>
                Pays: &emsp; Sénégal   &emsp; Cellulaire : &emsp; ";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 25, $this->source); })()), "telEnv", [], "any", false, false, false, 25), "html", null, true);
        echo " <br>
                Prenom: &emsp; ";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 26, $this->source); })()), "prenomEnv", [], "any", false, false, false, 26), "html", null, true);
        echo " &emsp; Nom: ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 26, $this->source); })()), "nomEnv", [], "any", false, false, false, 26), "html", null, true);
        echo " <br>
                Adresse: &emsp; ";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 27, $this->source); })()), "adresseEnv", [], "any", false, false, false, 27), "html", null, true);
        echo "
            </p>
        </fieldset>
        <fieldset>
            <legend>Bénéficiaire</legend>
            <p>
                Pays: &emsp; Sénégal   &emsp; Cellulaire : &emsp; ";
        // line 33
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 33, $this->source); })()), "telBenef", [], "any", false, false, false, 33), "html", null, true);
        echo " <br>
                Prenom: &emsp; ";
        // line 34
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 34, $this->source); })()), "prenomBenef", [], "any", false, false, false, 34), "html", null, true);
        echo " &emsp; Nom: ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 34, $this->source); })()), "nomBenef", [], "any", false, false, false, 34), "html", null, true);
        echo " <br>
                Type de piece: ";
        // line 35
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 35, $this->source); })()), "typePieceBenef", [], "any", false, false, false, 35), "html", null, true);
        echo " &emsp; Numero: &emsp; ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 35, $this->source); })()), "cniBenef", [], "any", false, false, false, 35), "html", null, true);
        echo " <br>
            </p>
        </fieldset>
    </fieldset>
    <span><u>Caissier</u></span>
    <span class=\"droit\"><u>Client</u></span>

<fieldset>
    <legend>";
        // line 43
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 43, $this->source); })()), "compteRet", [], "any", false, false, false, 43), "partenaire", [], "any", false, false, false, 43), "raisonSociale", [], "any", false, false, false, 43), "html", null, true);
        echo "</legend>
    <h3>Reçu de retrait</h3>
    <p>
        Agence: &emsp; ";
        // line 46
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 46, $this->source); })()), "compteRet", [], "any", false, false, false, 46), "partenaire", [], "any", false, false, false, 46), "raisonSociale", [], "any", false, false, false, 46), "html", null, true);
        echo "   &emsp; Guichetier : &emsp; ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 46, $this->source); })()), "user", [], "any", false, false, false, 46), "nomComplet", [], "any", false, false, false, 46), "html", null, true);
        echo " <br>
        Date: ";
        // line 47
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "m/d/Y H:i:s"), "html", null, true);
        echo "
    </p>
    <fieldset>
        <legend>Envoyeur</legend>
        <p>
            Pays: &emsp; Sénégal   &emsp; Cellulaire : &emsp; ";
        // line 52
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 52, $this->source); })()), "telEnv", [], "any", false, false, false, 52), "html", null, true);
        echo " <br>
            Prenom: &emsp; ";
        // line 53
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 53, $this->source); })()), "prenomEnv", [], "any", false, false, false, 53), "html", null, true);
        echo " &emsp; Nom: ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 53, $this->source); })()), "nomEnv", [], "any", false, false, false, 53), "html", null, true);
        echo " <br>
            Adresse: &emsp; ";
        // line 54
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 54, $this->source); })()), "adresseEnv", [], "any", false, false, false, 54), "html", null, true);
        echo "
        </p>
    </fieldset>
    <fieldset>
        <legend>Bénéficiaire</legend>
        <p>
            Pays: &emsp; Sénégal   &emsp; Cellulaire : &emsp; ";
        // line 60
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 60, $this->source); })()), "telBenef", [], "any", false, false, false, 60), "html", null, true);
        echo " <br>
            Prenom: &emsp; ";
        // line 61
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 61, $this->source); })()), "prenomBenef", [], "any", false, false, false, 61), "html", null, true);
        echo " &emsp; Nom: ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 61, $this->source); })()), "nomBenef", [], "any", false, false, false, 61), "html", null, true);
        echo " <br>
            Type de piece: ";
        // line 62
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 62, $this->source); })()), "typePieceBenef", [], "any", false, false, false, 62), "html", null, true);
        echo " &emsp; Numero: &emsp; ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["transaction"]) || array_key_exists("transaction", $context) ? $context["transaction"] : (function () { throw new RuntimeError('Variable "transaction" does not exist.', 62, $this->source); })()), "cniBenef", [], "any", false, false, false, 62), "html", null, true);
        echo " <br>
        </p>
    </fieldset>
</fieldset>
<span><u>Caissier</u></span>
<span class=\"droit\"><u>Client</u></span>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "transaction/recuRetrait.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  211 => 62,  205 => 61,  201 => 60,  192 => 54,  186 => 53,  182 => 52,  174 => 47,  168 => 46,  162 => 43,  149 => 35,  143 => 34,  139 => 33,  130 => 27,  124 => 26,  120 => 25,  112 => 20,  106 => 19,  100 => 16,  96 => 14,  89 => 13,  74 => 4,  67 => 3,  54 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}
{% block title %}Reçu de retrait{% endblock %}
{% block stylesheets %}
<style>
    .droit{
        float:right;
    }
    p{
        font-size: 12px;
    }
</style>
{% endblock %}
{% block body %}
    
    <fieldset>
        <legend>{{transaction.compteRet.partenaire.raisonSociale}}</legend>
        <h3>Reçu de retrait</h3>
        <p>
            Agence: &emsp; {{transaction.compteRet.partenaire.raisonSociale}}   &emsp; Guichetier : &emsp; {{transaction.user.nomComplet}} <br>
            Date: {{\"now\"|date(\"m/d/Y H:i:s\")}}
        </p>
        <fieldset>
            <legend>Envoyeur</legend>
            <p>
                Pays: &emsp; Sénégal   &emsp; Cellulaire : &emsp; {{transaction.telEnv}} <br>
                Prenom: &emsp; {{transaction.prenomEnv}} &emsp; Nom: {{transaction.nomEnv}} <br>
                Adresse: &emsp; {{transaction.adresseEnv}}
            </p>
        </fieldset>
        <fieldset>
            <legend>Bénéficiaire</legend>
            <p>
                Pays: &emsp; Sénégal   &emsp; Cellulaire : &emsp; {{transaction.telBenef}} <br>
                Prenom: &emsp; {{transaction.prenomBenef}} &emsp; Nom: {{transaction.nomBenef}} <br>
                Type de piece: {{transaction.typePieceBenef}} &emsp; Numero: &emsp; {{transaction.cniBenef}} <br>
            </p>
        </fieldset>
    </fieldset>
    <span><u>Caissier</u></span>
    <span class=\"droit\"><u>Client</u></span>

<fieldset>
    <legend>{{transaction.compteRet.partenaire.raisonSociale}}</legend>
    <h3>Reçu de retrait</h3>
    <p>
        Agence: &emsp; {{transaction.compteRet.partenaire.raisonSociale}}   &emsp; Guichetier : &emsp; {{transaction.user.nomComplet}} <br>
        Date: {{\"now\"|date(\"m/d/Y H:i:s\")}}
    </p>
    <fieldset>
        <legend>Envoyeur</legend>
        <p>
            Pays: &emsp; Sénégal   &emsp; Cellulaire : &emsp; {{transaction.telEnv}} <br>
            Prenom: &emsp; {{transaction.prenomEnv}} &emsp; Nom: {{transaction.nomEnv}} <br>
            Adresse: &emsp; {{transaction.adresseEnv}}
        </p>
    </fieldset>
    <fieldset>
        <legend>Bénéficiaire</legend>
        <p>
            Pays: &emsp; Sénégal   &emsp; Cellulaire : &emsp; {{transaction.telBenef}} <br>
            Prenom: &emsp; {{transaction.prenomBenef}} &emsp; Nom: {{transaction.nomBenef}} <br>
            Type de piece: {{transaction.typePieceBenef}} &emsp; Numero: &emsp; {{transaction.cniBenef}} <br>
        </p>
    </fieldset>
</fieldset>
<span><u>Caissier</u></span>
<span class=\"droit\"><u>Client</u></span>
{% endblock %}
", "transaction/recuRetrait.html.twig", "/var/www/html/API/newTransfert/templates/transaction/recuRetrait.html.twig");
    }
}
