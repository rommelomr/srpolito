<?php

/* index.php */
class __TwigTemplate_ef0567eda04d9083ad53b5439502e871251fa3dbab5ac1a539de0336b5aeede6 extends Twig_Template
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
        echo "<?php var_dump(\$a);exit(); Funciones::verificarLogin(); ?>
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
