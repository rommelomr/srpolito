<?php

/* index.twig.html */
class __TwigTemplate_bacb47a0625cde5f2ba5c539e53a4b11ba4bf33d51434e920b641649f26756be extends Twig_Template
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
        // line 1
        echo "<?php Funciones::verificarLogin(); ?>
<title>Principal</title>
</head>

<body>
\t<div class=\"container-fluid\">
\t\t
\t\t<form method=\"post\">
\t\t<?php
\t\t\t\$bot=null;
\t\t\t\$permiso=Funciones::PGSC('tipo');

\t\t\tif(\$permiso[0]=='1'){
\t\t\t\t
\t\t\t\t//\$bot[0]=Crear::botonDropdown('Usuarios,login,usuarios');
\t\t\t\t\$bot[0]=['Usuarios','login','usuarios'];
\t\t\t\t
\t\t\t\t
\t\t\t}
\t\t\tCrear::navbar([Crear::dropdownNavBarSave(\$bot)]);
\t\t?>
\t\t</form>
\t
\t</div>
</body>
</html>

";
    }

    public function getTemplateName()
    {
        return "index.twig.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
