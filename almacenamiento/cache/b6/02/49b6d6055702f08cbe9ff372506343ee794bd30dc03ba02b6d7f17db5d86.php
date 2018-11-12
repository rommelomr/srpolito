<?php

/* index.php */
class __TwigTemplate_b60249b6d6055702f08cbe9ff372506343ee794bd30dc03ba02b6d7f17db5d86 extends Twig_Template
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
        return "index.php";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
